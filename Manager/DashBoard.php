<?php
include("SessionValidator.php");
include("../Asset/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Rapid Meals</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../Asset/Template/Main/assets/img/favicon.png" rel="icon">
  <link href="../Asset/Template/Main/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Asset/Template/Main/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Asset/Template/Main/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Asset/Template/Main/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../Asset/Template/Main/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../Asset/Template/Main/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Asset/Template/Main/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy - v1.2.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="Dashboard.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="../Asset/Template/Main/assets/img/logo.png" alt=""> -->
        <h1>Rapid<span>Meals</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="DashBoard.php">Home</a></li>
          <li><a href="Booking.php">Orders</a></li>
          <li><a href="PackageHead.php">Package</a></li>
          <li><a href="PackageBooking.php">Package Booking</a></li>
          <li><a href="Item.php">Item</a></li>
          <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="MyProfile.php">My Profile</a></li>
              <li><a href="EditProfile.php">Edit Profile</a></li>
              <li><a href="ChangePassword.php">Change Password</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="../Guest/Login.php">Logout</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h2>
          <p data-aos="fade-up" data-aos-delay="100">no more long boring queues.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="Item.php" class="btn-book-a-table">Add stock</a>  
           
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="../Asset/Template/Main/assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(../Asset/Template/Main/assets/img/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>For Enquiry</h4>
              <p>+91 70123 96937</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
              Rapid Meals aims at providing an interface for quick and efficient ordering of food from canteen by anyone with an account with us.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Start your account in just few clicks</li>
                <li><i class="bi bi-check2-all"></i> Order whenever you wish</li>
                <li><i class="bi bi-check2-all"></i> Food gets prepared when you need </ul>
              <p>
               .
              </p>

              <div class="position-relative mt-4">
                <img src="../Asset/Template/Main/assets/img/about-2.jpg" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
       <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter" >
      <div class="container" data-aos="zoom-out" >

        <div class="row gy-4" style="padding-left:250px">

       

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php 
			  	$selQry="select count(*) as itemCount from tbl_item";
				$data=$con->query($selQry)->fetch_assoc();
				echo $data["itemCount"];
			  ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Dishes</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php 
			  	$selQry="select count(*) as userCount from tbl_user";
				$data=$con->query($selQry)->fetch_assoc();
				echo $data["userCount"];
			  ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Users</p>
            </div>
          </div><!-- End Stats Item -->


          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php 
			  	$selQry="select count(*) as packageCount from tbl_packagehead";
				$data=$con->query($selQry)->fetch_assoc();
				echo $data["packageCount"];
			  ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Packages</p>
            </div>
          </div><!-- End Stats Item -->

          

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu" >
    <canvas id="myChart" style="width:100%;max-width:600px;margin-left: 550px;"></canvas>
    </section><!-- End Menu Section -->

    
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

      </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              FOODINN <br>
              IGCAS,KERALA-686691<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

  

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>RapidMeals</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
  
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../Asset/Template/Main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Asset/Template/Main/assets/vendor/aos/aos.js"></script>
  <script src="../Asset/Template/Main/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../Asset/Template/Main/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../Asset/Template/Main/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../Asset/Template/Main/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../Asset/Template/Main/assets/js/main.js"></script>
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














</body>

</html>