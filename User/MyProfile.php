<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");
session_start();

$selQry="select * from tbl_user u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where user_id='".$_SESSION["uid"]."' ";
$row=$con->query($selQry);
$data=$row->fetch_assoc();

?>
<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" style="border-collapse:collapse">
    <tr>
      <td height="60">NAME </td>
      <td><?php echo $data["user_name"]?></td>
    </tr>
    <tr>
      <td height="60">CONTACT</td>
      <td><?php echo $data["user_contact"]?></td>
    </tr>
    <tr>
      <td height="60">EMAIL</td>
      <td><?php echo $data["user_email"]?></td>
    </tr>
    <tr>
      <td height="60">ADDRESS</td>
      <td><?php echo $data["user_address"]?></td>
    </tr>
    <tr>
      <td height="60">GENDER</td>
      <td><?php echo $data["user_gender"]?></td>
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
      <td >PHOTO</td>
      <td><img height="100" width="100" src="../Asset/Files/UserPhoto/<?php echo $data["user_photo"]?>"</td>
    </tr>
    <tr>
      <td >PROOF</td>
      <td><img height="100" width="100" src="../Asset/Files/UserProof/<?php echo $data["user_proof"]?>"</td>
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