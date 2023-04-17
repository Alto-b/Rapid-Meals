<?php
include("../Connection/Connection.php");

if (isset($_GET["action"])) {

    $sqlQry = "SELECT * from tbl_item p  inner join tbl_category c on c.category_id=p.category_id inner join tbl_type t on t.type_id=p.type_id where true ";
    if ($_GET["name"] != null) {

        $name = $_GET["name"];

        $sqlQry = $sqlQry . " AND p.item_name lIKE '%" . $name . "%'";

    }
    if ($_GET["category"] != null) {

        $category = $_GET["category"];

        $sqlQry = $sqlQry . " AND c.category_id IN(" . $category . ")";
    }

    if ($_GET["type"] != null) {

        $type = $_GET["type"];

        $sqlQry = $sqlQry . " AND t.type_id IN(" . $type . ")";
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
                            <h6 class="text-light bg-info text-center rounded p-1">
                                <?php echo $row1["item_name"]; ?>
                            </h6>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-danger" align="center">
                                Price :
                                <?php echo $row1["item_price"]; ?>/-
                            </h4>
                            <p align="center">
                                <?php echo $row1["category_name"]; ?><br>
                            </p>
                            <?php
                            $stock = "select sum(stock_qty) as stock from tbl_stock where item_id ='".$row1["item_id"]."' and stock_date=curdate()";
                            $result2 = $con->query($stock);
                            $row2 = $result2->fetch_assoc();


                            $stock2 = "select sum(cart_qty) as cstock from tbl_cart c inner join tbl_booking b on b.booking_id=c.booking_id where item_id = '" . $row1["item_id"] . "' and booking_date=curdate() ";
                            $result22 = $con->query($stock2);
                            $row22 = $result22->fetch_assoc();

                            $stock = $row2["stock"] - $row22["cstock"];

                            if ($stock > 0) {
                                ?>
                                <a href="javascript:void(0)" onclick="addCart('<?php echo $row1["item_id"]; ?>')"
                                    class="btn btn-success btn-block">Add to Cart</a>
                                <?php
                            } else if ($stock == 0) {
                                ?>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-block">Not Available</a>
                                <?php
                            } else {
                                ?>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                <?php
                            }
                            ?>

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