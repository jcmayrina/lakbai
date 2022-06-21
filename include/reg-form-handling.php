<?php
session_start();
require_once 'dbh.php';
if (isset($_GET['deletetour'])) {
    $id = $_GET['deletetour'];
    $conn->query("DELETE FROM `destinations` WHERE dest_id = $id;") or die($mysqli->error());

    $_SESSION['message'] = "Tour has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: ../admin.php");
}
if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass =  $_POST['pass'];
    $cpass = $_POST['cpass'];
    $level = 2;
    $tags = $_POST['tags'];

    $fErr = $lErr = $phoneErr = $emailErr = $passErr = $cpassErr = "";

    if (empty($fname)) {
        $fErr = "First Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fErr = "Only letters and white space allowed";
        }
    }
    if (empty($lname)) {
        $lErr = "First Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lErr = "Only letters and white space allowed";
        }
    }


    if (!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $phone)) {
        $phoneErr = "Invalid Phone Number";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }


    if (empty($pass)) {
        $passErr = "Password is Required";
    } else {
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)) {
            $phoneErr = "Password should contain:\nMinimum eight characters\nat least one letter\none number";
        }
    }

    if (empty($cpass)) {
        $cpass = "";
    } else {
        if ($cpass != $pass) {
            $cpassErr = "Password didn't match!";
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
            header("location:../signup.php?error=usertaken");
        } else {
            $sql = "INSERT INTO users (user_fname,user_lname,user_contact,user_email,user_pass,user_lvl,user_tags) Values(?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../signup.php?error=stmt_failed");
            } else {
                foreach ($tags as $value) {
                    $temp .= $value . ", ";
                }
                $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $phone, $email, $pass, $level, $temp);
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
