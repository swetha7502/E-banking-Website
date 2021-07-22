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
 $Email=$Password=$Name=$Pan=$City=$Address=$Acctype='';
$Balance=$Accno=$Phone='';






function test_input($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['Create'])){
    if(!empty($_POST['Email']))
        $Email=test_input($_POST['Email']);
  

    if(!empty($_POST['Password']))
        $Password=test_input($_POST['Password']);
   

     if(!empty($_POST['Name']))
        $Name=test_input($_POST['Name']);
 

 if(!empty($_POST['Balance']))
        $Balance=test_input($_POST['Balance']);
   
 if(!empty($_POST['Pan']))
        $Pan=test_input($_POST['Pan']);
  

 if(!empty($_POST['Phone']))
        $Phone=test_input($_POST['Phone']);
  
 if(!empty($_POST['City']))
        $City=test_input($_POST['City']);
  
 if(!empty($_POST['Address']))
        $Address=test_input($_POST['Address']);
   
    if(!empty($_POST['Accno']))
        $Accno=test_input($_POST['Accno']);
    if(!empty($_POST['Acctype']))
        $Acctype=test_input($_POST['Acctype']);

    
   
    
}
 
?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bank";
if(isset($_POST['Create'])){
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO useraccounts (Email, Password,Name,Balance,Pan_no,Phone_no,City,Address,AccountNo,AccountType)
VALUES ('$Email', '$Password', '$Name','$Balance','$Pan','$Phone','$City','$Address','$Accno','$Acctype')";

if ($conn->query($sql) === TRUE) {
    header("Location:login.php");
 
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<body>
 <nav class="navbar navbar-dark navbar-expand-sm   fixed-top">
        <div class="container">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto" href="#">Money Geo</a>
         
             <div class="collapse navbar-collapse" id="Navbar">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a class="nav-link" href="index.html"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg">
                    Account </a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><span class="fa fa-spinner fa-lg"></span> Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaction.html"><span class="fa fa-paper-plane-o fa-lg"></span> Transaction</a></li>
                </ul>  
                </div>          
        </div>
    </nav>
<div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Account</li>
            </ol>
           </div>
       </div>

<div class="container sec">
    <h3>Create an Account</h3>
    
    <div class="row row-content">
        <div class="col-12 col-sm-7">
           
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <!-------email------->
                 <div class="form-group row">
                    <label for="Email" class="col-12 col-sm-3 col-form-label">Email</label>
                    <input class="col-12 col-sm-9 form-control" id="upcase" type="email" name="Email" id="Email" placeholder="Email" required>
                </div>
                <!--------password---->
                <div class="form-group row">
                    <label for="Password" class="col-12 col-sm-3 col-form-label">Password</label>
                    <input class="col-12 col-sm-9 form-control" id="upcase" type="password" name="Password" id="Password" placeholder="Password" required>
                </div>
                <!------name---->
                 <div class="form-group row">
                    <label for="Name" class="col-12 col-sm-3 col-form-label">Name</label>
                    <input class="col-12 col-sm-9 form-control" type="text" name="Name" id="Name" placeholder="Name" required >
                </div>
                <!-------Balance---->
                 <div class="form-group row">
                    <label for="Balance" class="col-12 col-sm-3 col-form-label">Balance</label>
                    <input class="col-12 col-sm-9 form-control" type="number" min="1000" name="Balance" id="Balance" placeholder="Min 1000" required>
                </div>
                <!------pan--->
                 <div class="form-group row">
                    <label for="Pan" class="col-12 col-sm-3 col-form-label">Pan Number</label>
                    <input class="col-12 col-sm-9 form-control" type="text" name="Pan" id="Pan" placeholder="Password" required>
                </div>
                <!----phone--->
                <div class="form-group row">
                    <label for="Phone" class="col-12 col-sm-3 col-form-label">Phone no.</label>
                    <input class="col-12 col-sm-9 form-control" type="number" name="Phone" id="Phone" placeholder="Phone Number" required>
                </div>
                <!-----City---->
                 <div class="form-group row">
                    <label for="City" class="col-12 col-sm-3 col-form-label">City</label>
                    <input class="col-12 col-sm-9 form-control"  type="text" name="City" id="City" placeholder="City" required>
                </div>
                <!--------Address----->
                <div class="form-group row">
                    <label for="Address" class="col-12 col-sm-3 col-form-label">Address</label>
                    <input class="col-12 col-sm-9 form-control" type="text" name="Address" id="Address" placeholder="Address" required>
                </div>
                <!------Account Number---->
                  <div class="form-group row">
                    <label for="Accno" class="col-12 col-sm-3 col-form-label">Account number</label>
                  <input type="" name="Accno" readonly value="<?php echo time() ?>" class="col-12 col-sm-9 form-control" required>
                </div>
                <!----Account Type----->
                 <div class="form-group row">
                  <label for="Accno" class="col-12 col-sm-3 col-form-label">Account Type</label>
          
                <select class="form-control col-12 col-sm-9" name="Acctype" required>
                  <option value="current" selected>Current</option>
                  <option value="saving" selected>Saving</option>
                </select>
                 </div>
                 <!----submit----->
                  <div class="form-group row">
                   <input type="submit" class="btn col-2 offset-3  bg-primary text-white" name="Create" value="Create">
                </div>
                <div class="form-group row">
                <?php
                if(isset($_POST['Create']))
                echo "<a class='alert alert-success'>Successfully added!!</a>";
                ?>
                </div>
            </form>
    </div>
     <div class="col-12 col-sm align-self-center">
        <img src="image/accountsign.gif" class="img-fluid d-none d-sm-block">
</div>
</div>
</div>
      <footer class="footer">
        <div class="container">
            <div  class="row ">             
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Accountt</a></li>
                        <li><a href="loan.html">Loan</a></li>
                        <li><a href="transaction.html">Transaction</a></li>
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
    </footer>

     <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>

