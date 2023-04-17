<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RapidMeals : District</title>
</head>


<form id="form1" name="form1" method="post" action="">



<body>
<?php


include("../Asset/Connection/Connection.php");
ob_start();
include("Head.php");



if(isset($_POST["btnsave"]))
{
	$district=$_POST["txtdis"];
	$hid=$_POST["txtid"];
	if($hid!="")
	{
		$upQry="update tbl_district set district_name='".$district."' where district_id='".$hid."'";
		if($con->query($upQry))
		{
			header("Location:district.php");
		}
	}
	else
	{
	$insqry="insert into tbl_district(district_name)values('".$district."')";
	if($con->query($insqry))
	{
		?>
        <script>
        alert("Data Inserted")
		window.location="district.php";
		</script><script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location="district.php";
		</script>
        <?php
	}
	}
}
if(isset($_GET["did"]))
{
	
	$delQry="delete from tbl_district where district_id='".$_GET["did"]."'";
	
	if($con->query($delQry))
	{
		header("Location:district.php");
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
	$selqry1="select * from  tbl_district where district_id='".$_GET["eid"]."'";
	$row1=$con->query($selqry1);
	$data1=$row1->fetch_assoc();
	$did=$data1["district_id"];
	$dname=$data1["district_name"];
}

?>
<br><br><br>
<div id="tab" align="center">
 <form id="form1" name="form1" method="post" action="district.php">
  <table width="300" border="1" align="center" style="border-collapse:collapse">
    <tr>
      <td>District</td>
      <td><label for="txtdis"></label>
      <input type="hidden" name="txtid" value="<?php echo $did?>"  />
      <input type="text" name="txtdis" id="txtdis" value="<?php echo $dname?>" autocomplete="off" required="required" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
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
      <th width="168">Distric name</th>
      <th>Action</th>
    </tr>
    <?php
	$selqry="select * from tbl_district";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
        <tr>
        	<td><?php echo $i ?></td>             
            <td><?php echo $data["district_name"]?></td>
			<td><a href="district.php?did=<?php echo $data["district_id"]?>">Delete</a>/<a href="district.php?eid=<?php echo $data["district_id"]?>">Edit</a></td>
			
		</tr>
		<?php
		}
		?>
   
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
