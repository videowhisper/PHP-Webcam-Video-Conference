<?php

if ($_COOKIE["username"]) $username=$_COOKIE["username"];
$loggedin=1;
if ($_COOKIE["usertype"]) $userType=$_COOKIE["usertype"];

if ($_COOKIE["userroom"]) $room=$_COOKIE["userroom"];
if ($_GET['room_name']) $room = $_GET['room_name'];

if ($userType==3) $admin=1; else $admin=0;

if ($admin) $canKick='true'; else $canKick = 'false';

//configure a picture to show when this user is clicked
$userPicture = urlencode("uploads/_sessions/${username}_240.jpg");
$avatarPicture = urlencode("uploads/_sessions/${username}_64.jpg");
$userLink=urlencode("http://www.videowhisper.com/");
$profileDetails = "Profile details for <i>$username</i><BR>Some html tags are supported (B I FONT IMG ...).";
?>