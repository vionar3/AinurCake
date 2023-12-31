<?php require_once "controllerUserData.php"; ?>

<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login_users.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Code Verification</title>
    <link rel="shortcut icon" href="uploads/logo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html, body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url('uploads/Wall3.jpg');
            background-size: cover;
            .card {
        border-radius: 15px;
        box-shadow: 0 8px 8px 0 rgba(0,0,0,100);}
        .row {
        border-radius: 25px;
        box-shadow: 0 8px 8px 0 rgba(0,0,0,100);
    }

    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Kode Verifikasi</h2>
                    </div>
                    <div class="card-body">
                        <form action="reset_code.php" method="POST" autocomplete="off">
                            <?php 
                            if(isset($_SESSION['info'])){
                                ?>
                                <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if(count($errors) > 0){
                                ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach($errors as $showerror){
                                        echo $showerror;
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <input class="form-control otp-input" name="otp[]" maxlength="1" required>
                                    <input class="form-control otp-input" name="otp[]" maxlength="1" required>
                                    <input class="form-control otp-input" name="otp[]" maxlength="1" required>
                                    <input class="form-control otp-input" name="otp[]" maxlength="1" required>
                                    <input class="form-control otp-input" name="otp[]" maxlength="1" required>
                                    <input class="form-control otp-input" name="otp[]" maxlength="1" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" name="check-reset-otp[]" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js\otp_input.js"></script>
</body>
</html>
