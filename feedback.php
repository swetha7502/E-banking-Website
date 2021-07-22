
<?php
session_start();
if(!isset($_SESSION['userID'])){ header('location:login.php');}
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
$result= $conn->query("SELECT * FROM useraccounts WHERE Id = '$_SESSION[userID]'");
    
$row=$result->fetch_assoc();

?>
<body>
<nav class="navbar navbar-dark navbar-expand-sm   fixed-top">
        <div class="container">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="index.html">Money Geo</a>
         
             <div class="collapse navbar-collapse" id="Navbar">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="feedback.php"><span class="fa fa-address-card fa-lg">
                    Feedback</span> </a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><span class="fa fa-spinner fa-lg"></span> Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaction.html"><span class="fa fa-paper-plane-o fa-lg"></span> Transaction</a></li>
                </ul>  
                </div>          
        </div>
    </nav>
   

  
<div class="container">
  <div class="card">
  <div class="card-header text-center text-danger" style="font-size:25px">
    Help Card
  </div>
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>Enter your message</h5>
            <textarea class="form-control" name="Message" required placeholder="Write your message"></textarea>
            <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
          </div>
      </form>
      
    <br>
  
    <?php
    if (isset($_POST['send']))
    {
      if ($conn->query("insert into feedback (Message,UserId) values ('$_POST[Message]','$_SESSION[userID]')")) {
        echo "<div class='alert alert-success'>Successfully send</div>";
      }else
      echo "<div class='alert alert-danger'>Not sent Error is:".$conn->error."</div>";
    }
    
    ?>  
  </div>
</div>

</div>
</body>
</html>