<?php
session_start();
include 'config.php';
// errors
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

if (isset($_POST['reg'])){
    $first = mysqli_real_escape_string($con, $_POST['first']);
    $last = mysqli_real_escape_string($con, $_POST['last']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $retype = mysqli_real_escape_string($con, $_POST['retype']);
    $passwordh = password_hash($password, PASSWORD_DEFAULT);

    $error_message = "";

    if(empty($first) || empty($last)|| empty($number) || empty($email) || empty($password) || empty($retype)){
        $error_message = "<div class='alert alert-danger'>All field are required!</div>";
    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error_message = "<div class='alert alert-danger'>Invalid Email address!</div>";
    }elseif(!preg_match('/^[\w\.-]+@([\w-]+\.)+com$/' , $email) && !preg_match('/^[\w\.-]+@gmail\.com$/', $email)){
        $error_message = "<div class='alert alert-danger'>Email must end in .com or @gmail.com!</div>";
    }else{
        // check if email already exist
            $email_check_query = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $email_check_query);
            $email_exists = mysqli_num_rows($result) > 0;
            if ($email_exists){
                    $error_message = "<div class='alert alert-danger'>Email already exists!</div>";
            }elseif($password !== $retype){
                $error_message = "<div class='alert alert-danger'>password do not match!</div>";

            }else{
                $sql = "INSERT INTO `user` (`first`,`last`,`number`,`email`,`password`) VALUES ('$first','$last','$number','$email','$passwordh')";
                $query = mysqli_query($con, $sql);
                if($query){
                    echo"<div class='alert alert-success'>REgister successfully</div>";
                    header('Location:login.php');
                    exit();
                }else{
                $error_message = "<div class='alert alert-danger'>failed to register!</div>";
                }
            }
   
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/main.css">
  <style>
      /* Custom styles for the background */
      .custom-bg {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url("/assets/img/hero-bg.jpg");
            background-size: cover; /* Ensures the image covers the div */
            background-position: center; /* Centers the image */
            color: white; /* Makes text readable over the dark background */
            height: 100vh; /* Ensures it fills the viewport height */
            /* width: 100vw; */
      }
  </style>
</head>
<body>
    <div class="container-fluid text-white">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-between align-items-center">
               <div class="container d-flex justify-content-between align-items-center">
                <div class="row d-flex justify-content-between align-items-center">
                    
                </div>
               </div>
               <div class="col-lg-2"></div>
                    <div class="col-lg-8 text-white">
                        <div class=" shift text-white d-flex justify-content-between align-items-center">
                            <h2>Food Place</h2>
                            <div>Get the app</div>
                        </div>
                        <h4 class="mt-5">Hello!</h4>
                        <p>Create new account!</p>
                        <form action="" method="post" class="text-white">
                        <?php if(isset($error_message)) echo $error_message; ?>
                            <div class="form-floating">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <label for="first">first Name</label>
                                        <input type="text" name="first" class="form-control">
                                    </div>
                                    <div class="">
                                        <label for="first">last Name</label>
                                        <input type="text" name="last" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-text text-white my-2
                            ">Whatsapp number</div>
                            <div class="form-floating my-3">
                              <input type="number" name="number" id="" class="form-control">
                            </div>
                            <div class="form-text text-white my-2
                            ">Email</div>
                            <div class="form-floating my-3">
                              <input type="email" name="email" id="" class="form-control">
                            </div>
                            <div class="form-text text-white my-2
                            ">Password</div>
                            <div class="form-floating my-3">
                              <input type="password" name="password" id="" class="form-control">
                            </div>
                            <div class="form-text text-white my-2
                            ">Retype Password</div>
                            <div class="form-floating my-3">
                              <input type="password" name="retype" id="" class="form-control">
                            </div>
                            <div class="form-floating my-3 mt-4 text-white">
                              <input type="submit" name="reg" id="" class="form-control py-2 bg-warning text-white fw-bold" value="Register">
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
            </div>
            <div class="col-lg-5 custom-bg">
                <div class="text-center mt-5 d-flex justify-content-center align-items-center flex-column" style="height: 100%;">
                    <h2>Welcome to food place</h2>
                    <p>your gate way to amazing recipes and food deals</p>
                    <span>Already have an account? <a href="login.php">Login</a></span>
                </div>


            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>