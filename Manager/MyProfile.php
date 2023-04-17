<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include("../Asset/Connection/Connection.php");
session_start();
ob_start();
include("SessionValidator.php");
include("Head.php");
$selQry="select * from tbl_manager u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id  where manager_id='".$_SESSION["mid"]."'";
//echo $selQry;
$row=$con->query($selQry);
$data=$row->fetch_assoc();

?>
<body> 
  <br><br>
  <div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" style="border-collapse:collapse">
    <tr>
      <td height="60">NAME</td>
      <td><?php echo $data["manager_name"]?></td>
    </tr>
    <tr>
      <td height="60">CONTACT</td>
      <td><?php echo $data["manager_contact"]?></td>
    </tr>
    <tr>
      <td height="60">EMAIL</td>
      <td><?php echo $data["manager_email"]?></td>
    </tr>
    <tr>
      <td height="60">ADDRESS</td>
      <td><?php echo $data["manager_address"]?></td>
    </tr>
    <tr>
      <td height="60">GENDER</td>
      <td><?php echo $data["manager_gender"]?></td>
    </tr>
    <tr>
      <td height="60">DISTRICT</td>
      <td><?php echo $data["district_name"]?></td>
    </tr>
    <tr>
      <td height="60">PLACE</td>
      <td><?php echo $data["place_name"]?></td>
    </tr>
    <tr>
      <td height="60">PHOTO</td>
      <td><img src="../Asset/Files/UserPhoto/<?php echo $data["manager_photo"]?> "width='150' height='150'></td>
    </tr>
    <tr>
      <td height="60">PROOF</td>
      <td><img src="../Asset/Files/UserProof/<?php echo $data["manager_proof"]?>"width='150' height='150'></td>
    </tr>
  </table>
</form>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>