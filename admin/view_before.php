<?php
session_start();
if (!isset($_SESSION['User_Type']) && !isset($_SESSION['gotten_email'])) {
  # code...
  header("Location: index.php");
}
include("includes/connection.php");
$Err_Msg = $Suc_Msg = $err_msg = $suc_msg = $Photo = '';
// Fetching the information to be displayed on the page!
$get_email = $_GET['id'];
if (empty($get_email)) {
  header('location:all_parent.php');
}

            $select = mysqli_query($conn,"Select * from parents where Email = '$get_email'");
           
            $result = mysqli_fetch_assoc($select);
            
            $FirstName = $result['First_Name'];
            $OtherNames = $result['Other_Names'];
            $Email = $result['Email'];
            $Phone = $result['Phone_No'];
            $Contact = $result['Address'];
            $State = $result['State_of_origin'];
            $LGA = $result['Local_Govt'];
            $Tribe = $result['Tribe'];
            $Gender = $result['Gender'];
            // $Password = $result2['Password'];
            $Photo = $result['Photo'];
          

// Updating the database to refelct any changes made to the documents decline
if (isset($_POST['accept'])) {
        # code......
        $parent_mail = $get_email;
        $babysitter_email = $_SESSION['gotten_email'];

   $update = mysqli_query($conn, "UPDATE request set  status = 'accepted' where parent_email = '$parent_mail' and sitter_email = '$babysitter_email'")
    or die(mysqli_error($conn));

    if ($update) {
      # code...
  $suc_msg = "Parent Request Accepted Successfully";
    }else{
     $err_msg = "Sorry error occured!!! Please Refill";
    }
}
         
