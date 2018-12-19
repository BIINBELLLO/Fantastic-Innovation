<?php
session_start();
if (!isset($_SESSION['User_Type']) && !isset($_SESSION['gotten_email'])) {
  # code...
  header("Location: index.php");
}
include("includes/connection.php");
$Err_Msg = $Suc_Msg = $err_msg = $suc_msg = $Photo = '';
// Fetching the information to be displayed on the page!
$Name = $Sch = $Year = '';
// Updating the database to refelct any changes made to the documents

          if (isset($_POST['save'])) {
            $Name = $_POST['name'];
            $Sch = $_POST['school'];
            $Year = $_POST['year'];

            $Entry_Query = mysqli_query($conn, "Insert Into qualification (Babysitter_Email, Name, School, Year) values ('".$_SESSION['gotten_email']."','".$Name."','".$Sch."','".$Year."')");

            if ($Entry_Query) {
              # code...
              $Suc_Msg = "New Qualification Added Successfully!!!";
            }else{
              $Err_Msg = "Error! Qualification Not Added";
            }
          }
    //       if (isset($_POST['change_pic'])) {
    // # code...
    //         $location = 'img/uploads/';
    //         $file_name = $_FILES["new_image"]['name'];
    //         $tmp_name = $_FILES['new_image']['tmp_name'];
    //         $path1 = $location.'_'.time().$file_name;
    //         $move = move_uploaded_file($tmp_name, $path1);
    //         if (!$move) {
    //               // $fileerror = $_FILES['staff_image']['error'];
    //               $err_msg = "Error!!! Sorry, your image could not be uploaded, Please try using another image.";
    //               // exit();
                  
    //             }
    //             else{
    //                   if ($_SESSION['User_Type']=='Babysitter') {
                        
    //               $sql = mysqli_query($conn, "UPDATE babysitter set  Photo = '$path1' where Email = '".$_SESSION['gotten_email']."'");
    //               if (!$sql) {
    //                 $err_msg = 'Error Occured!!!';
    //               }
    //               else{
    //                 $suc_msg = "Profile Picture Changed Successfully!";
    //                 $sql = mysqli_query($conn, "select * from babysitter where Email = '".$_SESSION['gotten_email']."'");
    //                 $result_fetch = mysqli_fetch_assoc($sql);
    //                 $Photo = $result_fetch['Photo'];
    //               }
    //             }else{
    //               $sql = mysqli_query($conn, "UPDATE parents set  Photo = '$path1' where Email = '".$_SESSION['gotten_email']."'");
    //               if (!$sql) {
    //                 $err_msg = 'Error Occured!!!';
    //               }
    //               else{
    //                 $suc_msg = "Profile Picture Changed Successfully!";
    //                 $sql = mysqli_query($conn, "select * from parents where Email = '".$_SESSION['gotten_email']."'");
    //                 $result_fetch = mysqli_fetch_assoc($sql);
    //                 $Photo = $result_fetch['Photo'];
    //               }
    //             }
    //       }
    //     }

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSMS -- Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
            <li class="breadcrumb-item active">Full Profile</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-1">
            </div>
            <div class="col-xl-7">
              <?php
              if (!empty($Err_Msg)) {
                # code...
                echo '<p style = "color:red; text-align: center;"><b>'.$Err_Msg.'</b></p>';
              }
              if (!empty($Suc_Msg)) {
                # code...
                echo '<p style = "color:green; text-align: center;"><b>'.$Suc_Msg.'</b></p>';
              }
      ?>
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color:  #bcbcbc; text-align: center; padding-top: 9px; border-radius: 5px; width: 100%; height: 45px;">
                  <h5> New Qualification Information</h5>
                </div>
                <div class="panel-body" style="border:1px solid  #bcbcbc; padding: 25px;">
                  <form method="POST" action="new_qual.php">
                    <div class="form-group">
                      <label>Name:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z ]+$" id="name_1" name="name" value="<?=$Name?>">
                    </div>
                    <div class="form-group">
                      <label>School:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z ]+$" id="sch" name="school" value="<?=$Sch?>">
                    </div>
                    <div class="form-group">
                      <label>Year:</label>
                      <input type="text" class="form-control" required pattern="[0-9]{4}" id="year" name="year" value="<?=$Year?>">
                    </div>
                    <button type="submit" class="btn btn-default btn-block" name="save">Save Qualification</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4">
              
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
