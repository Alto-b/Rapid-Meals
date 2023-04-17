<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>item Admin - Dashboard HTML Template</title>
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
    <!-- Form Css -->
    <link rel="stylesheet" href="../Asset/Template/Admin/form.css">
    <?php
    session_start();
    ?>
    <style>
        body {
  font-family: Roboto, Helvetica, Arial, sans-serif;
  background-color:white;
  overflow-x: hidden;
}
        </style>
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
        <br><br><br><br>