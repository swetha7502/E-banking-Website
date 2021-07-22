<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Money Geo</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php

$Email=$Password='';
function test_input($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}
/*------User Login-------*/
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['UserLogin'])){
    if(!empty($_POST['Email']))
        $Email=test_input($_POST['Email']);
  

    if(!empty($_POST['Password']))
        $Password=test_input($_POST['Password']);
   
}


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bank";
if(isset($_POST['UserLogin'])){
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * from useraccounts where Email='$Email' AND Password='$Password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    session_start();
    $_SESSION['userID']=$row['Id'];
    header("Location:dashboard.php");
  }
} else {
  echo "0 results";
}

}


/*------manager Login-------*/
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['ManagerLogin'])){
    if(!empty($_POST['Email']))
        $Email=test_input($_POST['Email']);
  

    if(!empty($_POST['Password']))
        $Password=test_input($_POST['Password']);
   
}
if(isset($_POST['ManagerLogin'])){
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * from login where Email='$Email' AND Password='$Password' AND Type='manager'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    session_start();
    $_SESSION['managerID']=$row['Id'];
    header("Location:managerdash.php");
  }
} else {
  echo "0 results";
}

}
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
                    <li class="nav-item"><a class="nav-link" href="#" id="user"><span class="fa fa-home fa-lg"></span> UserLogin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" id="manager"><span class="fa fa-address-card fa-lg"></span>
                    ManagerLogin</a></li>
                  
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-paper-plane-o fa-lg"></span> ##</a></li>
                </ul>  
                </div>  
           </div>
    </nav>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Login</li>
            </ol>
           </div>
       </div>

    <div class="head">
<h2 >Login</h2>
</div>
    <div class="container">
        <div class="row row-content">
            <div class="d-none d-sm-block col-sm-6">
                <img src="image/log.gif" class="img-fluid">
            </div>
            <div class="col col-sm-6 align-self-center">
                
                <div id="userlog">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                     <div class="form-group row ">
                     <label for="Email" class="col-12 col-sm-3 col-form-label"> Email</label>
                     <input class="col-12 col-sm-9 form-control"  type="email" name="Email" id="Email" placeholder="UserEmail" required>
                    </div>
                     <div class="form-group row">
                     <label for="Password" class="col-12 col-sm-3 col-form-label">Password</label>
                     <input class="col-12 col-sm-9 form-control" type="password" name="Password"  placeholder="Password" required>
                    </div>
                     <div class="form-group row">
                   <input type="submit" class="btn col-5 col-sm-2 offset-3 bg-primary text-white" name="UserLogin" value="Login">
                </div>

                </form>
            </div>
            <div id="manager">
                   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="managerlog">
                     <div class="form-group row ">
                     <label for="Email" class="col-12 col-sm-3 col-form-label">Email</label>
                     <input class="col-12 col-sm-9 form-control"  type="email" name="Email" id="Email" placeholder="Manager Email" required>
                    </div>
                     <div class="form-group row">
                     <label for="Password" class="col-12 col-sm-3 col-form-label">Password</label>
                     <input class="col-12 col-sm-9 form-control" type="password" name="Password"  placeholder="Password" required>
                    </div>
                     <div class="form-group row">
                   <input type="submit" class="btn col-5 col-sm-2 offset-3 bg-primary text-white" name="ManagerLogin" value="Login">
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
<!---footer---->
   <footer class="footer">
        <div class="container">
            <div  class="row ">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="about.html">Accountt</a></li>
                        <li><a href="contactus.html">Loan</a></li>
                        <li><a href="#">Transaction</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                      121, Clear Water Bay Road<br>
                      Clear Water Bay, Kowloon<br>
                      HONG KONG<br>
                      <i class="fa fa-phone "></i>&nbsp;&nbsp;: +852 1234 5678<br>
                     <i class="fa fa-fax "></i>&nbsp;&nbsp;: +852 8765 4321<br>
                      <i class="fa fa-envelope"></i>&nbsp;&nbsp;: <a href="mailto:confusion@food.net">confusion@food.net</a>
                   </address>
                </div>
                <div class="col-12 col-sm-4 align-self-center mr-auto">
                    <div>
                        <a class="btn btn-social-icon " href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a class="btn btn-social-icon "href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a  class="btn btn-social-icon "href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a  class="btn btn-social-icon "href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon "
                        href="mailto:"><i class="fa fa-envelope fa-lg"></i></a>
                    </div>
                </div>
           </div>

           <div class="row justify-content-center">             
                <div class="col-auto ">
                    <p>© Copyright 2018 Ristorante Con Fusion</p>
                </div>
           </div>
        </div>
    </footer">

     <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
 $("#userlog").hide();
   $("#managerlog").hide();


  $("#user").click(function(){
    $("#user").addClass("active");
    $("#manager").removeClass("active");
    $("#userlog").toggle();
      $("#managerlog").hide();
  });
  $("#manager").click(function(){
     $("#manager").addClass("active");
    $("#user").removeClass("active");
    $("#userlog").hide();
      $("#managerlog").toggle();
  });
});
</script>
</body>
</html>