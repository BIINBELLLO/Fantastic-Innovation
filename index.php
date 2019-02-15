<?php
session_start();
include("includes/connection.php");
$Email = $Password = $Err_Msg = $Suc_Msg = '';
  if (isset($_POST['log_in'])) {
    # code...
    $Email = $_POST['inputEmail'];
    $Password = $_POST['inputPassword'];
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      # code...
      $Err_Msg = "The Email Format Is Not Correct!";
    }else{
      $admin_sql = mysqli_query($conn, "select * from admin_tb where username = '$Email' and password = '$Password'");
      if (mysqli_num_rows($admin_sql) > 0) {
        $Fetch_Result = mysqli_fetch_assoc($admin_sql);
         $_SESSION['User_Type'] = $Fetch_Result['user_type'];
      $_SESSION['gotten_email'] = $Email;
        header('Location:admin/dashboard.php');
      }
      else{

    $Exe_Qry = mysqli_query($conn, "Select * from log_in where Email = '".$Email."' and Password = '".$Password."'");
    $Count = mysqli_num_rows($Exe_Qry);
    if ($Count!=1) {
      # code...
      $Err_Msg = "Wrong Username or Password!";
    }else{
      $Fetch_Result = mysqli_fetch_assoc($Exe_Qry);
      $_SESSION['User_Type'] = $Fetch_Result['User_Type'];
      $_SESSION['gotten_email'] = $Fetch_Result['Email'];
      header("Location: dashboard.php");
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

    <title>Babysitting System</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="vendor/bootstrap/css/bootstrap.mint.css" rel="stylesheet"> -->

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
 
  <body class="bg-dark">
  <?php include("includes/header.php"); ?>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <?php
              if (!empty($Err_Msg)) {
                # code...
                echo '<p style = "color:red; text-align:center;">'.$Err_Msg.'</p>';
              }
      ?>
        <div class="card-body">
          <form method="POST" action="index.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" minlength="8" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name = "log_in">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="forgot_password.php">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
    <div style="height: 100px;">
      
    </div>
    <?php include("includes/footer.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
