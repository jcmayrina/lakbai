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
                $pTemp = strcmp($password, $row['user_pass']);
                if ($pTemp != 0) {
                    $pError = "Wrong password";
                    header("location.../login.php?passwordemail");
                    exit();
                } else if ($pTemp == 0) {
                    session_start();
                    $_SESSION['userName'] = $row['user_fname'];
                    $_SESSION['userID'] = $row['user_id'];
                    $_SESSION['userTag'] = $row['user_tags'];
                    $_SESSION['userLvl'] = $row['user_lvl'];

                    if ($_SESSION['userLvl'] == 2)
                        header("location: ../index.php");
                    if ($_SESSION['userLvl'] == 1)
                        header("location: ../admin.php");
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
