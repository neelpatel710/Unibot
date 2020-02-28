<?php
    session_start();
    // var_dump($_SESSION);

    require 'connection.php';
    require 'functions.php';

    if($conn !=="error")
    {
        if(isset($_POST['usermsg']))
        {
            // Pre-Processing The Question.
            
            $org_ques = $_POST["usermsg"];
            $ques = strtolower($org_ques);
            $split_string = explode(" ",$ques);

            //Finding the wrong words and provide suggestions.

            $_SESSION["no_select_suggest"] = $org_ques;
            $suggested_string = "";
            $k=1;
            foreach ($split_string as $value) 
            {
                if($k < count($split_string))
                {
                    $k++;
                    $suggested_string = $suggested_string.suggestion($value)." ";
                }
                else
                {
                    $suggested_string = $suggested_string.suggestion($value);
                }
            }
            if($flag_suggestion == 1)
            {
                $_SESSION["suggest"] = $suggested_string;
                $ans = "Do you mean to say:<br>\"".$suggested_string."\""."</div></div><div class='opt'><div class='options'><input type='button' onclick='suggest_option(this.value)' class='btn_opt' value='Yes, I meant this'/></div><div class='options'><input type='button' onclick='suggest_option(this.value)' class='btn_opt' value='No, I didn&apos;t'/>";
                echo $ans;
            }
        }
        if(isset($_POST["suggest_yn"]))
        {
            if($_POST["suggest_yn"] =="Yes, I meant this")
            {
                $flag_yes = 1;
            }
            else if($_POST["suggest_yn"] =="No, I didn't")
            {
                $flag_yes = 0;
            }
        }
        
        // if($flag_yes == 0)
        // {
        //     $ans = "Sorry, There are few misspelled words";
        //     echo $ans;
        // }

        if($flag_yes!=-1 || ($flag_suggestion==0 && $flag_yes == -1))
        {
            // When suggestion is provided and user selects Yes or No.
            //If Yes is selected.

            if($flag_yes==1)
            {
                $suggested = str_replace("<u>","", $_SESSION["suggest"]);
                $suggested = str_replace("</u>","",$suggested);
                $org_ques = $suggested;
                $ques = strtolower($suggested);
            }

            //If No is selected.
            
            if($flag_yes==0)
            {
                $org_ques = $_SESSION["no_select_suggest"];
                $ques = strtolower($org_ques);
            }

            // Converting the Question to Relevant Question.
            
            $relevant_ques = keywords_replace($ques);
            
            // My....is.... format to teach machine to learn from it.

            if((strpos($ques,"my")!==false) && (strpos($ques,"is")!==false))
            {
                if(preg_match("/[m][y][ ][a-z ]*[ ][i][s][ ][ a-z0-9@_.]*/", $ques))
                {
                    $split_string_yd = explode(" ",$ques);
                    $detail = substr($ques, strpos($ques,"my ")+3,strpos($ques," is ")-3);
                    $detail_value = ucfirst(substr($ques, strpos($ques," is ")+4));
                    $_SESSION["your_details"][$detail] = $detail_value;
                    $learn_op = array(); 
                    $learn_op[1] = "Glad to Know.";
                    $learn_op[2] = "Thank You.";
                    $learn_op[3] = "Oh. Good.";
                    $learn_op[4] = "I see.";
                    $random = rand(1,4);
                    $flag_notquestion = 1;
                    echo $learn_op[$random];
                }
                else
                {
                    if(isset($_SESSION["your_details"]) && !empty($_SESSION["your_details"]))
                    {
                        $split_string_check_session = explode(" ", $ques);
                        foreach ($split_string_check_session as $val)
                        {
                            foreach ($_SESSION["your_details"] as $key_c => $val_s)
                            {
                                if(strcmp($val, $key_c)==0)
                                {
                                    $ans = $val_s;
                                    $flag_insession=1;
                                    $flag_notquestion = 1;
                                }
                            }
                        }
                        echo $ans;
                    }
                    else if($flag_insession==0)
                    {
                        echo "Sorry, I don't understand YOU.";
                    }
                }
                $flag_myis=1;
            }
            
            // Fetch details learned by machine, if any.
            
            if((strpos($ques,"my details")!==false))
            {
                if(isset($_SESSION["your_details"]) && !empty($_SESSION["your_details"]))
                {
                    $ans = "I remembered that,<br>";
                    foreach ($_SESSION["your_details"] as $key => $value) {
                        $ans = $ans."<b>".ucfirst($key)."</b> : ".$value."<br>";
                    }
                    echo $ans;
                }
                else
                {
                    echo "Pardon, I don't know you well.";
                }
                $flag_yd = 1;
            }
            
            
            // Answer the Question. First from the Session.
            
            if(isset($_SESSION["your_details"]) && !empty($_SESSION["your_details"]) && $flag_notquestion==0)
            {
                $split_string_check_session = explode(" ", $ques);
                foreach ($split_string_check_session as $val)
                {
                    foreach ($_SESSION["your_details"] as $key_c => $val_s)
                    {
                        if(strcmp($val, $key_c)==0)
                        {
                            $ans = $val_s;
                            $flag_insession=1;
                            echo $ans;
                        }
                    }
                }
            }
            
            // If Question's Answer not in Session. Find in Database.
            
            if($relevant_ques!="" && $flag_myis==0 && $flag_yd==0 && $flag_insession==0)
            {
                $relevant_ques = str_replace(".","",$relevant_ques);
                $split_string = explode(" ",$relevant_ques);
                $random = rand(1,3);
                $arr_length = count($split_string);
                if($arr_length == 1)
                {    
                    $res = $conn->prepare("SELECT * FROM ques_ans WHERE Question REGEXP ?");
                    $res->bindValue(1,"(^".$relevant_ques."[ ]|[ ]".$relevant_ques."[ ]|[ ]".$relevant_ques."$|^".$relevant_ques."$)");
                    $res->execute();
                    $num_rows = $res->rowCount();
                    if($num_rows!=0)
                    {
                        if($num_rows==1)
                        {
                            while($row=$res->fetch())
                            {
                                $ans = $row["Answer_".$random];
                                if($ans == NULL)
                                {
                                    $ans = $row["Answer_1"];
                                }
                            }
                            echo $ans;
                        }
                        else
                        {
                            //Showing Option If keywords are hit in Multiple rows.
                            
                            $ans = "Please Select the following</div></div><div class='opt'>";
                            $k=0;
                            while($row=$res->fetch())
                            {
                                ++$k;
                                if($num_rows==$k)
                                {
                                    $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row["title"]."'/>";
                                }
                                else
                                {
                                    $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row["title"]."'/></div>";
                                }
                            }
                            echo $ans;
                        }
                    }
                    else 
                    {
                        echo learn($ques);
                    }
                }
                else 
                {
                    // Finding the Important Words using Database.
                    
                    $words_count_query = "Select ";
                    for($i=0;$i<$arr_length;$i++)
                    {
                        $words_count_query = $words_count_query . "(SELECT count(*) FROM ques_ans WHERE Question REGEXP '^".$split_string[$i]."[ ]|[ ]".$split_string[$i]."[ ]|[ ]".$split_string[$i]."$|^".$split_string[$i]."$') as \"".$split_string[$i]."\"";
                        if($i<($arr_length-1))
                        {
                            $words_count_query = $words_count_query . ",";
                        }
                    }
                    $res2 = $conn->prepare($words_count_query);
                    $res2->execute();
                    $imp_words = array();
                    $k=0;
                    while($row2 = $res2->fetch())
                    {
                        foreach($split_string as $val)
                        {
                            if($row2[$val]!=0)
                            {
                                $imp_words[$k]=$val;
                                $k++;
                            }
                        }
                    }
                    
                    // Using the Important Words to find relevant answers.
                    
                    if(!empty($imp_words))
                    {
                        $imp_len = count($imp_words);
                        $final_query = "SELECT * FROM `ques_ans` WHERE Question REGEXP '";
                        for($i=0;$i<$imp_len;$i++)
                        {
                            $final_query = $final_query . "(^".$imp_words[$i]."[ ]|[ ]".$imp_words[$i]."[ ]|[ ]".$imp_words[$i]."$|^".$imp_words[$i]."$)'";
                            if($i<$imp_len-1)
                            {
                                $final_query = $final_query . " AND Question REGEXP '";
                            }
                        }
                        $res3 = $conn->prepare($final_query);
                        $res3->execute();
                        $num_rows3 = $res3->rowCount();
                        if($num_rows3!=0)
                        {
                            if($num_rows3==1)
                            {
                                while($row3=$res3->fetch())
                                {
                                    $ans = $row3["Answer_".$random];
                                    if($ans == NULL)
                                    {
                                        $ans = $row3["Answer_1"];
                                    }
                                }
                                echo $ans;
                            }
                            else
                            {
                                $ans = "Please Select the following</div></div><div class='opt'>";
                                $k=0;
                                while($row3=$res3->fetch())
                                {
                                    ++$k;
                                    if($num_rows3==$k)
                                    {
                                        $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row3["title"]."'/>";
                                    }
                                    else
                                    {
                                        $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row3["title"]."'/></div>";
                                    }
                                }
                                echo $ans;
                            }
                        }
                        else
                        {
                            echo learn($ques);
                        }
                    }
                    else
                    {
                        echo learn($ques);
                    }
                }
            }
        }
    }
    else
    {
        echo "Connection Error.<br>Try Again Later";
    }
?>