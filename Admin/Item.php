<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ItemDetails</title>
</head>

<body>

<?php

ob_start();
include("Head.php");
include("../Asset/Connection/Connection.php");

if(isset($_POST["btn_add"]))
{
	$item=$_POST["txt_name"];
	$price=$_POST["txt_price"];
	$details=$_POST["txt_details"];
	$cat=$_POST["list_cat"];
	
	$type=$_POST["list_type"];
	
	$photo=$_FILES["file_photo"]["name"];
	

	
	if(isset($_GET["eid"]))
	{
		if($photo=="")
		{
		
		echo $upqry="update tbl_item set item_name='".$item."' , item_price='".$price."' , item_details='".$details."' , category_id='".$cat."' , type_id='".$type."' where item_id='".$_GET["eid"]."'";
		if($con->query($upqry))
		{
		?>
         <script>
        alert("Data updated")
		window.location="Item.php";
		</script>
        <?php
		}
		}
		else
		{
			 $temp=$_FILES["file_photo"]["tmp_name"];
   			 move_uploaded_file($temp,"../Asset/Files/ItemPhoto/".$photo);
			echo $upqry="update tbl_item set item_name='".$item."' , item_price='".$price."' , item_details='".$details."' , category_id='".$sub."' , type_id='".$type."' , item_photo='".$photo."' where item_id='".$_GET["eid"]."'";
			 if($con->query($upqry))
				{
				?>
				 <script>
				alert("Data updated")
				window.location="Item.php";
				</script>
				<?php
				}
			
		}
	}
	else
	{
		$temp=$_FILES["file_photo"]["tmp_name"];
   		 move_uploaded_file($temp,"../Asset/Files/ItemPhoto/".$photo);
	$insqry="insert into tbl_item(item_name,item_price,item_details,item_photo,category_id,type_id)values('".$item."','".$price."','".$details."','".$photo."','".$cat."','".$type."')";
	// echo $insqry;
	
	if($con->query($insqry))
	{
		?>
        <script>
        alert("Data Inserted")
		window.location="Item.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("failed");
		window.location="Item.php";
		</script>
        <?php
	}
	}
}


if(isset($_GET["did"]))
{
	
	$delQry="delete from tbl_item where item_id='".$_GET["did"]."'";
	
	if($con->query($delQry))
	{
		header("Location:Item.php");
	}
	else
	{
		?>
		<script>
		alert("Deletion Failed");
		window.location("Item.php");
		</script>
		<?php
	}
}
	$did="";
	$dname="";
	$dprice="";
	$details="";
	$dphoto="";
	$dtype="";
	$dcatid="";
if(isset($_GET["eid"]))
{
	$selqry1="select * from tbl_item i inner join tbl_type t on t.type_id=i.type_id INNER JOIN tbl_category c on c.category_id=i.category_id where item_id='".$_GET["eid"]."'";
	$row1=$con->query($selqry1);
	$data1=$row1->fetch_assoc();
	
	$did=$data1["item_id"];
	$dname=$data1["item_name"];
	$dprice=$data1["item_price"];
	$details=$data1["item_details"];
	$dphoto=$data1["item_photo"];
	$dtype=$data1["type_id"];
	$dcatid=$data1["category_id"];
	
	
}



?>
<div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" style="border-collapse:collapse">
    <tr>
      <td align="center"colspan="2">ITEM TYPE</td>
    </tr>
    <tr>
      <td>Item Name :</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" value="<?php echo $dname;?>"/></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" required="required" autocomplete="off" value="<?php echo $dprice;?>"/></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5" required="required" ><?php echo $details;?></textarea></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="file_photo"></label>
      <?php if(isset($_GET["eid"])) {?>
      <img src="../Asset/Files/ItemPhoto/<?php echo $dphoto;?>"  height="120" width="120"/>
      <?php }?>
      <input type="file" name="file_photo" id="file_photo" <?php if(isset($_GET["eid"])){} else{ echo "required"; }?> /></td>
    </tr>
    <tr>
      <td>Type </td>
      <td><label for="list_type"></label>
        <select name="list_type" id="list_type" >
         <option value="">---select---</option>
        <?php
		$seldis="select * from tbl_type";
		$rowdis=$con->query($seldis);
		while($datadis=$rowdis->fetch_assoc())
		{
			?>
            <option value="<?php echo $datadis["type_id"]?>"<?php if($datadis["type_id"]==$dtype) echo "selected"; ?>><?php echo $datadis["type_name"]?></option>
            <?php
		}
		?>
       </select></td>
    </tr>
    
     <tr>
       <td>Category</td>
      <td><label for="list_cat"></label>
        <select name="list_cat" id="list_cat" >
         <option value="">---select---</option>
        <?php
		$seldis="select * from tbl_category";
		$rowdis=$con->query($seldis);
		while($datadis=$rowdis->fetch_assoc())
		{
			?>
            <option value="<?php echo $datadis["category_id"]?>"<?php if($datadis["category_id"]==$dcatid) echo "selected"; ?>><?php echo $datadis["category_name"]?></option>
            <?php
		}
		?>
       </select></td>
    </tr>
     
    
     
     
     
    <tr>
       <td align="center" colspan="2"><input type="submit" name="btn_add" id="btn_add" value="Submit" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <th>ITEM</th>
      <th>PRICE</th>
      <th>DETAILS</th>
      <th>PHOTO</th>
      <th>TYPE</th>
      <th>CATEGORY</th>
      <th>Action</th>
      
    </tr>
    <?php
	$seli="select * from tbl_item i inner join tbl_type t on t.type_id=i.type_id INNER JOIN tbl_category c on c.category_id=i.category_id";
	
	$row=$con->query($seli);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
		
	?>
	
    <tr>
   
    <td><?php echo $data["item_name"]?></td>
    <td><?php echo $data["item_price"]?></td>
    <td><?php echo $data["item_details"]?></td>

    <td><img src="../Asset/Files/ItemPhoto/<?php echo $data["item_photo"]?>" width="180" height="120" /></td>
       
   <td><?php echo $data["type_name"]?></td>
   <td><?php echo $data["category_name"];?></td>
   
	<td><a href="Item.php?did=<?php echo $data["item_id"]?>">Delete</a>/<a href="Item.php?eid=<?php echo $data["item_id"]?>">Edit</a></td>
			
	 
        
         
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
<script src="../Asset/JQuery/jQuery.js"></script>
<script>

function getSub(did)
{
	var id = document.getElementById("list_type").value;
	
	$.ajax({
		url:"../Asset/AjaxPages/AjaxSub.php?cid="+did+"&tid="+id,
		success: function(html){
			$("#list_sub").html(html);
		}
	});
}

</script>