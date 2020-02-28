<!DOCTYPE html>
<html>
<head>
	<title>UNIBOT</title>
        <link rel="stylesheet" type="text/css" href="css/chatbox.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="application/javascript">
			
			function small(e)
            {
               var charCode = event.keyCode
               if (charCode == 13 || charCode == 64 || charCode == 46 || charCode == 95 ||charCode == 32 || (charCode >= 97 && charCode <= 122) || (charCode>=48 && charCode<=57) || (charCode >= 65 && charCode <= 90))
               {
					if(charCode == 13)
					{
						$("input.sendbox").click();
					}
					return true;
               }
               return false;
			}
			
        </script>
        <script>

            $(document).ready(function(){
				if(typeof(Storage)!== "undefined")
				{
					if(localStorage.count)
					{
						if(localStorage.previousDate)
						{
							store_response("Last Visit to Website: "+localStorage.previousDate);
							var a = date_fetch();
							if(localStorage.previousDate!=a)
							{
								localStorage.previousDate = a;
							}
						}
						localStorage.count = Number(localStorage.count)+1;
						store_response("Hey there, Welcome Back.");
					}
					else
					{
						localStorage.count = 1;
						localStorage.previousDate = date_fetch();
					}

					for(var i=1;i<=localStorage.count;i++)
					{
						$("div.display").append(localStorage.getItem(i));
					}
				}
                $('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},0);
                $('div#copyright').mouseover(function(){
                    $(this).text("Devangi Parikh & Neel Patel");
                    $(this).css("font-weight","600");
                    $(this).css("font-size","17px");
                    $(this).css("padding-right","24px");
                    $(this).css("padding-top","8px");
                });
                $('div#copyright').mouseout(function(){
                    $(this).text("UNIBOT");
                    $(this).css("font-weight","600");
                    $(this).css("padding-right","0px");
                    $(this).css("padding-top","0px");
                    $(this).css("font-size","28px");
                });
            });

			function date_fetch()
			{
				var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
				var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
				var s = new Date().getFullYear();
				s = months[new Date().getMonth()]+" "+s;
				s = new Date().getDate()+" "+s;
				s = s+" ("+days[new Date().getDay()]+") ";
				s = s +"@ "+new Date().getHours()+":"+new Date().getMinutes();
				return s;
			}

            function playAudio()
            {
                var cx = document.getElementById("aud");
                cx.play();
				// $("audio#aud").get(0).play();
            }

			function open_box()
			{
				$('div#chat_symbol_oc').hide();
				$('div#chatbox_oc').show();
				$("input#userinput").focus();
				$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},500);
				playAudio();
			}

			function close_box()
			{
				$('div#chatbox_oc').hide();
				$('div#chat_symbol_oc').show();
			}

			function store_request(req)
			{
				localStorage.setItem(localStorage.count,"<div class='req'><div class='request'>"+req+"</div></div>");
				localStorage.count = Number(localStorage.count) + 1;
			}

			function store_response(res)
			{
				localStorage.setItem(localStorage.count,"<div class='res'><div class='response'>"+res+"</div></div>");
				localStorage.count = Number(localStorage.count) + 1;
			}

			function call_php()
			{
				var x = $("input#userinput").val();
				if(x.length !== 0)
				{
					store_request(x);
					$("div.display").append("<div class='req'><div class='request'>"+x+"</div></div>");
					$("input#userinput").val("");
					$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},200);
					$.ajax({
						type: "POST",
						url: "query.php",
						data: {usermsg: x},
						success: function(response)
						{
							store_response(response);
							$("div.display").append("<div class='res'><div class='response'>"+response+"</div></div>");
							$("input#userinput").focus();
							$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},900);
							playAudio();
						}
					});
				}
			}
						
			function option_select(val)
			{
				store_request(val);
				$("div.display").append("<div class='req'><div class='request'>"+val+"</div></div>");
				$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},200);
				$.ajax({
					type: "POST",
					url: "options.php",
					data: {selected_opt: val},
					success: function(response)
					{
						store_response(response);
						$("div.display").append("<div class='res'><div class='response'>"+response+"</div></div>");
						$("input#userinput").focus();
						$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},900);
						playAudio();
					}
				});
			}

			function suggest_option(val)
			{
				store_request(val);
				$("div.display").append("<div class='req'><div class='request'>"+val+"</div></div>");
				$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},200);
				$.ajax({
					type: "POST",
					url: "query.php",
					data: {suggest_yn: val},
					success: function(response)
					{
						store_response(response);
						$("div.display").append("<div class='res'><div class='response'>"+response+"</div></div>");
						$("input#userinput").focus();
						$('div.display').animate({scrollTop: $('div.display').get(0).scrollHeight},900);
						playAudio();
					}
				});
			}
        </script>
</head>
<body>
    <audio id="aud">
        <source src="media/response.mp3" type="audio/mpeg">
        <source src="media/response.ogg" type="audio/ogg">
    </audio>
    <div id="chatbox_oc" class="mainbox">
        <div class="topbox">
            <div style='height:46px' id="copyright"><center><b style="letter-spacing:1px">UNIBOT</b></center></div>
            <div class="close_symbol">
				<button type="submit" name="btn_close" style="outline:none;background:none;border:none;" class="close_button" onclick="close_box()"><center>
					<img id="close_chatbox" width="25px" height="20px" src="img/close.png" alt="Close"/></center>
				</button>
            </div>
        </div>
        <div class="display">
            <?php
				date_default_timezone_set("Asia/Calcutta");
				$time = date("H");
				if ($time < "12") {
					$ans_start = "Good Morning.<br>Welcome to UNIBOT.";
				} else
				if ($time >= "12" && $time < "17") {
					$ans_start = "Good Afternoon.<br>Welcome to UNIBOT.";
				} else
				if ($time >= "17" && $time < "20") {
					$ans_start = "Good Evening.<br>Welcome to UNIBOT.";
				} else
				if ($time >= "20") {
					$ans_start = "Welcome to UNIBOT.";
				}
			?>
			<div class='res'><div class='response'><?php echo $ans_start; ?></div></div>
        </div>
        <div class="bottombox">
            	<div class="form_send">
                    <input type="text" onkeypress="return small(event)" id="userinput" class="message" name="usermsg"/>
                    <input type='submit' onclick="call_php()" name='btn_sub' class='sendbox' value='SEND'/>
                </div>
        </div>
    </div>
	<div id="chat_symbol_oc" class="img_corner">
		<button type="submit" name="btn_open" onclick="open_box()" style="background: none;border:none;outline:none;"><img class="imag" src="img/chat_symbol.png" alt="message_icon"/></button>
	</div>