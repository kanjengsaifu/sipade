<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Countdown to 50</title>
    <link href="style.css" rel="stylesheet" />
    <audio id="clock" autoplay="true" loop="false">
      <source src="clock.mp3" type="audio/mp3" />
      Your browser does not support the audio tag.
    </audio>
</head>
<body>

    <div role="main">
        <section id="countdown"></section>
    </div>
	
<script type="text/javascript">
var target_date = new Date("Sep 20, 2014").getTime(); 
var days, hours, minutes, seconds; 
var countdown = document.getElementById("countdown"); 
setInterval(function () {
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;     
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;     
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
  countdown.innerHTML = days + " <span class=\'putih\'>hari</span> " + hours + " <span class=\'putih\'>jam</span> "
  + minutes + " <span class=\'putih\'>menit</span> " + seconds + " <span class=\'putih\'>detik menuju</span> 2014";   
  if(seconds <= 0){
                document.getElementById('countdown').textContent = "HAPPY BIRTHDAY!";
            }
  }, 1000);
</script>
</body>
</html>
