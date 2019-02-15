<?php
session_start();
if (!isset($_SESSION['User_Type']) && !isset($_SESSION['gotten_email'])) {
  # code...
  header("Location: index.php");
}
include("includes/connection.php");
$Err_Msg = $Suc_Msg = $err_msg = $suc_msg = $Photo = '';
// Fetching the information to be displayed on the page!
if ($_SESSION['User_Type']=="Babysitter") {
            # code...
            $select = mysqli_query($conn,"Select * from babysitter where Email = '".$_SESSION['gotten_email']."'");
            $select2 = mysqli_query($conn,"Select * from log_in where Email = '".$_SESSION['gotten_email']."'");
            $result = mysqli_fetch_assoc($select);
            $result2 = mysqli_fetch_assoc($select2);
            $FirstName = $result['First_Name'];
            $OtherNames = $result['Other_Names'];
            $Email = $result['Email'];
            $Phone = $result['Phone_No'];
            $Contact = $result['Address'];
            $State = $result['State_of_origin'];
            $LGA = $result['Local_Govt'];
            $Tribe = $result['Tribe'];
            $Gender = $result['Gender'];
            $Password = $result2['Password'];
            $Photo = $result['Photo'];
          }else{
            $select = mysqli_query($conn,"Select * from parents where Email = '".$_SESSION['gotten_email']."'");
            $select2 = mysqli_query($conn,"Select * from log_in where Email = '".$_SESSION['gotten_email']."'");
            $result = mysqli_fetch_assoc($select);
            $result2 = mysqli_fetch_assoc($select2);
            $FirstName = $result['First_Name'];
            $OtherNames = $result['Other_Names'];
            $Email = $result['Email'];
            $Phone = $result['Phone_No'];
            $Contact = $result['Address'];
            $State = $result['State_of_origin'];
            $LGA = $result['Local_Govt'];
            $Tribe = $result['Tribe'];
            $Gender = $result['Gender'];
            $Password = $result2['Password'];
            $Photo = $result['Photo'];
          }

