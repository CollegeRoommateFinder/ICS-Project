<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        function validateRegForm(){
            var firstpwd = document.forms["regform"]["regpwd"];
            var secondpwd = document.forms["regform"]["regconfirmpwd"];
            var pwdlength = document.getElementById("pwdlength");
            var pwderror = document.getElementById("pwderror");

            if(firstpwd.value.length<6){
                firstpwd.style.border = "none";
                firstpwd.style.borderBottom = "2px solid red";
                pwdlength.innerHTML = "Too short! Your password must be at least 6 characters.";
                return false;
            }
            else if(firstpwd.value.length>=6){
                firstpwd.style.border = "";
                firstpwd.style.borderBottom = "";
                pwdlength.innerHTML = "";
            }

            if(firstpwd.value==secondpwd.value){
                pwderror.innerHTML = "";
                firstpwd.style.border = "";
                firstpwd.style.borderBottom = "";
                secondpwd.style.border = "";
                secondpwd.style.borderBottom = "";
                return true;
            }
            else{
                firstpwd.style.border = "none";
                firstpwd.style.borderBottom = "2px solid red";
                secondpwd.style.border = "none";
                secondpwd.style.borderBottom = "2px solid red";
                pwderror.innerHTML = "The passwords do not match!";
                return false;
            }

        }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="loginBox">
        <h3>Registration</h3>

        <form method="post" name="regform" onsubmit="return validateRegForm()">
          <div class="inputBox">
            <input type="text" name="regfname" placeholder="Enter First Name" required><br><br>
          </div>


          <div class="inputBox">
            <input type="text" name="reglname" placeholder="Enter Last Name" required><br><br>
          </div>


          <div class="inputBox">
            <input type="email" name="regemail" placeholder="Enter Email" required><br><br>
          </div>


          <div class="inputBox">
            <input type="text" name="reguname" placeholder="Enter Username" required>
          </div>


          <div class="inputBox">
            <input type="password" name="regpwd" placeholder="Enter Password" required>
          </div>


          <div id="pwdlength" style="float: right; color: red;"></div>
            <div class="inputBox">
            <input type="password" name="regconfirmpwd" placeholder="Confirm Password" required>
          </div>


          <div id="pwderror" style="float: right; color: red;"></div>
          
            <div class="inputBox">
            <select class="" name="regaccount" required>
              <option value="" selected="selected">Select Your Account Type</option>
              <option value="Client">Client</option>
              <option value="Job Applicant">Job Applicant</option>
            </select>
          </div>


          <div class="inputBox">
            <select class="" name="reggender" required>
              <option value="" selected="selected">Select Your Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>


          <input type="submit" name="regsubmit" value="Register">
          <h3>Already have an account?</h3><a href="login.php"><h3>Log In Here</h3></a>
        </form>
      </div>
    </div>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/BLUE_COLLAR_WORKER_RECRUITMENT/connection.php');
    if(isset($_POST['regsubmit'])){
      $reguname = mysqli_real_escape_string($db, $_POST['reguname']);
    	$regfname = mysqli_real_escape_string($db, $_POST['regfname']);
    	$reglname = mysqli_real_escape_string($db, $_POST['reglname']);
    	$regemail = mysqli_real_escape_string($db, $_POST['regemail']);
      $regpwd = mysqli_real_escape_string($db, $_POST['regpwd']);
    	$regaccount = mysqli_real_escape_string($db, $_POST['regaccount']);
      $reggender = mysqli_real_escape_string($db, $_POST['reggender']);



      $hashedPwd = password_hash($regpwd, PASSWORD_DEFAULT);
      if($regaccount=='Client') {
          $sql = "INSERT INTO user (Username,Email,Password,Account_Type,Gender) VALUES ('$reguname','$regemail','$hashedPwd','$regaccount','$reggender');";
          $sql .= "INSERT INTO client (First_Name,Last_Name,Username) VALUES ('$regfname','$reglname','$reguname')";
      }
      elseif ($regaccount=='Job Applicant'){
          $sql = "INSERT INTO user (Username,Email,Password,Account_Type,Gender) VALUES ('$reguname','$regemail','$hashedPwd','$regaccount','$reggender');";
          $sql .= "INSERT INTO applicant (First_Name,Last_Name,Username) VALUES ('$regfname','$reglname','$reguname')";
      }
      if(mysqli_multi_query($db, $sql)){
        ?>
        <script type="text/javascript">
        alert('Registration successful');
        window.location.href='login.php';
        </script>
        <?php
       }
       else
       {
         //mysqli_error;
        ?>
        <script type="text/javascript">
        alert('Something went wrong! Kindly fill in the registration form again.');
        window.location.href='register.php';
        </script>
        <?php
       }
    }
     ?>
  </body>
</html>
