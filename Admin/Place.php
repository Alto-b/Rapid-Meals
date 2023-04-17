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
if(isset($_POST["btn_save"]))
{
	$place=$_POST["txt_name"];
	$disid=$_POST["sel_name"];
	$hid=$_POST["txt_id"];
	if($hid!="")
	{
		$updQry="update tbl_place set place_name='".$district."' where place_id='".$hid."'";
		if($con->query($updQry))
		{
			header("Location:Place.php");
		}
		
	}
	else	
	{
		$insQry="insert into tbl_place(place_name,district_id)values('".$place."','".$disid."')";
		if($con->query($insQry))
		{
			?>
        	<script>
			alert("Data Inserted");
			window.location("Place.php");
			</script>
        	<?php
		}
		else
		{
			?>
        	<script>
			alert("Failed");
			window.location("Place.php");
			</script>
        	<?php
		}
	}
}

if(isset($_GET["did"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["did"]."'";
	if($con->query($delQry))
	{
		header("Location:Place.php");
	}
	else
	{
		?>
        <script>
		alert("Deletion Failed");
		window.location("Place.php");
		</script>
        <?php
	}
}
$editID="";
$editName="";
$edisid="";

if(isset($_GET["eid"]))
{
	$selQryE="select * from tbl_place where place_id='".$_GET["eid"]."'";
	$rowE=$con->query($selQryE);
	if($data1=$rowE->fetch_assoc())
	{
	$editID=$data1["place_id"];
	$editName=$data1["place_name"];
	$edisid=$data1["district_id"];
	}
}
?>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="Place.php">
  <table width="393" border="1" style="border-collapse:collapse">
    <tr>
      <td width="79">District</td>
      <td width="167"><label for="sel_name2"></label>
        <select name="sel_name" id="sel_name2">
        <option value="">---select---</option>
        <?php
		$seldis="select * from tbl_district";
		$rowdis=$con->query($seldis);
		while($datadis=$rowdis->fetch_assoc())
		{
			?>
            <option value="<?php echo $datadis["district_id"]?>"><?php echo $datadis["district_name"]?></option>
            <?php
		}
		?>
        </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
       <input type="hidden" name="txt_id"   value="<?php echo $editID;?>"/>
       <input type="text" name="txt_name"  id="txt_name" value="<?php echo $editName;?>" autocomplete="off" required="" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="save" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
       
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="429" height="70" border="1">
    <tr>
      <th width="100" height="65" align="center">SI No</th>
      <th width="101" align="center">District Name</th>
      <th width="100" align="center">Place Name</th>
      <th width="120" align="center">Action</th>
    </tr>
    </tr>
    <?php
	$selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
	$row=$con->query($selQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><?php echo $data["district_name"]?></td>
    <td><?php echo $data["place_name"]?></td>
    <td><a href="Place.php?did=<?php echo $data["place_id"]?>">Delete</a>/ 
    <a href="Place.php?eid=<?php echo $data["place_id"]?>">Edit</a></td>
    
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