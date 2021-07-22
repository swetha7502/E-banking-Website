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
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-spinner fa-lg"></span> Notice</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-paper-plane-o fa-lg"></span> Feedbacks</a></li>
                </ul>  
                </div>          
        </div>
    </nav>


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
  $array = $conn->query("select * from useraccounts where Id = '$_GET[id]'");
  $row = $array->fetch_assoc();


 ?>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Send Notice to <?php echo $row['Name'] ?>
  </div>
  <div class="card-body">
    <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>Write notice for <?php echo $row['Name'] ?></h5>
            <input type="hidden" name="UserId" value="<?php echo $row['Id'] ?>">
            <textarea class="form-control" rows="10"name="Notice" required placeholder="Write your message"></textarea>
            <button type="submit" name="Send" class="btn btn-primary btn-block btn-sm my-1">Send</button>
          </div>
      </form><?php
     $Notice=$UserId='';
function test_input($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}
/*------User Login-------*/
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Send'])){
    if(!empty($_POST['Notice']))
        $Notice=test_input($_POST['Notice']);
  

    if(!empty($_POST['UserId']))
        $UserId=test_input($_POST['UserId']);
   
}

    if (isset($_POST['Send']))
    {
      if ($conn->query("insert into notice (Notice,UserId) values ('$Notice','$UserId')")) {
        echo "<div class='alert alert-success'>Successfully send</div>";
      }else
      echo "<div class='alert alert-danger'>Not sent Error is:".$conn->error."</div>";
    }
    
    ?>  
  </div>
  
</div>
   <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>