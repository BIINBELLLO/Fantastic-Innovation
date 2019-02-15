<?php
session_start();
include("includes/connection.php");
if (!isset($_SESSION['User_Type']) && !isset($_SESSION['gotten_email'])) {
  # code...
  header("Location: index.php");
}
$err_msg = $suc_msg = '';
    if (isset($_POST['request_babysitter'])) {
        # code......
        $sitter_id = $_POST['sitter_no'];
        $querry = "Select * from `babysitter` where `S/No`='$sitter_id'";
        $result = $conn->query($querry);
        $row = $result->fetch_assoc();
                          $fname = $row['First_Name'];
                          $oname = $row['Other_Names'];
                          $email = $row['Email'];
                          $phone = $row['Phone_No'];
                          $address = $row['Address'];
                          $state = $row['State_of_origin'];
                          $lga = $row['Local_Govt'];
                          $tribe = $row['Tribe'];
                          $gender = $row['Gender'];

                          $select = mysqli_query($conn,"Select * from parents where Email = '".$_SESSION['gotten_email']."'");
                    $result = mysqli_fetch_assoc($select);
                    $p_email = $result['Email'];
                    $p_phone = $result['Phone_No'];
                    $p_address = $result['Address'];
                    $p_state = $result['State_of_origin'];
                    $p_tribe = $result['Tribe'];
                    $p_gender = $result['Gender'];

    $insert = mysqli_query($conn, "Insert Into request (sitter_name, sitter_other_names,sitter_email,sitter_tel, sitter_add, sitter_tribe,sitter_gender, parent_email, parent_phone, parent_add, parent_tribe, parent_gender) 
                values ('".$fname."','".$oname."','".$email."','".$phone."','".$address."','".$tribe."','".$gender."','".$_SESSION['gotten_email']."','".$p_phone."','".$p_address."', '".$p_tribe."', '".$p_gender."')");

    if ($insert) {
      # code...
      $suc_msg = "Request Successfully!";
    }else{
     $err_msg = "Not Successfully!";
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
            <li class="breadcrumb-item active">Request Babysitter</li>
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
              List Of Babysitter </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/No</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>L.G.A</th>
                      <th>Tribe</th>
                      <th>Gender</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $fetch = mysqli_query($conn,"Select * from babysitter");
                       while ($row = mysqli_fetch_assoc($fetch)) {
                    
                          $id = $row['S/No'];
                          $fname = $row['First_Name'];
                          $oname = $row['Other_Names'];
                          $email = $row['Email'];
                          $phone = $row['Phone_No'];
                          $address = $row['Address'];
                          $state = $row['State_of_origin'];
                          $lga = $row['Local_Govt'];
                          $tribe = $row['Tribe'];
                          $gender = $row['Gender'];

 

                          echo 
                          '
                            <tr>
                              <td> '.$id.' </td>
                              <td> '.$fname.' '.$oname.' </td>
                              <td> '.$email.' </td>
                              <td> '.$phone.' </td>
                              <td> '.$address.' </td>
                              <td> '.$state.' </td>
                              <td> '.$lga.'</td>
                              <td> '.$tribe.'</td>
                              <td> '.$gender.'</td>
                              <td>
                              <div class = "row">
                            <div class = "col-md-6">'?>
                            
                           <!--  <input type = "hidden" name = "sitter_no" value = "'.$row["Email"].'"> -->
                             <a  href="view_before_parent.php?id=<?php echo $row['Email'] ?>" ><i class="fa fa-desktop"></i></a>
                           
                            <?php echo '</div>
                            <div class = "col-md-6">
                            </div>
                            </div>
                            </td>
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
