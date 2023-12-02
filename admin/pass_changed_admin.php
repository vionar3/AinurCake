<?php require_once "controllerAdminData.php"; ?>

<?php
if ($_SESSION['info'] == false) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>
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
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                        <?php
                            unset($_SESSION['info']);
                        }
                        ?>
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <button class="form-control btn btn-primary" type="submit" name="login-now">Login Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>