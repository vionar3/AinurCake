<?php
session_start();
unset($_SESSION['user_admin_id']);
unset($_SESSION['user_admin_username']);
session_destroy();
header("Location: index.php");
