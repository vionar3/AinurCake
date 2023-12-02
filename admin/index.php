<?php
if (isset($_GET['login_error']) && $_GET['login_error'] == 1) {
    echo "<script>alert('Username or Password does not exist!')</script>";
    echo "<script>window.location.assign('index.php')</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AinurCake</title>
    <link rel="shortcut icon" href="../uploads/logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../css/kon.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" integrity="sha384-o5mY6cPYcd6yLlH4PZVgZvHYW1u1jGSwPqJZsbfOpYUuSMyi5q3cfUO5q7wEmE4o" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-image: url('../uploads/Wall2.jpg');
            background-size: cover;
        }

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.8); ">
            <div class="card-header text-center"><img src="../uploads/logo.png" class="img-fluid ml-3" width="200" height="auto" alt=""><a href="#">
                    <h2 class="text-primary">Ainur Cake Shop</h2>
                </a><span class="splash-description">Selamat datang ditampilan admin.</span></div>
            <div class="card-body">
                <form id="form" data-parsley-validate="" method="post" action="login_check.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="admin_username" data-parsley-trigger="change" required="" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="password-container">
                            <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password" name="admin_password">
                            <i class="toggle-password fas fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer  p-0 d-flex align-items-center">
                <!-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="register.php" class="footer-link">Buat Akun</a>
                </div> -->
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="forgot_pass_admin.php" class="footer-link">Lupa Password</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/parsley.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("pass1");
            var eyeIcon = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
    <script>
        $('#form').parsley();
    </script>
</body>

</html>