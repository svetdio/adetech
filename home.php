<?php
session_start();
if (isset($_SESSION['login_details'])) {
  $app_role = $_SESSION['login_details']['app_role'];
  if ($app_role == 2) {
    header('Location: bundle1.php');
  } else if ($app_role == 3) {
    header('Location: webpage3.php');
  }
} else {
  echo "<script type='text/javascript'> 
    localStorage.removeItem('adetech_user');
    window.location = 'login.php'
  </script>";
}
require_once "config.php";
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Homepage | AllShirt Commercial Outlet</title>
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/fontawesome.min.css" rel="stylesheet">
<link href="css/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<script src="js/script.js"></script>
<script src="js/home.js"></script>
<style>
  body {
    background-image: url("img/bg-homepage.png");
    /* background-repeat: no-repeat; */
    background-size: cover;
    text-align: center;
  }

  h1 {
    text-align: center;
    margin-top: 100px;
  }

  .btn-square-md {
    width: 220px !important;
    max-width: 100% !important;
    max-height: 100% !important;
    height: 220px !important;
    color: black;
    text-align: center;
    padding: 0px;
    font-size: 2.5em;
    font-weight: bold;
    background-color: cyan;
    border-radius: 12px;
    border: 0;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    cursor: pointer;
    margin-top: 120px;
    margin-left: 20px;
    margin-right: 20px;
  }

  .btn-square-md:hover {
    background-color: #31B2B5
  }

  .btn-square-md:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }

  .button1 {
    padding: 20px 25px;
    text-align: center;
    cursor: pointer;
    background-color: transparent;
  }

  .home {
    width: 70px;
    height: 70px;
  }

  .link {
    margin-left: 1110px;
    margin-top: 0px;

  }
</style>

<head>
  <title>Homepage | AllShirt Commercial Outlet</title>
</head>

<body>
  <div class="link">
    <!--home-btn-->
    <button class="button1">
      <a href="home.php" class="flex items-center">
        <img class="home" src="favicon.ico">
      </a>
    </button>

    <!--log out-->
    <button class="button1">
      <a href="#" id="logout" class="flex items-center " onclick="logout()">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="black" class="h-70 w-70" viewBox="0 0 16 16">
          <path d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
          <path d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
        </svg>
      </a>
    </button>
  </div>


  <h1 class=" text-5xl font-extrabold">WELCOME TO ALLSHIRT COMMERCIAL OUTLET!</h1>
  <?php
  if ($app_role == 1) {
  ?>
    <a href="bundle1.php" class="place-items-center">
      <button type="button" class="btn btn-primary btn-square-md ">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        <br />
        Bundle<br />Item
      </button>
    </a>
    <a href="webpage3.php" class="place-items-center">
      <button type="button" class="btn btn-primary btn-square-md">
        <i class="fa fa-calculator" aria-hidden="true"></i>
        <br />
        POS
      </button>
    </a>
    <a href="sales_report.php" class="place-items-center">
      <button type="button" class="btn btn-primary btn-square-md">
        <i class="fa fa-line-chart" aria-hidden="true"></i>
        <br />
        Sales <br> Report
      </button>
    </a>
  <?php } ?>
  <a href="webpage2_new.php" class="place-items-center">
    <button type="button" class="btn btn-primary btn-square-md">
      <i class="fa fa-credit-card" aria-hidden="true"></i>
      <br />
      Payroll
    </button>
  </a>
  <a href="employee_listview.php" class="place-items-center">
    <button type="button" class="btn btn-primary btn-square-md">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      <br />
      Employee List
    </button>
  </a>
  <?php
  if ($app_role == 1) {
  ?>
    <a href="products.php" class="place-items-center">
      <button type="button" class="btn btn-primary btn-square-md">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        <br />
        Items list
      </button>
    </a>
    <a href="users.php" class="place-items-center">
      <button type="button" class="btn btn-primary btn-square-md">
        <i class="fa fa-user" aria-hidden="true"></i>
        <br />
        User List
      </button>
    </a>
  <?php } ?>
</body>

</html>