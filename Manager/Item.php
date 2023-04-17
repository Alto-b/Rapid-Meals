<?php
ob_start();
session_start();
include("SessionValidator.php");
include("Head.php");
include("../Asset/Connection/Connection.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search product</title>
<link rel="stylesheet" href="../Asset/Template/Search/bootstrap.min.css">
<style>
            .custom-alert-box{
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
				z-index:1;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>

<body onload="productCheck()">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter product</h5>
                    
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label" style="padding:0px">
                                    <input type="text" placeholder="Search Product" style="width:100%;height:100%;border:none;outline: none;"  class="form-check-input product_check" id="name" onkeyup="productCheck()">
									<br />
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Type</h6>
                    <ul class="list-group" style="list-style:none">
                        <?php                           
						 $selCat = "SELECT * from tbl_type";
                            $result = $con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-product">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["type_id"]; ?>" id="type"><?php echo $row["type_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Category</h6>
                    <ul class="list-group" style="list-style:none">
                        <?php                           
						 $selCat = "SELECT * from tbl_category";
                            $result = $con->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-product">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category"><?php echo $row["category_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                   
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All products</h5>
                    <hr>
                    
                    <div class="row" id="result">

                    </div>

                </div>

            </div>
                        </div>
<script src="../Asset/Template/Search/jquery.min.js"></script>
        <script src="../Asset/Template/Search/bootstrap.min.js"></script>
<script src="../Asset/Template/Search/popper.min.js"></script>
        <script>



          

            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
					var type = get_filter_text('type');
                    var name = document.getElementById('name').value;


                    $.ajax({
                        url: "../Asset/AjaxPages/AjaxSearchItem.php?action=" + action +"&category=" + category+"&type=" + type +"&name=" + name,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
        </script>
    </body>

</html>
<?php
include("Foot.php");
ob_flush();
?>