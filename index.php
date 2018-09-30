<?php
include("header.php");

$newroom=$_GET['newroom'];

if (!$newroom)
{
if ($_GET['r']) $room=$_GET['r'];
if ($_POST['r']) $room=$_POST['r'];

if ($room=="Private") $room=$room."_".base_convert((time()-1258100000).rand(0,10),10,36)

?><br />
		
<form id="adminForm" name="adminForm" method="post" action="videowhisper_conference.php" onSubmit="return censorName()">
  <p><b>Enter Video Conference</b><br />
    Username
	<script language="JavaScript">
			function censorName()
			{
				document.adminForm.username.value = document.adminForm.username.value.replace(/^[\s]+|[\s]+$/g, '');
				document.adminForm.username.value = document.adminForm.username.value.replace(/[^0-9a-zA-Z_\-]+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/\-+/g, '-');
				document.adminForm.username.value = document.adminForm.username.value.replace(/^\-+|\-+$/g, '');
				if (document.adminForm.username.value.length>2) return true;
				else return false;
				
			}
			
			</script>
  <input name="username" type="text" id="username" value="Guest" size="12" maxlength="12" onChange="censorName()" />
    
    <input type="submit" name="button" id="button" value="Enter Chat" onclick="this.disabled=true; censorName(); this.value='Loading...'; adminForm.submit();" />
    
    <br />
    <br />
    
    User Type 
    <select name="usertype" id="usertype">
      <option value="0" selected="selected">Regular</option>
      <option value="1">Male</option>
      <option value="2">Female</option>
      <option value="3">Administrator</option>
    </select>
    <br />
    <input name="room" type="hidden" id="room" value="<?=$room?>" /> 
    <?php
    if ($room) 
	{
		$roomlink="http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."?r=".urlencode($room);
		echo "Private room: <B>$room</B>. Private room link: <a href='$roomlink'>$roomlink</a>";
	}
	?>
  </p>
  <p><a href="index.php?newroom=1"> Create Private Room<br />
  </a></p>
  
		
  <?php
include("settings.php");
if (strstr($rtmp_server, "://localhost/")) echo "<P class='warning'>Warning: You are using a localhost based rtmp address ( $rtmp_server ). Unless you are just testing this with a rtmp server on your own computer, make sure you fill a <a href='http://www.videowhisper.com/?p=RTMP+Applications'>compatible rtmp address</a> in settings.php.</P>";
?>
	
</form>
<div class="info">
  <p><b>Suggestions</b></p>

  <?php include("flash_detect.php");?>

    <p>When the application starts, flash will ask you if you want to start streaming your camera and microphone. Allow flash to send your stream and then select the right video and audio devices you want to use. 
  <p>There are 2 ways to select hardware devices/drivers you'll use for broadcasting:<br />
    A. Click inside webcam preview panel and a settings panel will extend it. Click camera or microphone to select.<br />
  B. Right click Flash &gt; Settings... and browse to the webcam/microphone minitabs.</p>
</div>
<?php
}
else
{
	?>
    <form id="adminForm" name="adminForm" method="post" action="index.php" onSubmit="return censorName()">
      <p><b>Create Private Room</b>
        <br />
        Room Name
			<script language="JavaScript">
			function censorName()
			{
				document.adminForm.r.value = document.adminForm.r.value.replace(/^[\s]+|[\s]+$/g, '');
				document.adminForm.r.value = document.adminForm.r.value.replace(/[^0-9a-zA-Z_\-]+/g, '-');
				document.adminForm.r.value = document.adminForm.r.value.replace(/\-+/g, '-');
				document.adminForm.r.value = document.adminForm.r.value.replace(/^\-+|\-+$/g, '');
				if (document.adminForm.r.value.length>2) return true;
				else return false;
			}
			</script>
        <input name="r" type="text" id="r" value="Private" size="12" maxlength="12" onChange="censorName()"  />
        <input type="submit" name="button" id="button" value="Create" onclick="this.disabled=true; censorName(); this.value='Loading...'; adminForm.submit();" />
      </p>
</form>
	<?php
}

include("clean_older.php");
?>