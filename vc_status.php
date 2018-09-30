<?php
/*
This is called by flash application each &statusInterval=10000 millisecons (as configured in vc_login.php script).
Returns real total credits and used timer that are used as configured by &showTimer=1&showCredit=1 .

POST Variables:
u=Username
s=Session, usually same as username
r=Room
ct=session time (in milliseconds)
lt=last session time received from this script in (milliseconds)
cam,mic=0 none, 1 disabled, 2 enabled
*/

$room=$_POST[r];
$session=$_POST[s];
$username=$_POST[u];

$currentTime=$_POST[ct];
$lastTime=$_POST[lt];

$cam=$_POST['cam'];
$mic=$_POST['mic'];

$maximumSessionTime=0; //900000ms=15 minutes

$disconnect=""; //anything else than "" will disconnect with that message
?>timeTotal=<?=$maximumSessionTime?>&timeUsed=<?=$currentTime?>&lastTime=<?=$currentTime?>&disconnect=<?=$disconnect?>&loadstatus=1