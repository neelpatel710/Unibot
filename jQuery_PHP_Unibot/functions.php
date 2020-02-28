<?php

	$words = array(
		"unibot","information", "technology", "university", "course", "courses", "syllabus", "programme","information technology", "address", "engineering", "college", "hello", "hi", "hey", "bye", "exit", "about", "sardar", "patel", "timetable", "semester", "spce", "contact", "number", "one", "two", "three", "four", "five", "six", "seven", "eight", "first", "second", "third", "fourth", "fifth", "sixth", "seventh", "eighth","thank you", "my", "name","is","details","my details","yourself", "what", "when", "where", "how", "why","electrical","computer", "mechanical","civil","department","dept", "study", "fees", "creators", "developers", "developed", "developer", "neel", "devangi", "parikh","give","pay","payment","international",
		"principal","email","mail","bhavesh","shah", "tpo", "placement", "cell", "btech", "be","events","event","sport","days","day","sports","festivals","celebration","celebrations","techfest","tech fest","technical", "campus","celebrated","hours","hour","timing","timings","the","a","an","is","it","in","at","on","over","above","below","table","time","facilities","schedule","facility","canteen","wifi","library","bus","parking","good","area","areas","features","fetaure","occupied","equipments","equipment","highly","departments","established","establish","year","inaugurate","start","begin","build","built","constructed","construct","starting","initiate","initiated","tft","trust","tirupati","foundation","management","managed","by","	curriculum","outline","dress code","outfit","outfits","science","infrastructure","architecture","building","design", "structure","practical","practicals","experiments","experiment","internal","exams","papers","paper","internals","yes","no","tell","you","faculty","bhavesh","shah","thank you","thanks","thank"
	);
	
	$triple_keywords = array(
		"course of study"=>"syllabus","who are you"=>"unibot","tirupati foundation trust"=>"tft","programme of study"=>"syllabus"
	);

	$double_keywords = array(
		"information technology"=>"it", "information engineering"=>"it","managed by"=>"tft","internal department"=>"dept","internal depts"=>"dept","internal dept"=>"dept","internal departments"=>"dept","time table"=>"timetable", "contact no"=>"contact","contact number"=>"contact", "phone no"=>"contact", "phone number"=>"contact","phn no"=>"contact","phn number"=>"contact","developed by"=>"develop","created by"=>"develop", "about you"=>"unibot", "placement cell"=>"placement","sport day"=>"sports","days celebration"=>"days","tech fest"=>"techfest", "technical fest"=>"techfest", "course outline"=>"syllabus",
		"1 st" => "1", "2 nd" => "2", "3 rd"=> "3", "4 th"=>"4", "5 th"=>"5", "6 th"=>"6", "7 th"=>"7", "8 th"=>"8", "thank you"=>"thanks"
	); 
	
	$single_keywords = array(
		"courses"=>"syllabus", "course"=>"syllabus", "programme"=>"syllabus","curriculum"=>"syllabus",
		"informationtechnology"=>"it", "ite"=>"it", "outfit"=>"dress","outifits"=>"dress","ce"=>"civil","cs"=>"computer", "architecture"=>"infrastructure", "building"=>"infrastructure","structure"=>"infrastructure","practical"=>"practicals","experiments"=>"practicals","experiment"=>"practicals","internals"=>"internal","paper"=>"papers",
		"comp"=>"computer", "mobile"=>"contact", "phone"=>"contact","phoneno"=>"contact","phn"=>"contact","contactno"=>"contact","btech"=>"department","establish"=>"established", " inaugurate"=>"established",
		"start"=>"established","begin"=>"established","build"=>"established","built"=>"established","constructed"=>"established","construct"=>"established","starting"=>"established", "initiate"=>"established","initiated"=>"established","foundation"=>"established", "management"=>"tft",
		"elec"=>"electrical", "ee"=>"electrical", "features"=>"facilities","fetaure"=>"facilities",
		"mech"=>"mechanical", "sport"=>"sports","festiv"=>"festivals","event"=>"events",
		"departments"=>"department", "dept"=>"department", "depts"=>"department", "sem"=>"semester",
		"1st"=>"1", "2nd"=>"2", "3rd"=>"3", "4th"=>"4", "5th"=>"5", "6th"=>"6", "7th"=>"7", "8th"=>"8",
		"first"=>"1", "second"=> "2", "third"=>"3", "fourth"=>"4", "fifth"=>"5", "sixth"=>"6", "seventh"=>"7", "eighth"=>"8", "one"=>"1", "two"=>"2", "three"=>"3", "four"=>"4", "five"=>"5", "six"=>"6", "seven"=>"7", "eight"=>"8", "fee"=>"fees", "developer"=>"develop","developed"=>"develop","developers"=>"develop", "creators"=>"develop","creator"=>"develop","yourself"=>"unibot", "hour"=>"hours","timing"=>"college hours","timings"=>"college hours","pay"=>"payement","princi"=>"principal", "mail"=>"email", "tpo"=>"placement","schedule"=>"hours","facility"=>"facilities","equipments"=>"facilities","equipment"=>"facilities"
	);

	//Flags.
	// To check whether the format is like "my..is..".
	$flag_myis = 0;
	// To check whether your_details session is exists or not.
	$flag_yd = 0;
	// To check if the answer is obtained from session itself.
	$flag_insession = 0;
	// Whether the user's query is a Question or to learn from it.
	$flag_notquestion = 0;
	// If Suggestion is accepted by user.
	$flag_yes = -1;
	//Flag shows if there is any suggestion.
	$flag_suggestion = 0;
	//Flag shows whether it was previously asked question or not.
	$flag_db_learnt = 0;

	function suggestion($word)
	{
		global $words,$flag_suggestion;

		$max_match = $word;
		$tmp_per = 0;

		foreach ($words as $value) {
			similar_text($value,$word,$p);
			// var_dump($value.": ".$p);
			if($p>$tmp_per)
			{
				$tmp_per = $p;
				$max_match = $value;
				if($tmp_per==100)
				{
					break;
				}
			}
		}

		if($tmp_per > 71.0 && $tmp_per<100)
		{
			$flag_suggestion = 1;
			return "<u>".ucfirst($max_match)."</u>";
		}
		else
		{
			return ucfirst($word);
		}
	}

	function keywords_replace($org_ques)
	{
		global $single_keywords,$double_keywords,$triple_keywords;

		$mod_ques = $org_ques;

		// Check the string in triple words keywords.
		foreach ($triple_keywords as $key => $value) {
			if(strpos($mod_ques,$key) !== false)
			{
				$after_key = strstr($mod_ques,$key);
				$actual_after_key = str_replace($key,"",$after_key);
				if($actual_after_key=="" || $actual_after_key{0}==" ")
				{
					$mod_ques = substr_replace($mod_ques,$value, strpos($mod_ques,$key), strlen($key));
				}
			}
		}
		
		// Check the string in double words keywords.
		foreach ($double_keywords as $key => $value) {
			if(strpos($mod_ques,$key) !== false)
			{
				$after_key = strstr($mod_ques,$key);
				$actual_after_key = str_replace($key,"",$after_key);
				if($actual_after_key=="" || $actual_after_key{0}==" ")
				{
					$mod_ques = substr_replace($mod_ques,$value, strpos($mod_ques,$key), strlen($key));
				}
				
			}
		}

		// Check the string in single word keywords.
		foreach ($single_keywords as $key => $value) {
			if(strpos($mod_ques,$key) !== false)
			{
				$after_key = strstr($mod_ques,$key);
				$actual_after_key = str_replace($key,"",$after_key);
				if($actual_after_key=="" || $actual_after_key{0}==" ")
				{
					$mod_ques = substr_replace($mod_ques,$value, strpos($mod_ques,$key), strlen($key));
				}
			}
		}

		return $mod_ques;
	}

	// Function to display error message if not found.

    function noFound($ques_pass,$ans_pass)
    {
        $_SESSION["ques"][strval($_SESSION["i"])]=array(ucfirst($ques_pass)=>$ans_pass);
        $_SESSION["i"]=$_SESSION["i"]+1;
        // echo "<script>refresh_div();</script>";
        echo "<script>location.href='index.php'</script>";
    }

    // Function to display answer if found.

    function found($ques_pass,$ans_pass)
    {
		$_SESSION["ques"][strval($_SESSION["i"])]=array(ucfirst($ques_pass)=>$ans_pass);
		$_SESSION["i"]=$_SESSION["i"]+1;
		// echo "<script>refresh_div();</script>";
		echo "<script>location.href='index.php'</script>";
	}

	function learn($ques_pass)
	{
		global $conn,$flag_db_learnt;
		$res8 = $conn->prepare("SELECT * FROM learnt WHERE Question REGEXP ?");
		$res8 -> bindValue(1,$ques_pass);
		$res8->execute();
		$num8 = $res8->rowCount();
		if($num8==1)
		{
			while($row8=$res8->fetch())
			{
				$flag_db_learnt = 1;
				return $row8["Answer"];
			}
		}

		if($flag_db_learnt == 0)
		{	
			$ques_pass_dot = str_replace(".","",$ques_pass);
			$ques_pass_exp = str_replace(" ","[A-Za-z0-9_. ]*[^A-Za-z0-9_ ]*",$ques_pass_dot);
			$res9 = $conn->prepare("SELECT * FROM ques_ans WHERE Answer_1 REGEXP ?");
			$res9 -> bindValue(1,$ques_pass_exp);
			$res9->execute();
			$num9 = $res9->rowCount();
			if($num9!=0)
			{
				if($num9==1)
				{
					while($row9=$res9->fetch())
					{
						$res10 = $conn->prepare("INSERT INTO learnt(Question,Answer) VALUES(?,?)");
						$res10->bindValue(1,$ques_pass);
						$res10->bindValue(2,$row9["Answer_1"]);
						$res10->execute();
						return $row9["Answer_1"];
					}
				}
				else
				{
					$ans = "Please Select the following</div></div><div class='opt'>";
                    $k=0;
                    while($row9=$res9->fetch())
                    {
                        ++$k;
                        if($num9==$k)
                        {
                            $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row9["title"]."'/>";
                        }
                        else
                        {
                            $ans = $ans. "<div class='options'><input type='button' onclick='option_select(this.value)' class='btn_opt' value='".$row9["title"]."'/></div>";
                        }
                    }
                    return $ans;
				}
			}
			else
			{
				return "Sorry, I didn't find anything.";
			}
		}
	}

?>

