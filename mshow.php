<?php
session_start();
if(!isset($_SESSION['managerID'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
     <link rel="stylesheet" type="text/css" href="style.css">
  <?php
    $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "bank";
    // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

   ?>
</head>
<body >
<nav class="navbar navbar-dark navbar-expand-sm   fixed-top">
        <div class="container">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="#">Money Geo</a>
         
             <div class="collapse navbar-collapse" id="Navbar">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span>
                   Add Account </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-spinner fa-lg"></span> Notice</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-paper-plane-o fa-lg"></span> Transaction</a></li>
                </ul>  
                </div>          
        </div>
    </nav>
 <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="managerdash.php">Home</a></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
           </div>
       </div>

<?php 

  $array = $conn->query("select * from useraccounts where Id = '$_GET[id]'");
  $row = $array->fetch_assoc();
 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Account profile for <?php echo $row['Name'];?> <span class="badge badge-success"><?php echo $row['AccountNo'];?></span>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $row['Name'] ?></th>
          <td>Account No</td>
          <th><?php echo $row['AccountNo'] ?></th>
        </tr><tr>
          <td>Current Balance</td>
          <th><?php echo $row['Balance'] ?></th>
          <td>Account Type</td>
          <th><?php echo $row['AccountType'] ?></th>
        </tr><tr>
          <td>Pan Number</td>
          <th><?php echo $row['Pan_no'] ?></th>
          <td>City</td>
          <th><?php echo $row['City'] ?></th>
        </tr><tr>
          <td>Contact Number</td>
          <th><?php echo $row['Phone_no'] ?></th>
          <td>Address</td>
          <th><?php echo $row['Address'] ?></th>
        </tr>
      </tbody>
    </table>
  </div>
 
</div>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>