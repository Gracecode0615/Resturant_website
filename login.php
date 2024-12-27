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
      
      @media (max-width:500px){
        .col-lg-5{
            display: none;
        }
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
                            <p>Get the app</p>
                        </div>
                        <div class="text-content mb-4">
                            <h4 class="mt-5 text-capitalize">Welcome back, <?=htmlspecialchars($first); ?>!</h4>
                        <p>Login to book a table!</p>
                        </div>
                        <form action="" method="post" class="text-white">
                            <div class="form-text text-white my-2
                            ">Username/Email Address</div>
                            <div class="form-floating">
                                <input type="text"  class="form-control">
                                <label for="username">Username/Email Address</label>
                            </div>
                            
                            
                            <div class="form-text text-white my-2
                            ">Password</div>
                            <div class="form-floating my-3">
                              <input type="password" name="password" id="" class="form-control">
                            </div>
                            <div class="form-floating my-3 mt-4 text-white">
                              <input type="submit" name="reg" id="" class="form-control py-2 bg-warning text-white fw-bold fs-5" value="Login">
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
            </div>
            <div class="col-lg-5 custom-bg">
                <div class="text-center mt-5 d-flex justify-content-center align-items-center flex-column" style="height: 100%;">
                    <h2>Welcome to food place</h2>
                    <p>Your gate way to amazing recipes and food deals</p>
                    <span>Don't have an account? <a href="register.php">Register</a></span>
                </div>

            </div>
        </div>

    </div>
</body>
</html>