<link rel="preconnect" href="https://fonts.googleapis.com">
<script src="/js/typed.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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