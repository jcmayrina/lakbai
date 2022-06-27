<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<div class="navbarmain">
    <div class="logo">
        <a href="index.php">
            <div class="ltext">Lakb</div>
            <div class="dtext">AI</div>
        </a>
    </div>
    <ul class="navlink">
        <li><a href="index.php">HOME</a></li>
        <li><a href="generalMap.php">DESTINATIONS</a></li>
        <li><a href="saveMyVacation.php">SAVE MY VACATION</a></li>
        <li class="userlink"><a href="user-profile.php"><?php echo ucfirst($_SESSION['userName']); ?></a></li>
        <li class="userlink"><a href="logout.php">Logout</a></li>
    </ul>
</div>