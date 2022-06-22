<?php
session_start();
if (isset($_POST['submit'])) {
    require_once 'dbh.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass =  $_POST['pass'];
    $cpass = $_POST['cpass'];
    $level = "user";
    $tags = $_POST['tags'];




    if (empty($fname)) {
        header("location:../register.php?error=emptyfname&lname=$lname&phone=$phone&email=$email");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            header("location:../register.php?error=invalidfname&lname=$lname&phone=$phone&email=$email");
            exit();
        }
    }
    if (empty($lname)) {
        header("location:../register.php?error=emptylname&fname=$fname&phone=$phone&email=$email");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            header("location:../register.php?error=invalidlname&fname=$fname&phone=$phone&email=$email");
            exit();
        }
    }


    if (!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $phone)) {
        header("location:../register.php?error=invalidphone&fname=$fname&lname=$lname&email=$email");
        exit();
    }

    if (empty($email)) {
        header("location:../register.php?error=emptyemail&fname=$fname&lname=$lname&phone=$phone");
        exit();
    } else {
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location:../register.php?error=invalidemail&fname=$fname&lname=$lname&phone=$phone");
            exit();
        }
    }


    if (empty($pass)) {
        header("location:../register.php?error=emptypass&fname=$fname&lname=$lname&phone=$phone&email=$email");
        exit();
    } else {
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
            header("location:../register.php?error=invalidpass&fname=$fname&lname=$lname&phone=$phone&email=$email");
            exit();
        }
    }

    if (empty($cpass)) {
        header("location:../register.php?error=emptycpass&fname=$fname&lname=$lname&phone=$phone&email=$email");
        exit();
    } else {
        if ($cpass != $pass) {
            header("location:../register.php?error=notmatch&fname=$fname&lname=$lname&phone=$phone&email=$email");
            exit();
        }
    }

    $sql = "SELECT * FROM users WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmt_failed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_num_rows($stmt);

        if ($result > 0) {
            header("location:../register.php?error=emailtaken&fname=$fname&lname=$lname&phone=$phone");
            exit();
        } else {
            $sql = "INSERT INTO users (user_fname,user_lname,user_contact,user_email,user_pass,user_lvl,user_tags) Values(?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../signup.php?error=stmt_failed");
                exit();
            } else {
                foreach ($tags as $value) {
                    $temp .= $value . ", ";
                }
                $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $phone, $email, $hashedpass, $level, $temp);
                mysqli_stmt_execute($stmt);
                header("location: ../login.php");
            }
        }
    }
    exit();
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location.../register.php");
    exit();
}
