<?php require_once "controllerAdminData.php"; ?>

<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Code Verification</title>
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
                        <h2>Code Verification</h2>
                    </div>
                    <div class="card-body">
                        <form action="resetCode_admin.php" method="POST" autocomplete="off">
                            <?php
                            if (isset($_SESSION['info'])) {
                            ?>
                                <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                    <?php echo $_SESSION['info']; ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                                    foreach ($errors as $showerror) {
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
    <script src="../js/otp_input.js"></script>
</body>

</html>