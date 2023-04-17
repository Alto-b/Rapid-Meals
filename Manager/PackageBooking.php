<?php
ob_start();
session_start();
include("SessionValidator.php");
include("Head.php");
include("../Asset/Connection/Connection.php");

$selqry="select * from tbl_packagebooking b  inner join tbl_packagehead p on p.package_id=b.package_id inner join tbl_user u on u.user_id=b.user_id";
$result=$con->query($selqry);	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
</head>

<body>
<div id="tab" align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>SlNO</td>
      <td>Package</td>
      <td>Photo</td>
      <td>Date</td>
      <td>User</td>
      <td>Price</td>
      <td>Status</td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		 $i++;
  ?>
  <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["package_title"];?></td>
          <td><img src="../Asset/Files/PackageHead/<?php echo $row["package_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["pbooking_date"];?></td>
          <td><?php echo $row["user_name"];?></td>
          <td><?php echo $row["package_price"];?></td>
          <td>
                        Payment Completed 
                       
          </td>

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