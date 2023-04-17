<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//session_start();
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");

?>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <th>Sl.No</th>
      <th>Complaint</th>
      <th>Date</th>
      <th>User</th>
      <th>Action</th>
    </tr>
     <?php
	$selqry="select * from tbl_complaint where complaint_status=0";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["complaint_content"]?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><?php echo $data["user_id"]?></td>
      <td> <a href="Reply.php?aid=<?php echo $data["complaint_id"]?>">Reply</a></td>
      
   	<?php
		}
		?>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<table width="555" height="175" border="1">
    <tr>
      <th>Sl.No</th>
      <th>Complaint </th>
      <th>Date</th>
      <th>Reply</th>
    </tr>
    
    <?php
	$selqry="select * from tbl_complaint where complaint_status=1";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
        
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["complaint_content"]?></td>
      <td><?php echo $data["complaint_date"]?></td>
      <td><?php echo $data["complaint_reply"]?></td>
     
     
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