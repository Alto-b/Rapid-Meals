<?php
ob_start();
session_start();
include("SessionValidator.php");
include("Head.php");
include("../Asset/Connection/Connection.php");

$selqry="select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_item p on p.item_id=c.item_id where booking_status>1 and cart_status>0";
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
<h1> Order Details</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>SlNO</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>User</td>
      <td>Total amount</td>
      <td>Status</td>
       <td>Delivery Time</td>
    </tr>
     <?php
	 $i=0;
	while($row=$result->fetch_assoc())
	{
		
		$qty=$row["cart_qty"];
	$price=$row["item_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["item_name"];?></td>
          <td><img src="../Asset/Files/ItemPhoto/<?php echo $row["item_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["item_price"];?></td>
          <td><?php echo $row["user_name"];?></td>
          <td><?php echo $totalamt;?></td>
          <td>
          <?php
                
					if($row["booking_status"]==1 && $row["cart_status"]==0)
					{
						echo "Payment Pending....";
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                        Payment Completed 	
                        <?php
					}
				
				?>
          </td>
<td><?php echo $row["delivery_time"];?></td>
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