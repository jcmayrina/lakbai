<?php
session_start();
unset($_SESSION['userLvl']);
unset($_SESSION['userName']);
unset($_SESSION['userID']);
session_destroy();
header("location: index.php");
