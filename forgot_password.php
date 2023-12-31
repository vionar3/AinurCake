<?php require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/myStylesAdmin.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
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
            padding-top: 50px;
            padding-bottom: 50px;
            background-image: url('uploads/Wall3.jpg');
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Lupa Password</h2>
                        <p>Masukkan alamat email anda</p>
                    </div>
                    <div class="card-body">
                        <form action="forgot_password.php" method="POST" autocomplete="">
                            <?php
                            if (count($errors) > 0) {
                                echo '<div class="alert alert-danger text-center">';
                                foreach ($errors as $error) {
                                    echo $error . '<br>';
                                }
                                echo '</div>';
                            }
                            ?>
                            <div class="form-group ">
                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" name="check-email" value="Continue">
                            </div>
                            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                                <div class="form-group">
                                    <p>Want to cancel? <a href="login_users.php" class="text-secondary">Login Here.</a></p>
                                </div>
                                <div class="form-group">
                                    <a href="forgot_password_hint.php" class="text-secondary">Use hint</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/parsley.js"></script>
    <script>
        $('#form').parsley();
    </script>
</body>

</html>