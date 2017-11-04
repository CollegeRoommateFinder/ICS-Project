<!DOCTYPE html>
<html>


<Title> Sign Up </Title>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
</head>

<body>
 <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.html">Home </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="about.html">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>



<div
   class="row register-form">
   <div class="col-md-8 col-md-offset-2">
    <form class="form-horizontal custom-form" method="post">
        <h1>WELCOME</h1>

    

    <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">First Name  </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="firstname" required >
                    </div>
                </div>



                 <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Last Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="lastname" required >
                    </div>
                </div>
                


                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" name="email" required >
                    </div>
                </div>


                  <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="telephone-input-field">Phone Number </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="tel" name="phonenumber" required >
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password" required>
                    </div>
                </div>


                
            

                <div class="checkbox">
                    <label>
                        <input type="checkbox">I've read and accept the terms and conditions</label>
                </div><!--<a class="btn btn-default submit-button" role="button" href="profile.html">Register </a>-->
                <div>
                    <input type="submit" name="register-form-submit" value="Register">
                </div>
                <div class="col-md-12"><a href="login.html">Already have an account? Click here</a></div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>


<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['register-form-submit'])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $password = $_POST["password"];


        $ServerName = "localhost"; 
        $UserName = "root";
        $Password = "";

        /*$StudentID = "";
        $FirstNameame = "";
        $LastName = "";
        $Email = "";
        $Password = "";
        $PhoneNo = "";*/
        $db = "roommate_finder";

        $conn = mysqli_connect($ServerName,$UserName,$Password,$db); //It connects
        $query = "INSERT INTO  students (FirstName, LastName, Email, PhoneNo, Password) VALUES ('$firstname', '$lastname', '$email','$phonenumber', '$password' )";
        mysqli_query($conn, $query);


        
      /* if(mysqli_query($conn, $query)){
        ?>php
        <script type="text/javascript">
        alert('Registration successful');
        window.location.href='login.html';
        </script>
        <?php
       }
       else
       {
         //mysqli_error;
        ?>
        <script type="text/javascript">
        alert('Something went wrong! Kindly fill in the registration form again.');
        window.location.href='signup.php';
        </script>
        >?
        }
        */
        }
           }
?>

</body>

</html>