<?php
    session_start();
    // var_dump($_SESSION);

    require 'connection.php';
    require 'functions.php';

    if($conn !=="error")
    {
        // If user clicks, any of the optioned displayed.
        
        if(isset($_POST['selected_opt']))
        {
            $org_ques_opt = $_POST['selected_opt'];
            $ques_opt = strtolower($org_ques_opt);
            $relevant_ques = keywords_replace($ques_opt);
            $split_string_opt = explode(" ",$relevant_ques);
            $len = count($split_string_opt);
            $opt_query = "SELECT * FROM `ques_ans` WHERE Question REGEXP '";
            for($i=0;$i<$len;$i++)
            {
                $opt_query = $opt_query . "(^".$split_string_opt[$i]."[ ]|[ ]".$split_string_opt[$i]."[ ]|[ ]".$split_string_opt[$i]."$|^".$split_string_opt[$i]."$)'";
                if($i<$len-1)
                {
                    $opt_query = $opt_query . " AND Question REGEXP '";
                }
            }
            $res4 = $conn->prepare($opt_query);
            $res4->execute();
            $num_rows4 = $res4->rowCount();
            if($num_rows4!=0)
            {
                if($num_rows4==1)
                {
                    while($row4 = $res4->fetch())
                    {
                        $ans_opt = $row4["Answer_1"];
                    }
                    echo $ans_opt;
                }
                else
                {
                    // If selected option leds to Multiple other options.
                    
                    $ans = "Please Select the following</div></div><div class='opt'>";
                    $k=0;
                    while($row4=$res4->fetch())
                    {
                        ++$k;
                        if($num_rows4==$k)
                        {
                            $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row4["title"]."'/>";
                        }
                        else
                        {
                            $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row4["title"]."'/></div>";
                        }
                    }
                    echo $ans;
                }
            }
        }
    }
    else
    {
        echo "Connection Error.<br>Try Again Later";
    }
?>