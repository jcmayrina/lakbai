<?php
if (isset($_POST['login-submit'])) {
    require_once 'dbh.php';

    $email = $_POST['email'];
    $password = $_POST['pass'];


    if (empty($email)) {
        $emailErr = "Email is required";
        header("location.../login.php?erroremail");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        header("location.../login.php?erroremail");
        exit();
    } else {
        $sql =  "SELECT * FROM users WHERE user_email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location.../login.php?errordb");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pTemp = password_verify($password, $row['user_pass']);
                if ($pTemp == false) {
                    $pError = "Wrong password";
                    header("location.../login.php?passwordemail");
                    exit();
                } else if ($pTemp == true) {
                    session_start();
                    $_SESSION['userName'] = $row['user_fname'];

                    header("location:../index.php");
                    exit();
                } else {
                    $pError = "Wrong password";
                    header("location.../login.php?passwordemail");
                    exit();
                }
            } else {
                header("location.../login.php?noUser");
                exit();
            }
        }
    }
} else {
    header("location.../login.php");
    exit();
}
