<?php
session_start();
if(!isset($_SESSION['managerID'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manager page</title>
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
            <a class="navbar-brand mr-auto" href="index.html">Money Geo</a>
         
             <div class="collapse navbar-collapse" id="Navbar">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-address-card fa-lg"></span>
                   Add Account </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-spinner fa-lg"></span> Notice</a></li>
                   
                </ul>  
                </div>          
        </div>
    </nav>
<div class="container">
  <h3>Manager Dashboard</h3>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link text-danger active" data-toggle="tab" href="#home">All Accounts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-danger" data-toggle="tab" href="#menu1">Feedbacks</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-danger" data-toggle="tab" href="#menu2">Menu 2</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="container">
        <div class="head">
        <h2>All Accounts</h2></div>
        <div class="row">
            <div class="card">
                <table class=" table table-responsive table-bordered">
                <thead>
                    <tr>
                      <th scope="col">Sno</th>
                      <th scope="col">Holder Name</th>
                      <th scope="col">Account No.</th>
                      <th scope="col">Current Balance</th>
                      <th scope="col">Account type</th>
                      <th scope="col">Contact</th>
                    </tr>
                </thead>
                    <?php
$i=0;
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bank";
        // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } ?>
    <?php if (isset($_GET['delete'])) 
  {
    if ($conn->query("delete from useraccounts where Id = '$_GET[delete]'"))
    {
      header("location:managerdash.php");
    }
  } 
    $sql="SELECT * from useraccounts";
    $result=$conn->query($sql);
    if($result->num_rows>0){


                   while ($row = $result->fetch_assoc())
        {$i++;


    ?>
      <tr>
        <td ><?php echo $i ?></th>
        <td><?php echo $row['Name'] ?></td>
        <td><?php echo $row['AccountNo'] ?></td>
        
        <td>Rs.<?php echo $row['Balance'] ?></td>
        <td><?php echo $row['AccountType'] ?></td>
        <td><?php echo $row['Phone_no'] ?></td>
        <td>
          <a href="mshow.php?id=<?php echo $row['Id'] ?>" class='btn btn-success btn-sm text-white' data-toggle='tooltip' title="View More info">View</a>
          <a href="managenotice.php?id=<?php echo $row['Id'] ?>" class='btn btn-primary btn-sm text-white' data-toggle='tooltip' title="Send notice to this">Send Notice</a>
          <a href="managerdash.php?delete=<?php echo $row['Id'] ?>" class='btn btn-danger btn-sm text-white' data-toggle='tooltip' title="Delete this account">Delete</a>
        </td>
        
      </tr>
    <?php
        }
      }

     ?>
            </table>
            </div>
            
        </div>
    </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
     <div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    Feedback from Account Holder
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm bg-white ">
  <thead>
    <tr class="bg-light">
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

    </div>
 <!--    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div> -->
  </div>
</div>
    


   <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>