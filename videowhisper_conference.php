<?php
if (!$_POST["username"]||$_POST["username"]=="Guest") $username="Guest".rand(1000,9999);
else $username=$_POST["username"];
$username=preg_replace("/[^0-9a-zA-Z_]/","-",$username);
$usertype=$_POST["usertype"];
$userroom=$_POST["room"];
$userroom=preg_replace("/[^0-9a-zA-Z\s_]/","-",$userroom);
setcookie("username",urlencode($username),time()+72000);
setcookie("usertype",urlencode($usertype),time()+72000);
if ($userroom) setcookie("userroom",urlencode($userroom),time()+72000);
?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$username?> : VideoWhisper.com Conference</title>
</head>
<body bgcolor="#5a5152" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
$swfurl="videowhisper_conference.swf?ssl=1&room=" . $userroom;
$bgcolor="#5a5152";
?>
<object width="100%" height="100%">
<param name="movie" value="<?=$swfurl?>"></param><param bgcolor="<?=$bgcolor?>"><param name="scale" value="noscale" /> </param><param name="salign" value="lt"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed width="100%" height="100%" scale="noscale" salign="lt" src="<?=$swfurl?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" bgcolor="<?=$bgcolor?>"></embed>
</object>
<noscript>
<p align=center><a href="http://www.videowhisper.com/?p=Video+Conference"><strong>VideoWhisper Video Conference
Software</strong></a></p>
<p align="center"><strong>This content requires the Adobe Flash Player:
<a href="http://www.macromedia.com/go/getflash/">Get Flash</a></strong>!</p>
</noscript>
</body>
</html>
