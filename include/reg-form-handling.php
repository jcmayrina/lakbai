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
if (isset($_GET['deleteuser'])) {
    $id = $_GET['deleteuser'];
    $conn->query("DELETE FROM `users` WHERE user_id = $id;") or die($mysqli->error());

    $_SESSION['message'] = "User has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: ../admin.php");
}
if (isset($_POST['updateUser'])) {
    $userID = $_POST['userID'];
    $userFname = $_POST['fname'];
    $userLname = $_POST['lname'];
    $userPhone = $_POST['phone'];
    $userEmail = $_POST['email'];
    $userPass = $_POST['pass'];
    $usertags = $_POST['tags'];
    $temp = '';
    foreach ($usertags as $value) {
        $temp .= $value . ",";
    }
    $conn->query("UPDATE `users` SET `user_fname`='$userFname',`user_lname`='$userLname',`user_contact`='$userPhone',`user_email`='$userEmail',`user_pass`='$userPass',`user_tags`='$temp' WHERE `user_id`=$userID") or die($conn->error);

    $_SESSION['message'] = "User has been updated!";
    $_SESSION['msg_type'] = "info";
    header("location: ../user-profile.php");
}
if (isset($_POST['addReview'])) {
    $userID = $_POST['userID'];
    $destID = $_POST['destID'];
    $review = $_POST['review'];

    $conn->query("INSERT INTO `reviews`(`review_userID`, `review_destID`, `review_comment`, `review_star`) VALUES ('$userID','$destID','$review','⭐⭐⭐⭐⭐');") or die($conn->error);

    $_SESSION['message'] = "Added a review!";
    $_SESSION['msg_type'] = "info";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['editTour'])) {
    $destID = $_POST['destID'];
    $destName = $_POST['destName'];
    $destDesc = $_POST['destDesc'];
    $destAdd = $_POST['destAdd'];
    $destCity = $_POST['destCity'];
    $destPrice = $_POST['destPrice'];
    $destSeason = $_POST['destSeason'];
    $destMap = $_POST['destMap'];
    $destLat = $_POST['destLat'];
    $destLong = $_POST['destLong'];
    $destTags = $_POST['destTags'];
    $folder = "../images/lakbai-places/";
    $image = $_FILES['destImageUpl']['name'];
    $destExistImg = $_POST['destExistImg'];
    $checkimg = strlen($image);


    if ($checkimg > 0)
        $conn->query("UPDATE `destinations` SET `dest_name`='$destName',`dest_desc`='$destDesc',`dest_add`='$destAdd',`dest_stprice`='$destPrice',`dest_season`='$destSeason',`dest_image`='$image',`dest_map`='$destMap',`dest_long`='$destLong',`dest_lat`='$destLat',`dest_tags`='$destTags',`dest_city`='$destCity' WHERE `dest_id` = $destID") or die($conn->error);
    else
        $conn->query("UPDATE `destinations` SET `dest_name`='$destName',`dest_desc`='$destDesc',`dest_add`='$destAdd',`dest_stprice`='$destPrice',`dest_season`='$destSeason',`dest_image`='$destExistImg',`dest_map`='$destMap',`dest_long`='$destLong',`dest_lat`='$destLat',`dest_tags`='$destTags',`dest_city`='$destCity' WHERE `dest_id` = $destID") or die($conn->error);


    move_uploaded_file($_FILES['destImageUpl']['tmp_name'], $folder . $image);
    $_SESSION['message'] = "Tour has been updated!";
    $_SESSION['msg_type'] = "info";
    header("location: ../admin.php");
}
if (isset($_POST['addTour'])) {
    $destName = $_POST['destName'];
    $destDesc = $_POST['destDesc'];
    $destAdd = $_POST['destAdd'];
    $destCity = $_POST['destCity'];
    $destPrice = $_POST['destPrice'];
    $destSeason = $_POST['destSeason'];
    $destMap = $_POST['destMap'];
    $destLat = $_POST['destLat'];
    $destLong = $_POST['destLong'];
    $destTags = $_POST['destTags'];
    $folder = "../images/lakbai-places/";
    $image = $_FILES['destImageUpl']['name'];


    $conn->query("INSERT INTO `destinations`(`dest_name`, `dest_desc`, `dest_add`, `dest_stprice`, `dest_season`, `dest_image`, `dest_map`, `dest_long`, `dest_lat`, `dest_tags`, `dest_city`)
    VALUES ('$destName', '$destDesc', '$destAdd', '$destPrice', '$destSeason', '$image', '$destMap', '$destLong', '$destLat', '$destTags', '$destCity')") or die($conn->error);


    if (move_uploaded_file($_FILES['destImageUpl']['tmp_name'], $folder . $image)) {
        $_SESSION['message'] = "Tour has been added!";
        $_SESSION['msg_type'] = "success";
        header("location: ../admin.php");
    }
}
if (isset($_POST['submit'])) {
    require_once 'dbh.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass =  $_POST['pass'];
    $cpass = $_POST['cpass'];
    $level = 2;
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
