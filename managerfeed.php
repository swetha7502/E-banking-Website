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
</head>
<body>
  <nav class="navbar navbar-dark navbar-expand-sm   fixed-top">
        <div class="container">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="#">Money Geo</a>
         
             <div class="collapse navbar-collapse" id="Navbar">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a class="nav-link" href="managerdash.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span>
                   Add Account </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-spinner fa-lg"></span> Notice</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-paper-plane-o fa-lg"></span> Transaction</a></li>
                </ul>  
                </div>          
        </div>
    </nav>

  
    
  

<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Feedback from Account Holder
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm bg-dark text-white">
  <thead>
    <tr>
      <th scope="col">From</th>
      <th scope="col">Account No.</th>
      <th scope="col">Contact</th>
      <th scope="col">Message</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
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
 if(isset($_GET['delete'])){
   $array = $conn->query("delete from feedback where FeedbackId = $_GET[delete]");
 }


 ?>
    <?php
      $i=0;
      $array = $conn->query("select * from useraccounts,feedback where useraccounts.Id = feedback.UserId");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {
    ?>
      <tr>
        <td><?php echo $row['Name'] ?></td>
        <td><?php echo $row['AccountNo'] ?></td>
        <td><?php echo $row['Phone_no'] ?></td>
        <td><?php echo $row['Message'] ?></td>
        <td>
          <a href="managerfeed.php?delete=<?php echo $row['FeedbackId'] ?>" class='btn btn-danger btn-sm text-white' data-toggle='tooltip' title="Delete this Message">Delete</a>
        </td>
        
      </tr>
    <?php
        }
      }
     ?>
  </tbody>
</table>

</div>
</div>
</div>

   <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>