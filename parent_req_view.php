<?php
session_start();
include("includes/connection.php");
if (!isset($_SESSION['User_Type']) && !isset($_SESSION['gotten_email'])) {
  # code...
  header("Location: index.php");
}
$err_msg = $suc_msg = '';
    if (isset($_POST['accept'])) {
        # code......
        $accept_id = $_POST['accept_no'];


   $update = mysqli_query($conn, "UPDATE request set  status = 'accepted' where id = '".$accept_id."'");

    if ($update) {
      # code...
  $suc_msg = "Baby Accepted!";
    }else{
     $err_msg = "Sorry error occured!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSMS--Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="font-awesome.css" type="text/css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

 <?php include("includes/header_dash.php"); ?>

    <div id="wrapper">
  <?php 
if($_SESSION['User_Type']=="Parent")
 include("includes/babysitter_sidebar.php");
else{
 include("includes/sidebar.php"); 
}
  ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Accept Request</li>
          </ol>
              <?php
              if (!empty($err_msg)) {
                # code...
                echo '<p style = "color:red; text-align: center;"><b>'.$err_msg.'</b></p>';
              }
              if (!empty($suc_msg)) {
                # code...
                echo '<p style = "color:green; text-align: center;"><b>'.$suc_msg.'</b></p>';
              }
      ?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Of Request to you </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/No</th>
                      <th>Babysitter Full Name</th>
                      <th>Babysitter Email</th>
                      <th>Babysitter Phone Number</th>
                      <th>Babysitter Address</th>
                      <th>Request Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $fetch = mysqli_query($conn,"Select * from requests where Parent_Email = '".$_SESSION['gotten_email']."'");
                    $int = 1;
                       while ($row = mysqli_fetch_assoc($fetch)) {

                        $fetch2 =mysqli_fetch_assoc(mysqli_query($conn,"Select * from babysitter where Email = '".$row['Babysitter_Email']."'"));
                          $Parent_name = $fetch2['First_Name'].' '.$fetch2['Other_Names'];
                          $Parent_Fone = $fetch2['Phone_No'];
                          $Address = $fetch2['Address'];
                          $_SESSION['PName'] = $Parent_name;

 
                          echo 
                          '
                            <tr>
                              <td> '.$int.' </td>
                              <td> '.$Parent_name.' </td>
                              <td> '.$row['Parent_Email'].' </td>
                              <td> '.$Parent_Fone.' </td>
                              <td> '.$Address.' </td>
                              <td> '.$row['Status'].' </td>
                              
                            </tr>
                          ';
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->
 <?php include("includes/footer_dash.php"); ?>
        <!-- Sticky Footer -->


      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
