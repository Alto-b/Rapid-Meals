<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_item p  inner join tbl_category c on c.category_id=p.category_id inner join tbl_type t on t.type_id=p.type_id where true ";
        if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND p.item_name lIKE '".$name."%'";
            
        }
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
        }
       
		if ($_GET["type"]!=null) {

            $type = $_GET["type"];

            $sqlQry = $sqlQry." AND t.type_id IN(".$type.")";
        }

        $resultS = $con->query($sqlQry);

        if ($resultS->num_rows > 0) {
			
            while ($row1 = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary" style="border:none">
                                    <img src="../Asset/Files/ItemPhoto/<?php echo $row1["item_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["item_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["item_price"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $row1["category_name"]; ?><br>
                                        </p>
                                        <a href="Stock.php?pid=<?php echo $row1["item_id"]; ?>" class="btn btn-success btn-block">Add Stock</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>items Not Found!!!!</h4>";
        }
    }

?>