<!DOCTYPE html>
<?php

session_start();

if(!isset($_SESSION['userID'])){ header('location:login.php');}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
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
           <!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <a class="navbar-brand mr-auto" href="index.html">Money Geo</a>
         
             <!-- <div class="collapse navbar-collapse" id="Navbar">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="feedback.php"><span class="fa fa-address-card fa-lg">
                    Feedback</span> </a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><span class="fa fa-spinner fa-lg"></span> Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaction.html"><span class="fa fa-paper-plane-o fa-lg"></span> Transaction</a></li>
                </ul>  
                </div>           -->
        </div>
    </nav>
   

               
                       
 
<div class="container">
  <h3>User DashBoard</h3>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Personnal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Notice</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">Feedback</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        <div class="col-12">
       <table class="table table-hover table-responsive">
                    
                   
                    <tbody>
                        <tr class="table-info"><td class="col-4">Name</td>
                            <td class="col-8"><?php echo $row['Name'] ?></td></tr>
                            <tr ><td class="col-4">Phone No</td>
                            <td class="col-8"><?php echo $row['Phone_no'] ?></td></tr>
                            <tr ><td class="col-4">Account No</td>
                            <td class="col-8"><?php echo $row['AccountNo']?></td></tr>
                            <tr ><td class="col-4">Balance</td>
                            <td class="col-8">₹<?php echo $row['Balance']?></td></tr>
                            <tr ><td class="col-4">AccountType</td>
                            <td class="col-8"><?php echo $row['AccountType'] ?></td></tr>
                            <tr ><td class="col-4">City</td>
                            <td class="col-8"><?php echo $row['City'] ?></td></tr>
                            <tr ><td class="col-4">Address</td>
                            <td class="col-8"><?php echo $row['Address']?></td></tr>
                            <tr ><td class="col-4">Email</td>
                            <td class="col-8"><?php echo $row['Email']?></td></tr>
                    </tbody>
                </table>
    </div>
</div>
    <div id="menu1" class="container tab-pane fade"><br>
       <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Notice</h3>
                    </div>
                    <div class="card-body">
                         <?php 
      $array = $conn->query("SELECT * FROM notice WHERE UserId = '$_SESSION[userID]' ORDER BY Date DESC LIMIT 5");
      if (isset($_GET['delete'])) 
  {
    if ($conn->query("delete from notice where Id = '$_GET[delete]'"))
    {
      header("location:dashboard.php");
    }
  } 
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {
          echo "<div class='alert alert-success'>$row[Notice]</div>";        
          
         }
      }
      else
        echo "<div class='alert alert-info'>Notice box empty</div>";
     ?>
                    </div>
                    
                </div>
            
        </div>
    
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
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
  </div>
</div>

      <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>