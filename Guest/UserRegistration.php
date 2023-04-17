<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New User Reg</title>
</head>

<body>

<?php
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");



if(isset($_POST["btn_submit"]))
{
$name=$_POST["txt_name"];
$contact=$_POST["txt_contact"];
$email=$_POST["txt_email"];
$address=$_POST["txt_Address"];
$gender=$_POST["gender"];
$place=$_POST["list_place"];

$photo=$_FILES["file_photo"]["name"];
$temp=$_FILES["file_photo"]["tmp_name"];
move_uploaded_file($temp,"../Asset/Files/UserPhoto/".$photo);

$proof=$_FILES["file_proof"]["name"];
$temp=$_FILES["file_proof"]["tmp_name"];
move_uploaded_file($temp,"../Asset/Files/UserProof/".$proof);

$password=$_POST["txt_password"];

echo $insQry="insert into tbl_user(user_name,user_contact,user_email,user_address,user_gender,place_id,user_photo,user_proof,user_password)values('".$name."','".$contact."','".$email."','".$address."','".$gender."','".$place."','".$photo."','".$proof."','".$password."')";

	if($con->query($insQry))
		{
			?>
			<script>
			alert("data inserted");
			window.location="UserRegistration.php";
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert("insertion failed");
			window.location="UserRegistration.php";
			</script>
			<?php
		}
}
?>
<div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="384" border="1" style="border-collapse:collapse">
    <tr>
      <td width="103">NAME</td>
      <td width="265"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td>CONTACT</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" autocomplete="off" pattern="[6-9]{1}[0-9]{9}" 
                title="Phone number should start with 6-9 and remaing 9 digit with 0-9"/></td>
    </tr>
    <tr>
      <td>EMAIL</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>ADDRESS</td>
      <td><label for="txt_Address"></label>
      <input type="text" name="txt_Address" id="txt_Address" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>GENDER</td>
      <td><input type="radio" name="gender" id="radio_gender" value="M" />MALE       
        <input type="radio" name="gender" id="radio_gender" value="F" />FEMALE
      <input type="radio" name="gender" id="radio_gender2" value="O" />OTHERS</td>
    </tr>
    <tr>
      <td>DISTRICT</td>
      <td><label for="list_district"></label>
        <select name="list_district" id="list_district" onchange="getPlace(this.value)">
        <option>---select---</option>
        <?php
		$seldis="select * from tbl_district";
		$rowdis=$con->query($seldis);
		while($datadis=$rowdis->fetch_assoc())
		{
			?>
            <option value="<?php echo $datadis["district_id"]?>"><?php echo $datadis["district_name"]?></option>
            <?php
		}
		?>
        
      </select></td>
    </tr>
    <tr>
      <td>PLACE</td>
      <td><label for="list_place"></label>
        <select name="list_place" id="txt_place">
        <option>---select---</option>
      </select></td>
    </tr>
    <tr>
      <td>PHOTO</td>
      <td align="left"><label for="file_image"></label>
        <label for="txt_photo"></label>
      <input type="file" name="file_photo" id="txt_photo" required="" autocomplete="off" /></td>
    </tr>
      <tr>
      <td>PROOF</td>
      <td align="left"><label for="file_image"></label>
        <label for="txt_proof"></label>
      <input type="file" name="file_proof" id="txt_proof" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="txt_pass" /></td>
    </tr>
    <tr>
      <td>CONFIRM PASSWORD</td>
      <td><label for="txt_cpassword"></label>
      <input type="password" name="txt_cpassword" id="txt_cpassword" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"  /></td>
    </tr>
  </table>
  
</form>
  </div>
</body>
<script src="../Asset/JQuery/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Asset/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#txt_place").html(html);
		}
	});
}
</script>
<?php
include("Foot.php");
ob_flush();
?>
</html>