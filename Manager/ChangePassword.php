<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<?php
session_start();
ob_start();
include("SessionValidator.php");
include("Head.php");
include("../Asset/Connection/Connection.php");
if(isset($_POST["btn_change"]))
{
$selQry="select * from tbl_manager where manager_id='".$_SESSION["uid"]."' and manager_password='".$_POST["txt_old"]."'";	

$row=$con->query($selQry);
if($data=$row->fetch_assoc())
{
	$opass=$_POST["txt_new"];
	$npass=$_POST["txt_confirm"];
	if($opass==$npass)
		{
		$upQry1="update tbl_manager set manager_password='".$npass."' where manager_id='".$_SESSION["uid"]."'";
		$con->query($upQry1);	
			
		}
		else
    {
			?>
            <script>
			alert("wrong password");
		window.location("ChangePassword.php");
		</script>
        <?php
		}
}

}
		
?>


<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="478" height="185" border="1" style="border-collapse:collapse">
    <tr>
      <td>CURRENT PASSWORD</td>
      <td><label for="txt_old"></label>
      <input type="password" name="txt_old" id="txt_old" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>NEW PASSWORD</td>
      <td><label for="txt_new"></label>
      <input type="password" name="txt_new" id="txt_new" required="required" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass"/></td>
    </tr>
    <tr>
      <td>CONFIRM PASSWORD</td>
      <td><label for="txt_confirm"></label>
      <input type="password" name="txt_confirm" id="txt_confirm" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_change" id="btn_change" value="CHANGE" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>