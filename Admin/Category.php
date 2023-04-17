<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<?php

ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");

if(isset($_POST["btnsubmit"]))
{
	$Category=$_POST["txtcat"];
	$hid=$_POST["txtid"];
	if($hid!="")
	{
		$upQry="update tbl_category set category_name='".$Category."' where category_id='".$hid."'";
		if($con->query($upQry))
		{
			header("Location:Category.php");
		}
	}
	else
	{
	$insqry="insert into tbl_category(category_name)values('".$Category."')";
	if($con->query($insqry))
	{
		?>
        <script>
        alert("Data Inserted");
		window.location("Category.php");
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location("Category.php");
		</script>
        <?php
		}
}
}
if(isset($_GET["did"]))
{
	
	$delQry="delete from tbl_category where category_id='".$_GET["did"]."'";
	if($con->query($delQry))
	{
		?>
		<script>
		alert("Deleted");
		window.location="Category.php";
		</script>
		<?php
		}
	else
	{
		?>
		<script>
		alert("Deletion Failed");
		window.location="Category.php";
		</script>
		<?php
	}
}
$did="";
$dname="";
if(isset($_GET["eid"]))
{
	$selqry1="select * from  tbl_category where category_id='".$_GET["eid"]."'";
	$row1=$con->query($selqry1);
	$data1=$row1->fetch_assoc();
	$did=$data1["category_id"];
	$dname=$data1["category_name"];
}


?>

<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="Category.php">
  <table width="340" border="1" style="border-collapse:collapse">
    <tr>
      <td width="60">Category</td>
      <td width="171"><label for="txtcat"></label>
      <input type="hidden" name="txtid" value="<?php echo $did?>" required="required"/>
      <input type="text" name="txtcat" id="txtcat" value="<?php echo $dname?>" autocomplete="off" required="required" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
        <input type="submit" name="btncancel" id="btncancel" value="cancel" />
      </div>
       
    </tr>
  </table>
  <table width="366" border="1">
    <tr>
      <th width="92">SI No</th>
      <th width="124">Category Name</th>
      <th width="128">Action</th>
    </tr>
    <tr>
    <?php
	$selqry="select * from tbl_category";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
    </tr>
    <tr>
        	<td><?php echo $i?> </td>
            <td><?php echo $data["category_name"]?></td>
            <td><a href="Category.php?did=<?php echo $data["category_id"]?>">Delete</a>/<a href="Category.php?eid=<?php echo $data["category_id"]?>">Edit</a></td>
			
    </tr>
        <?php
		}
		?>
 </table>
 <p>&nbsp;</p>
</form>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
