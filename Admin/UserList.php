<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");
?>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table  border="1" style="border-collapse:collapse">
    <tr>
      <th >id</th>
       <th>Name</th>
      <th >Contact</th>
      <th >Email</th>
      <th >Address</th>
      <th >Gender</th>
      <th>District</th>
      <th >Place</th>
      <th>Photo</th>
      <th>Proof</th>
    </tr>
    <tr>
    <?php
	$selQry="select * from tbl_user u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id";
	$row=$con->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["user_name"]?></td>
    <td><?php echo $data["user_contact"]?></td>
    <td><?php echo $data["user_email"]?></td>
    <td><?php echo $data["user_address"]?></td>
    <td><?php echo $data["user_gender"]?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"]?></td>
    <td><img src="../Asset/Files/UserPhoto/<?php echo $data["user_photo"]?>" width="180" height="120" /></td>
    <td><img src="../Asset/Files/UserPhoto/<?php echo $data["user_proof"]?>" width="180" height="120"></td>
    </tr>
    <?php
	}
	?>
  
  </table>
</form>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>