if (isset($_POST['decline'])) {
        # code......
        $parent_mail = $get_email;
        $babysitter_email = $_SESSION['gotten_email'];

   $update = mysqli_query($conn, "UPDATE request set  status = 'decline' where parent_email = '$parent_mail' and sitter_email = '$babysitter_email'")
    or die(mysqli_error($conn));

    if ($update) {
      # code...
  $suc_msg = "Parent Request Accepted Successfully";
    }else{
     $err_msg = "Sorry error occured!!! Please Refill";
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
  <style type="text/css">
      .modal-content, #caption{
        -webkit-animation-name : zoom;
         -webkit-animation-duration : 0.6s;
          -animation-name : zoom;
          animation-duration : 0.6s;
      }
      @keyframes zoom{
        from {transfrom:scale(0)}
        t0 {transfrom:scale(1)}
      }
    </style>

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
            <li class="breadcrumb-item active"><?=$Email?>  Profile</li>
          </ol>
            <div style = "width:100%; height:auto; ">
            <?php
              if (!empty($err_msg)) {
                # code...
                echo '<h4 style = "color:red; text-align: center;"><b>'.$err_msg.'</b></h4>';
              }
              if (!empty($suc_msg)) {
                # code...
                echo '<h4 style = "color:green; text-align: center;"><b>'.$suc_msg.'</b></h4>';
              }
              
      ?>
      </div>
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-7">
              
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color:  #bcbcbc; text-align: center; padding-top: 1px; border-radius: 5px; width: 100%; height: 25px;">
                  <h5> Parent Profile Information</h5>
                </div>
                <div class="panel-body" style="border:1px solid  #bcbcbc; padding: 20px;">
                  <form method="POST" action="view_profile.php">
                    <div class="row">
                    <div class="col-sm-6 form-group">
                      <label>First Name:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z ]+$" id="name_1" readonly name="name_1" value="<?=$FirstName?>">
                    </div>
                    <div class="col-sm-6 form-group">
                      <label>Other Names:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z ]+$" id="name_2" readonly name="name_2" value="<?=$OtherNames?>">
                    </div> </div>

                    <div class="row">
                    <div class="form-group col-sm-6">
                    <label>Gender</label>
                    <select id="gender" name="gender"  class="form-control" placeholder="Choose Your Gender" required="required" readonly>
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
                    <div class="form-group col-sm-6">
                      <label>Email:</label>
                      <input type="text"  class="form-control" id="name" name="email" value="<?=$Email?>" readonly>
                    </div> </div>
                   
                   <div class="row">
                    <div class="form-group col-sm-6">
                      <label>Phone Number:</label>
                      <input type="text" class="form-control" required pattern="[0-9]{11}" id="name" name="fone" value="<?=$Phone?>" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                      <label>Contact Address:</label>
                      <input type="text" class="form-control" required pattern="^[A-Za-z|A-Za-z0-9 ]+$" id="name" readonly name="address" value="<?=$Contact?>">
                    </div> </div>

                    <div class="row">
                    <div class="form-group col-sm-6">
                    <label>State Of Origin</label>
                    <select id="state_o" name="state_o" class="form-control" required="required" readonly>
                      <option>
                        <?=$State?>
                      </option> 
                      
                    </select>
                  </div>
                    <div class="form-group col-sm-6">
                      <label>Tribe:</label>
                      <input type="text" class="form-control" pattern="^[A-Za-z ]+$" id="name" readonly name="tribe" value="<?=$Tribe?>" required>
                    </div> </div>
                  <div class="row">
                  
                   </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <?php
              
      ?>
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color:  #bcbcbc; text-align: center; padding-top: 1px; border-radius: 5px; width: 100%; height: 25px;">
                  <h5>Profile Image</h5>
                </div>
                <div class="panel-body" style="border:1px solid  #bcbcbc; padding: 20px;">
                  <img  
                  <?php
                      if (empty($Photo)) {
                        # code...
                        echo 'src="img/uploads/avatar.png"';
                      }else{
                        echo 'src="'.$Photo.'"';
                      }
                  ?>
                   style="height: 250px; width: 100%;">
                  
                </div>
              </div>
              
            </div>
          </div>
            <!-- DataTables Example -->
          <div class="card mb-3" style ="margin-top:30px;">
            <div class="card-header">
              <i class="fas fa-table"></i>
              List Of Babies for <?php echo $FirstName . " ". $OtherNames;  ?>
               </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S/No</th>
                      <th>Full Name</th>
                      <th>Gender</th>
                      <th>Age</th>
                      <th>Location</th>
                     
                      <th>Parents Phone</th>
                      <th>Baby Photo</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $fetch = mysqli_query($conn,"Select * from babies where parent_email = '$get_email'");
                       while ($row = mysqli_fetch_assoc($fetch)) {
                    
                          $id = $row['id'];
                          $parent_email = $row['parent_email'];
                          $baby_name = $row['baby_name'];
                          $gender = $row['gender'];
                          $age = $row['age'];
                          $location = $row['location'];
                          $phone = $row['parent_phone'];
                          $photo = $row['photo'];

 

                          echo 
                          '
                            <tr>
                              <td> '.$id.' </td>
                              <td> '.$baby_name.' </td>
                              <td> '.$gender.' </td>
                              <td> '.$age.' </td>
                              <td> '.$location.' </td>
                                
                              <td> '.$phone.' </td>';
                              ?>
                              <td> <a href="" target="_blank" > <img src = "<?=$row['photo']?>" class="img-responsive" width="52px"; id = "myImg"/> </a>  </td>
                             
                              <?php echo '
                            </tr>
                          ';
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- <form action="" method = "POST">
          <div style="margin-left:12px; margin-top:10px; margin-bottom:20px; float:right">
              <button class="btn btn-info" type="submit" name = "accept" onclick="return confirm('Ready To Accept Request?')">  Accept</button>
              <button class="btn btn-danger" type="submit" name = "decline"></i> Decline</button> </div> </form> -->
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

    <!-- Preview Model -->
      <div id = "myModal" class ="modal">
        <span class ="close">X</span>
        <img class = "modal-content" id = "img01" >
        <div id = "caption"></div>
      </div>



    <!-- Ending of preview Model -->

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

    <script type="text/javascript">
      var modal = document.getElementById('myModal');
      var img = document.getElementById('myImg');
      var captionText = document.getElementById("caption");
      img.clock = function(){
        modal.style.display."block";
        modalImg.src = this.src;
        captionText,innerHTML = this .alt;
      }
      var span = document.getElementByClassName('close')[0];
      span.onclick = function(){
        modal.style.display = "none"
      }
      </script>

  </body>

</html>
