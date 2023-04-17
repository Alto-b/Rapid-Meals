<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<div id="tab" align="center">
<body>

<?php
ob_start();
include("SessionValidator.php");
include("Head.php");
include("../Asset/Connection/Connection.php");

if (isset($_POST["btn_add"])) {
  $day = $_POST["day_list"];
  $breakfast = $_POST["txt_breakfast"];
  $lunch = $_POST["txt_lunch"];
  $snacks = $_POST["txt_snacks"];
  $dinner = $_POST["txt_dinner"];

  $sel = "select * from tbl_packagebody where body_day='".$day."' and package_id='" . $_GET["pid"] . "' ";
  $result = $con->query($sel);
  if ($data = $result->fetch_assoc()) {
    $up = "update tbl_packagebody set body_day='" . $day . "',body_breakfast='" . $breakfast . "',body_lunch='" . $lunch . "',body_snacks='" . $snacks . "',body_dinner='" . $dinner . "',package_id='" . $_POST["txt_id"] . "' where body_day='".$day."' and package_id='" . $_GET["pid"] . "'";
    $result = $con->query($up);
  } else {
    $insqry = "insert into tbl_packagebody(body_day,body_breakfast,body_lunch,body_snacks,body_dinner,package_id)values('" . $day . "','" . $breakfast . "','" . $lunch . "','" . $snacks . "','" . $dinner . "','" . $_POST["txt_id"] . "')";

    if ($con->query($insqry)) {
      ?>
<script>
        alert("Data Inserted")
		window.location="PackageBody.php?pid=<?php echo $_POST["txt_id"]; ?>";
		</script><script>
        <?php
    } else {
      ?>
        <script>
		alert("failed");
		window.location="PackageBody.php";
		</script>
        <?php
    }
  }
}



?>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table  border="1" style="border-collapse:collapse">
    
    <tr>
      <td>DAY</td>
      <td><label for="txt_day"></label>
     <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $_GET["pid"] ?>"/>
      
        <label for="day_list"></label>
        <select name="day_list" id="day_list">
          <option value="">---select---</option>
            <option value="MONDAY">MONDAY</option>
              <option value="TUESDAY">TUESDAY</option>
                <option value="WEDNESDAY">WEDNESDAY</option>
                  <option value="THURSDAY">THURSDAY</option>
                    <option value="FRIDAY">FRIDAY</option>
                      <option value="SATURDAY">SATURDAY</option>
                        <option value="SUNDAY">SUNDAY</option>
      </select></td>
    </tr>
    <tr>
      <td>BREAKFAST</td>
      <td><label for="txt_breakfast"></label>
      <input type="text" name="txt_breakfast" id="txt_breakfast" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" /></td>
    </tr>
    <tr>
      <td>LUNCH</td>
      <td><label for="txt_lunch"></label>
      <input type="text" name="txt_lunch" id="txt_lunch" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td>SNACKS</td>
      <td><label for="txt_snacks"></label>
      <input type="text" name="txt_snacks" id="txt_snacks" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z -]+[a-zA-Z  ]*$"/></td>
    </tr>
    <tr>
      <td>DINNER</td>
      <td><label for="txt_dinner"></label>
      <input type="text" name="txt_dinner" id="txt_dinner" required="required" autocomplete="off" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td align="center"colspan="2"><input type="submit" name="btn_add" id="btn_add" value="ADD" /></td>
    </tr>
    <tr>
      
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<table width="200" border="1">
  <tr>
    <td>DAY</td>
    <td>BREAKFAST</td>
    <td>LUNCH</td>
    <td>SNACKS</td>
    <td>DINNER</td>
    
  </tr>
  <?php
	$selqry="select * from tbl_packagebody where package_id='".$_GET["pid"]."'";
	$result=$con->query($selqry);
	$i=0;
	while($data=$result->fetch_assoc())
		{
			$i++;
		?>
  <tr>
    <td><?php echo $data["body_day"] ?></td>
    <td><?php echo $data["body_breakfast"] ?></td>
    <td><?php echo $data["body_lunch"] ?></td>
    <td><?php echo $data["body_snacks"] ?></td>
    <td><?php echo $data["body_dinner"] ?></td>

 
  <?php
		}
		?>
     </tr>
</table>
</body>
</div>

</html>
<?php
include("Foot.php");
ob_flush();
?>