<?php require_once "controllerAdminData.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Forgot Password</h2>
                        <p>Enter your email address</p>
                    </div>
                    <div class="card-body">
                        <form action="forgot_pass_admin.php" method="POST" autocomplete="">
                            <?php
                            if (count($errors) > 0) {
                                echo '<div class="alert alert-danger text-center">';
                                foreach ($errors as $error) {
                                    echo $error . '<br>';
                                }
                                echo '</div>';
                            }
                            ?>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" name="check-email" value="Continue">
                            </div>
                            <div class="card-footer bg-white">
                                <p>Want to cancel? <a href="index.php" class="text-secondary">Login Here.</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/parsley.js"></script>
    <script>
        $('#form').parsley();
    </script>
</body>

</html>