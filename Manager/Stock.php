<?php
ob_start();
session_start();
// include("SessionValidator.php");
include("../Asset/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btnsubmit"]))
{
	 $date=$_POST["txtdate"];
	 $qty=$_POST["txtqty"];
	 $pid = $_POST["txt_pid"];
	 
	 $insqry="insert into tbl_stock(stock_date,stock_qty,item_id)values('".$date."','".$qty."','".$pid."')";
	 if($con->query($insqry))
			{
				?>
            	<script>
						alert('inserted!!');
						location.href='Stock.php?pid=<?php echo $pid;?>';
					</script>
				<?php
			}
			else
			{
				?>
            	<script>
						alert('failed!');
						location.href='Stock.php';
				</script>
                <?php
			}
}
	 
	 
	 
   if(isset($_GET["did"]))
   {
      $id = $_GET["did"];
	
	  $delQry = "delete from tbl_stock where stock_id='".$id."'";
	  if($con->query($delQry))
	  {
				?>
					<script>
						alert('Deleted');
						location.href='Stock.php?pid=<?php echo $_GET["pid"];?>';
					</script>
				<?php
	  }
	  else
	  {
				?>
					<script>
						alert('Failed');
						location.href='Stock.php';
					</script>
				<?php
	  }



  }



?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GalerieDArt::Stock</title>
</head>
<body background="../Asset/Files/ItemPhoto/AdobeStock_214335178.jpeg";>
    <!-- color: #43567;> -->
<!-- <body style="background-color:deepskyblue" > -->
<!-- <body style="background-color:#cc66ff;"> -->
<div id="tab" align="center" >
<h1>Stock</h1>
<form id="form1" name="form1" method="post" action="" >
<input type="hidden" name="txt_pid" value="<?php echo $_GET["pid"]; ?>" />
  <table width="200" border="1">
    <tr>
      <td width="87">Date</td>
      <td width="97"><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate"  required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><label for="txtqty"></label>
      <input type="number" name="txtqty" id="txtqty"  required="required" autocomplete="off" /></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
   <?php
  $i=0;
  $selQrys = "select * from tbl_stock where item_id='".$_GET["pid"]."'";
  $Results = $con->query($selQrys);
  if($Results->num_rows > 0)
  {
	  ?>
  <table width="267" border="1">
    <tr>
      <td width="59">SL.NO</td>
      <td width="48">Date</td>
      <td width="72">Quantity</td>
      <td width="60">Action</td>
    </tr>
    
     <?php
		   while($row = $Results->fetch_assoc())
		  {
			  $i++;
			  ?>
              	 <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row["stock_date"]; ?></td>
                  <td><?php echo $row["stock_qty"]; ?></td>
                  <td><a href="Stock.php?did=<?php echo $row["stock_id"];?>&pid=<?php echo $_GET["pid"]; ?>">Delete</a></td>
                </tr>
              <?php
		  }
		   ?>
  </table>
  
   <?php
  }
  else
  {
	  ?>
	  	<h1>No Data Found</h1>	  	
	  <?php
  }
  
  
  ?>
</form>
</div>
</body>
</html>
<?php
include("Foot.php");
ob_flush();
?>