// Updating the database to refelct any changes made to the documents

          if (isset($_POST['update'])) {
            # code...
              if ($_SESSION['User_Type']=="Babysitter") {
              # code...
              $FirstName = $_POST['name_1'];
              $OtherNames = $_POST['name_2'];
              $Phone = $_POST['fone'];
              $Contact = $_POST['address'];
              $State = $_POST['state_o'];
              $LGA = $_POST['local_ga'];
              $Tribe = $_POST['tribe'];
              $Gender = $_POST['gender'];
              $New_Password = $_POST['pass'];

              $Exe_Qry_2 = mysqli_query($conn, "Update log_in set Password = '".$New_Password."' where Email = '".$_SESSION['gotten_email']."'");
              $Exe_Qry_3 = mysqli_query($conn, "Update babysitter 
                set First_Name = '".$FirstName."',Other_Names = '".$OtherNames."',Phone_No = '".$Phone."',Address = '".$Contact."',State_of_origin = '".$State."',Local_Govt = '".$LGA."',Tribe = '".$Tribe."',Gender = '".$Gender."' where Email = '".$_SESSION['gotten_email']."'");
              if ($Exe_Qry_2 && $Exe_Qry_3) {
                # code...
                $Suc_Msg = "Profile Informations Updated Successfully!";

              }elseif ($Exe_Qry_2 && !$Exe_Qry_3) {
                # code...
                $Err_Msg = "Profile Not Updated";
              }elseif (!$Exe_Qry_2&&$Exe_Qry_3) {
                # code...
                $Err_Msg = "Log In Details Not Updated,";
              }else{
                $Err_Msg = "Update Error, Please Contact The Admin!";
              }

            }else{
              $FirstName = $_POST['name_1'];
              $OtherNames = $_POST['name_2'];
              $Phone = $_POST['fone'];
              $Contact = $_POST['address'];
              $State = $_POST['state_o'];
              $LGA = $_POST['local_ga'];
              $Tribe = $_POST['tribe'];
              $Gender = $_POST['gender'];
              $New_Password = $_POST['pass'];

              $Exe_Qry_2 = mysqli_query($conn, "Update log_in set Password = '".$New_Password."' where Email = '".$_SESSION['gotten_email']."'");
              $Exe_Qry_3 = mysqli_query($conn, "Update parents 
                set First_Name = '".$FirstName."',Other_Names = '".$OtherNames."',Phone_No = '".$Phone."',Address = '".$Contact."',State_of_origin = '".$State."',Local_Govt = '".$LGA."',Tribe = '".$Tribe."',Gender = '".$Gender."' where Email = '".$_SESSION['gotten_email']."'");
              if ($Exe_Qry_2 && $Exe_Qry_3) {
                # code...
                $Suc_Msg = "Profile Informations Updated Successfully!";

              }elseif ($Exe_Qry_2 && !$Exe_Qry_3) {
                # code...
                $Err_Msg = "Profile Not Updated";
              }elseif (!$Exe_Qry_2&&$Exe_Qry_3) {
                # code...
                $Err_Msg = "Log In Details Not Updated,";
              }else{
                $Err_Msg = "Update Error, Please Contact The Admin!";
              }
            }
          }
          if (isset($_POST['change_pic'])) {
    # code...
            $location = 'img/uploads/';
            $file_name = $_FILES["new_image"]['name'];
            $tmp_name = $_FILES['new_image']['tmp_name'];
            $path1 = $location.'_'.time().$file_name;
            $move = move_uploaded_file($tmp_name, $path1);
            if (!$move) {
                  // $fileerror = $_FILES['staff_image']['error'];
                  $err_msg = "Error!!! Sorry, your image could not be uploaded, Please try using another image.";
                  // exit();
                  
                }
                else{
                      if ($_SESSION['User_Type']=='Babysitter') {
                        
                  $sql = mysqli_query($conn, "UPDATE babysitter set  Photo = '$path1' where Email = '".$_SESSION['gotten_email']."'");
                  if (!$sql) {
                    $err_msg = 'Error Occured!!!';
                  }
                  else{
                    $suc_msg = "Profile Picture Changed Successfully!";
                    $sql = mysqli_query($conn, "select * from babysitter where Email = '".$_SESSION['gotten_email']."'");
                    $result_fetch = mysqli_fetch_assoc($sql);
                    $Photo = $result_fetch['Photo'];
                  }
                }else{
                  $sql = mysqli_query($conn, "UPDATE parents set  Photo = '$path1' where Email = '".$_SESSION['gotten_email']."'");
                  if (!$sql) {
                    $err_msg = 'Error Occured!!!';
                  }
                  else{
                    $suc_msg = "Profile Picture Changed Successfully!";
                    $sql = mysqli_query($conn, "select * from parents where Email = '".$_SESSION['gotten_email']."'");
                    $result_fetch = mysqli_fetch_assoc($sql);
                    $Photo = $result_fetch['Photo'];
                  }
                }
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
                  <h5> Full Profile Information</h5>
                </div>
                <div class="panel-body" style="border:1px solid  #bcbcbc; padding: 25px;">
                  <form method="POST" action="view_profile.php">
                    <div class="form-group">
                      <label>First Name:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z ]+$" id="name_1" name="name_1" value="<?=$FirstName?>">
                    </div>
                    <div class="form-group">
                      <label>Other Names:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z ]+$" id="name_2" name="name_2" value="<?=$OtherNames?>">
                    </div>
                    <div class="form-group">
                    <label>Gender</label>
                    <select id="gender" name="gender"  class="form-control" placeholder="Choose Your Gender" required="required">
                      <option>
                        <?=$Gender?>
                      </option>
                      <option>
                        Select Gender
                      </option>
                      <option>
                        Male
                      </option>
                      <option>
                        Female
                      </option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>Email:</label>
                      <input type="text"  class="form-control" id="name" name="email" value="<?=$Email?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Current Password:</label>
                      <input type="text" class="form-control" minlength="8" id="name" name="pass" value="<?=$Password?>">
                    </div>
                    <div class="form-group">
                      <label>Phone Number:</label>
                      <input type="text" class="form-control" required pattern="[0-9]{11}" id="name" name="fone" value="<?=$Phone?>">
                    </div>
                    <div class="form-group">
                      <label>Contact Address:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z|A-Za-z0-9 ]+$" id="name" name="address" value="<?=$Contact?>">
                    </div>
                    <div class="form-group">
                    <label>State Of Origin</label>
                    <select id="state_o" name="state_o" class="form-control" required="required">
                      <option>
                        <?=$State?>
                      </option> 
                      <option>
                        Select State Of Origin
                      </option>
                      
                      <?php
                        $qry = mysqli_query($conn,"Select distinct name from states_lga");
                        while ($qry_r = mysqli_fetch_assoc($qry)) {
                          # code...
                          echo '
                          <option>
                        '.$qry_r['name'].'
                          </option>';
                        }
                      ?>
                    </select>
                  </div>
                    <div class="form-group">
                    <label>Local Government</label>
                    <select id="local_ga" name="local_ga" class="form-control" required="required">
                      <option>
                        <?=$LGA?>
                      </option> 
                      <option>
                        Select Local Government
                      </option>
                      
                      <?php
                        $qry = mysqli_query($conn,"Select lga from states_lga");
                        while ($qry_r = mysqli_fetch_assoc($qry)) {
                          # code...
                          echo '
                          <option>
                        '.$qry_r['lga'].'
                          </option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label>Tribe:</label>
                      <input type="text" class="form-control" pattern="^[A-Za-z ]+$" id="name" name="tribe" value="<?=$Tribe?>" required>
                    </div>
                    <button type="submit" class="btn btn-default btn-block" name="update">Update Informations</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4">
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
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color:  #bcbcbc; text-align: center; padding-top: 9px; border-radius: 5px; width: 100%; height: 45px;">
                  <h5>Profile Image</h5>
                </div>
                <div class="panel-body" style="border:1px solid  #bcbcbc; padding: 25px;">
                  <img  
                  <?php
                      if (empty($Photo)) {
                        # code...
                        echo 'src="img/uploads/avatar.png"';
                      }else{
                        echo 'src="'.$Photo.'"';
                      }
                  ?>
                   style="height: 375px; width: 100%;">
                  <form method="POST" action="view_profile.php" enctype="multipart/form-data">
                    <br>
                    <input type="hidden" name="id" value="<?=$_SESSION['gotten_email']?>">
                    <input type="file" name="new_image" required="">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block" name="change_pic">Change Picture</button>
                  </form>
                </div>
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
