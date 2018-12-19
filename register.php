<?php
include("includes/connection.php");

$First_Name = $Other_Name = $Email = $Phone_No = $Address = $Tribe = $State = $LGA = $Password_1 = $Password_2 = $User_Type = $Gender = "";
$Err_Msg = $Suc_Msg = '';

if (isset($_POST['create'])) {
  # code...
 // echo '<script>alert("Working!!!");</script>';
  $First_Name = $_POST['firstName'];
  $Other_Name = $_POST['otherName'];
  $Email = $_POST['inputEmail'];
  $Phone_No = $_POST['fone'];
  $Password_1 = $_POST['inputPassword'];
  $Password_2 = $_POST['confirmPassword'];
  $User_Type = $_POST['user_type'];
  $Address = $_POST['contact'];
  $State = $_POST['state_o'];
  $LGA = $_POST['local_ga'];
  $Tribe = $_POST['tribe'];
  $Gender = $_POST['gender'];
  if ($User_Type=="" || $State == "" || $LGA == "" || $Gender == "") {
    # code...
      $Err_Msg = "User type, Gender, State of origin,  or local Government has not been selected! Please Do so!";
  }else{
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      # code...
      $Err_Msg = "The Email Format Is Not Correct!";
    }else{
      if ($Password_1!=$Password_2) {
        # code...
        $Err_Msg = "Password Mismatch! Please Ensure That Both Passwords are the same!";
      }else{
        $Exe_Qry_1 = mysqli_query($conn, "Select * from log_in where Email = '".$Email."'");
        $Count = mysqli_num_rows($Exe_Qry_1);
        if ($Count > 0) {
          # code...
          $Err_Msg = "User Already Exists!!!";
        }else{
            if ($User_Type == "Babysitter") {
              # code...
              $Exe_Qry_2 = mysqli_query($conn, "Insert Into log_in (Email,Password,User_Type) values ('".$Email."','".$Password_1."','".$User_Type."')");
              $Exe_Qry_3 = mysqli_query($conn, "Insert Into babysitter (First_Name, Other_Names, Email, Phone_No, Address, State_of_origin, Local_Govt, Tribe,Gender) 
                values ('".$First_Name."','".$Other_Name."','".$Email."','".$Phone_No."','".$Address."','".$State."','".$LGA."','".$Tribe."','".$Gender."')");
              if ($Exe_Qry_2 && $Exe_Qry_3) {
                # code...
                $Suc_Msg = "Registration Successful!"."<br>"."<a href = 'index.php'>Click Here </a> To Log In!";

              }elseif ($Exe_Qry_2 && !$Exe_Qry_3) {
                # code...
                $Err_Msg = "Babysitter Profile Not Saved,";
              }elseif (!$Exe_Qry_2&&$Exe_Qry_3) {
                # code...
                $Err_Msg = "Babysitter Log In Details Not Saved,";
              }else{
                $Err_Msg = "Complete Registration Error, Please Contact The Admin!";
              }
            }elseif ($User_Type == "Parent") {
              # code...
              $Exe_Qry_2 = mysqli_query($conn, "Insert Into log_in (Email,Password,User_Type) values ('".$Email."','".$Password_1."','".$User_Type."')");
              $Exe_Qry_3 = mysqli_query($conn, "Insert Into parents (First_Name, Other_Names,Email,Phone_No, Address, State_of_origin, Local_Govt,Tribe,Gender) 
                values ('".$First_Name."','".$Other_Name."','".$Email."','".$Phone_No."','".$Address."','".$State."','".$LGA."','".$Tribe."','".$Gender."')");
              if ($Exe_Qry_2&&$Exe_Qry_3) {
                # code...
                $Suc_Msg = "Registration Successful!"."<br>"."<a href = 'index.php'>Click Here </a> To Log In!";

              }elseif ($Exe_Qry_2 && !$Exe_Qry_3) {
                # code...
                $Err_Msg = "Parent Profile Not Saved,";
              }elseif (!$Exe_Qry_2&&$Exe_Qry_3) {
                # code...
                $Err_Msg = "Parent Log In Details Not Saved,";
              }else{
                $Err_Msg = "Complete Registration Error, Please Contact The Admin!";
              }
            }
        }
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
    <?php include("includes/header.php"); ?>
    <div class="container">

      <div class="card card-register mx-auto mt-5">
              
        <div class="card-header">Register an Account</div>
        <?php
              if (!empty($Err_Msg)) {
                # code...
                echo '<p style = "color:red;">'.$Err_Msg.'</p>';
              }
              if (!empty($Suc_Msg)) {
                # code...
                echo '<p style = "color:green;">'.$Suc_Msg.'</p>';
              }
      ?>
        <div class="card-body">
          <form method="POST" action="register.php">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" pattern="^[A-Za-z ]+$" name="firstName" class="form-control" placeholder="First name" required="required" value="<?=$First_Name?>" autofocus="autofocus">
                    <label for="firstName">First Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="odaName" pattern="^[A-Za-z ]+$" value="<?=$Other_Name?>" name="otherName" class="form-control" placeholder="Last name" required="required">
                    <label for="odaName">Other Names</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" value="<?=$Email?>" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" minlength="8" name="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" minlength="8" name="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="fone" name="fone" value="<?=$Phone_No?>" pattern="[0-9]{11}" class="form-control" placeholder="Phone Number" required="required" autofocus="autofocus">
                    <label for="fone">Phone Number</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="tribe" name="tribe" value="<?=$Tribe?>" pattern="^[A-Za-z ]+$" class="form-control" placeholder="Tribe" required="required" autofocus="autofocus">
                    <label for="tribe">Tribe</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="contact" name="contact" value="<?=$Address?>" pattern="^[A-Za-z|A-Za-z0-9 ]+$" class="form-control" placeholder="Enter Contact Address" required="required">
                <label for="contact">Contact Address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
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
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>User Type</label>
                    <select id="user_type" name="user_type" class="form-control" placeholder="Choose Between Parent or Babysitter" required="required">
                      <option>
                        <?=$User_Type?>
                      </option>
                      <option>
                        Select User Type
                      </option>
                      <option>
                        Babysitter
                      </option>
                      <option>
                        Parent
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Gender</label>
                    <select id="gender" name="gender" class="form-control" placeholder="Choose Your Gender" required="required">
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
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name = "create">Register</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="index.php">Login Page</a>
            <a class="d-block small" href="forgot_password.php">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>
     <?php include("includes/footer.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
