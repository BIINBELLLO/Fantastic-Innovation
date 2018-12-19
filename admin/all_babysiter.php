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
            <li class="breadcrumb-item active">Parent Info</li>
          </ol>
              <?php
              // if (!empty($_SESSION['err_msg'])) {
              //   # code...
              //   echo '<p style = "color:red; text-align: center;"><b>'.$_SESSION['err_msg'].'</b></p>';
              // }
              // if (!empty($_SESSION['mes'])) {
              //   # code...
              //   echo '<p style = "color:green; text-align: center;"><b>'.$_SESSION['mes'].'</b></p>';
              // }
              if (isset($_SESSION['mes'])) {
                echo '<h4 style = "color:green; text-align: center;font-size:17px;"><b>'.$_SESSION['mes'].'</b></h4>';
      //echo  $_SESSION['del_msg'];
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
                      <th>Parent Full-Name</th>
                      <th>Parent Email</th>
                      <th>Parent Phone Number</th>
                      <th>Parent Address</th>
                      <th>Parent Gender</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $fetch = mysqli_query($conn,"Select * from babysitter");
                    $counter  = 1;
                       while ($row = mysqli_fetch_assoc($fetch)) {
                    
                          // $id = $row['id'];
                          $prnt_email = $row['First_Name']. " ". $row['Other_Names'];
                          $parent_phone = $row['Email'];
                          $parent_add = $row['Phone_No'];
                          $parent_tribe = $row['Address'];
                          $parent_gender = $row['Gender'];

 
                          echo 
                          '
                            <tr>
                              <td> '.$counter.' </td>
                              <td> '.$prnt_email.' </td>
                              <td> '.$parent_phone.' </td>
                              <td> '.$parent_add.' </td>
                              <td> '.$parent_tribe.' </td>
                              <td> '.$parent_gender.' </td>
                              <td>
                              <div class = "row">
                           ';?>
                             
                  
                        <a  href="view_before_parent.php?id=<?php echo $row['Email'] ?>" ><i class="fa fa-desktop" style="margin-left:20px; margin-right: 5px;"></i></a>
                        <a onclick="return confirm('Are You sure You want to delete');" href="delete_sitter.php?id=<?php echo $row['Email'] ?>" ><i class="fa fa-trash" style="margin-left:15px;"></i></a>
                    
                    
                  
                  <?php echo '
                           
                            </div>
                            <div class = "col-md-6">
                            </div>
                            </td>
                            </tr>
                          ';
                        $counter++;}
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
<?php
  unset($_SESSION['mes']);
  unset($_SESSION['err_msg']);

?>
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