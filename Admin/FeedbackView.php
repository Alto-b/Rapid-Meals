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
<h2 >feedback view</h2>
    </tr>
    <tr>
      <th>Sl.No</th>
      <th>Content</th>
      <th>Date</th>
    </tr>
       <?php
	$selqry="select * from tbl_feedback" ;
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
   
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["feedback_content"]?></td>
      <td><?php echo $data["feedback_date"]?></td>
      
      <?php
		}
		?>
   
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