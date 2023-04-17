<option>---select---</option>
        <?php
		include("../Connection/Connection.php");
		$selplace="select * from tbl_place where district_id='".$_GET["pid"]."'";
		$rowplace=$con->query($selplace);
		while($dataplace=$rowplace->fetch_assoc())
		{
			?>
            <option value="<?php echo $dataplace["place_id"]?>"><?php echo $dataplace["place_name"]?></option>
            <?php
		}
		?>