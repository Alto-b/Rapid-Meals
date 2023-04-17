<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
include("SessionValidator.php");
include("Head.php");
include("../Asset/Connection/Connection.php");
if(isset($_POST["btn_add"]))
{
	$title=$_POST["txt_title"];
	$price=$_POST["txt_price"];
	
	$photo=$_FILES["file_photo"]["name"];
	$temp=$_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($temp,"../Asset/Files/PackageHead/".$photo);

	
	$details=$_POST["txt_details"];
	
	$insqry="insert into tbl_packagehead(package_title,package_price,package_photo,package_details)values('".$title."','".$price."','".$photo."','".$details."')";
	
	if($con->query($insqry))
	{
		?>
        <script>
        alert("Data Inserted")
		window.location="PackageHead.php";
		</script><script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location="PackageHead.php";
		</script>
        <?php
	}
	}



?>

<div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" style="border-collapse:collapse">
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td> TITLE</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td> PRICE</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td> PHOTO</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td> DETAILS</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5" required="required" autocomplete="off" ></textarea></td>
    </tr>
    <tr>
      <td align="center"colspan="2"><input type="submit" name="btn_add" id="btn_add" value="ADD" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>TITLE</td>
      <td>PRICE</td>
      <td>PHOTO</td>
      <td>DETAILS</td>
      <td>ACTION</td>
      <td>&nbsp;</td>
    </tr>
    <?php
	$selqry="select * from tbl_packagehead ";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
    <tr>
      <td><?php echo $data["package_title"] ?></td>
      <td><?php echo $data["package_price"] ?></td>
      <td><img src="../Asset/Files/PackageHead/<?php echo $data["package_photo"]?>" width="180" height="120"</td>
      <td><?php echo $data["package_details"] ?></td>
      <td><a href="PackageBody.php?pid=<?php echo $data["package_id"]?>">ADD ITEM</a></td>
      <td>&nbsp;</td>
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