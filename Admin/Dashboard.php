<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapid Meal</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../Asset/Template/Admin/css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../Asset/Template/Admin/css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../Asset/Template/Admin/css/templatemo-style.css">
    
    <!--
	item Admin CSS Template
	https://templatemo.com/tm-524-item-admin
	-->
    <?php
    session_start();
    include("../Asset/Connection/Connection.php");
    ?>
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="Dashboard.php">
                    <h1 class="tm-site-title mb-0">Rapid Meal Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="Dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-map"></i>
                                <span>
                                   Location<i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="District.php">District</a>
                                <a class="dropdown-item" href="Place.php">Place</a>
                                
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ManagerRegistration.php">
                                <i class="fas fa-user"></i>
                                Manager
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="Item.php">
                                <i class="fas fa-utensils"></i>
                               Dishes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="UserList.php">
                                <i class="fas fa-portrait"></i>
                               User List
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-list"></i>
                                <span>
                                    Classes <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="TypeDetails.php">Type</a>
                                <a class="dropdown-item" href="Category.php">Category</a>
                          
                                
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-comment"></i>
                                <span>
                                    F&C <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="ComplaintReply.php">Complaint</a>
                                <a class="dropdown-item" href="FeedbackView.php">Feedback</a>
                               
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="../Guest/Login.php">
                            <?php echo $_SESSION["admin_name"]?> <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b><?php echo $_SESSION["admin_name"]?></b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
               
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller">
                        <h2 class="tm-block-title">Information</h2>
                        <div id="pieChartContainer">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>                        
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Feedback</h2> 
                        <div class="tm-notification-items">
                        <?php
	                    $selqry="select * from tbl_feedback f inner join tbl_user u on u.user_id=f.user_id" ;
	                    $result=$con->query($selqry);
	                    $i=0;
	                while($data=$result->fetch_assoc())
		            {
			        $i++;
		?>
                       
                            <div class="media tm-notification-item">
                            <div ><img src="../Asset/Files/UserPhoto/<?php echo $data["user_photo"]?>" width='100px'  class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2" style="color:goldenrod;"><b><?php echo $data["user_name"] ?></b></p>
                                    <p class="mb-2" ><?php echo $data["feedback_content"]?></p>
                                    <span class="tm-small tm-text-color-secondary"><?php echo $data["feedback_date"] ?></span>
                                </div>
                    </div>
                   
                                <?php
                    }
                                ?>
                           </div> 
                           
                    </div>
                </div>
                </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER NO.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Total amount</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <?php
                            $selqry="select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_item p on p.item_id=c.item_id where booking_status>1 and cart_status>0";
                            $result=$con->query($selqry);	
                            ?>
                            <tbody>
                            <?php
	                         $i=0;
	                        while($row=$result->fetch_assoc())
	                        {
		
	                    	$qty=$row["cart_qty"];
	                        $price=$row["item_price"];
	                        $totalamt=$qty*$price;
		                    $i++;
                            ?>
                                <tr>
                                    <th scope="row"><b><?php echo $i; ?></b></th>
                                    <td>
                                        <b><?php echo $row["item_name"];?></b>
                                    </td>
                                    <td><img src="../Asset/Files/ItemPhoto/<?php echo $row["item_photo"];?>" width="100" height="100" /></td>
                                    <td><b><?php echo $row["cart_qty"];?></b></td>
                                    <td><b><?php echo $row["item_price"];?></b></td>
                                    <td><b><?php echo $row["user_name"];?></b></td>
                                    <td><b><?php echo $totalamt;?></b></td>
                                    <td>
                                    <?php
                
                if($row["booking_status"]==1 && $row["cart_status"]==0)
                {
                    echo "Payment Pending....";
                }
                else if($row["booking_status"]==2 && $row["cart_status"]==1)
                {
                    ?>
                    Payment Completed 	
                    <?php
                }
            
            ?>
                            </td>
                                </tr>
                               <?php
                            }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                Copyright <strong><span>RapidMeals</span></strong>. All Rights Reserved
                    
                   
                </p>
            </div>
        </footer>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["category_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category";
  $row=$con->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select sum(cart_qty) as id from tbl_cart ca inner join  tbl_item p on ca.item_id=p.item_id  inner join tbl_category c on c.category_id=p.category_id WHERE c.category_id='".$data["category_id"]."'";
	  
	  $row1=$con->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
    }
  }
});
</script>


















    <script src="../Asset/Template/Admin/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../Asset/Template/Admin/js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="../Asset/Template/Admin/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="../Asset/Template/Admin/js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>