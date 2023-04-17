<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RapidMeals : District</title>
</head>

<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">



<body>
<?php
ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");




if(isset($_POST["btnsave"]))
{
	$type=$_POST["txtdis"];
	$hid=$_POST["txtid"];
	if($hid!="")
	{
		$upQry="update tbl_type set type_name='".$type."' where type_id='".$hid."'";
		if($con->query($upQry))
		{
			header("Location:TypeDetails.php");
		}
	}
	else
	{
	$insqry="insert into tbl_type(type_name)values('".$type."')";
	if($con->query($insqry))
	{
		?>
        <script>
        alert("Data Inserted")
		window.location="TypeDetails.php";
		</script><script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location="TypeDetails.php";
		</script>
        <?php
	}
	}
}
if(isset($_GET["did"]))
{
	
	$delQry="delete from tbl_type where type_id='".$_GET["did"]."'";
	
	if($con->query($delQry))
	{
		header("Location:TypeDetails.php");
	}
	else
	{
		?>
		<script>
		alert("Deletion Failed");
		window.location("district.php");
		</script>
		<?php
	}
}
$did="";
$dname="";
if(isset($_GET["eid"]))
{
	$selqry1="select * from  tbl_type where type_id='".$_GET["eid"]."'";
	$row1=$con->query($selqry1);
	$data1=$row1->fetch_assoc();
	$did=$data1["type_id"];
	$dname=$data1["type_name"];
}

?>

<form id="form1" name="form1" method="post" action="TypeDetails.php">
  <table width="300" border="1" align="center" style="border-collapse:collapse">
    <tr>
      <td>Type Name</td>
      <td><label for="txtdis"></label>
      <input type="hidden" name="txtid" value="<?php echo $did?>"  />
      <input type="text" name="txtdis" id="txtdis" value="<?php echo $dname?>" autocomplete="off" required="required" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></td>
      
    </tr>
  </table>
  <br />
  <hr />
  <br />
  <table width="300" border="1" align="center">
    <tr>
      <th width="86">Serial No</th>
      <th width="168">Type Name</th>
      <th>Action</th>
    </tr>
    <?php
	$selqry="select * from tbl_type";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
        <tr>
        	<td><?php echo $i ?></td>             
            <td><?php echo $data["type_name"]?></td>
			<td><a href="TypeDetails.php?did=<?php echo $data["type_id"]?>">Delete</a>/<a href="TypeDetails.php?eid=<?php echo $data["type_id"]?>">Edit</a></td>
			
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
