<?php
session_start();
require_once('admin-db.php');
$data = new admin();
$showcurrUser = $data->showcurrUser();
$reviewdatauser = $data->viewReviewsUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://kit.fontawesome.com/8e42a01d1f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/user-profile.css" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <title>User</title>
</head>

<body>
    <?php

    if (!isset($_SESSION['userLvl'])) {

        include("navbar.php");
    } else {
        if ($_SESSION['userLvl'] == 2) {
            include("navbar-user.php");
        } else {
            include("navbar.php");
        }
    }
    ?>


    <?php
    if (isset($_SESSION['message'])) :
    ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php
    endif;
    ?>
    <div class="main-container">


        <div class="left-container">
            <h2>User Profile</h2>
            <hr>
            <?php
            foreach ($showcurrUser as $i) :
                $tags = explode(",", $i['user_tags']);
            ?>
                <form method="POST" action="./include/reg-form-handling.php" enctype="multipart/form-data">
                    <input type="hidden" name="userID" value="<?php echo $i['user_id'] ?>">
                    <label for="fname">First Name:</label>
                    <input type="text" placeholder="First Name" name="fname" value="<?php echo $i['user_fname'] ?>" />
                    <label for="lname">Last Name:</label>
                    <input type="text" placeholder="Last Name" name="lname" value="<?php echo $i['user_lname'] ?>" />
                    <label for="phone">Contact:</label>
                    <input type="tel" placeholder="Contact number" name="phone" value="<?php echo $i['user_contact'] ?>" />
                    <label for="email">Email:</label>
                    <input type="email" placeholder="E-Mail" name="email" value="<?php echo $i['user_email'] ?>" />
                    <label for="pass">Password:</label>
                    <input type="password" placeholder="Password" name="pass" value="<?php echo $i['user_pass'] ?>" />
                    <label for="tags[]">Tags:</label>
                    <select class="selectpicker" name="tags[]" multiple>
                        <option value="culture" <?php for ($x = 0; $x < count($tags); $x++) if (str_contains($tags[$x], 'culture')) echo "selected"; ?>>Culture & History</option>
                        <option value="nature" <?php for ($x = 0; $x < count($tags); $x++)  if (str_contains($tags[$x], 'nature')) echo "selected"; ?>>Nature & Adventure</option>
                        <option value="art" <?php for ($x = 0; $x < count($tags); $x++)  if (str_contains($tags[$x], 'art')) echo "selected"; ?>>Art & Museums</option>
                        <option value="culinary" <?php for ($x = 0; $x < count($tags); $x++)  if (str_contains($tags[$x], 'culinary')) echo "selected"; ?>>Culinary & Nightlife</option>
                        <option value="summer" <?php for ($x = 0; $x < count($tags); $x++)  if (str_contains($tags[$x], 'summer')) echo "selected"; ?>>Summer experience</option>
                    </select>
                    <button type="submit" name="updateUser">Update</button>
                </form>
            <?php
            endforeach;
            ?>
        </div>
        <div class="right-container">
            <h1>Visited Places</h1>
            <div class="visited-places">
                <?php
                foreach ($reviewdatauser as $j) :
                ?>
                    <div class="visited-places-info">
                        <img src="<?php echo "images/lakbai-places/" . $j['dest_image']; ?>" alt="<?php echo $j['dest_name']; ?>">
                        <div>
                            <h3><?php echo $j['dest_name']; ?></h3>
                            <h4><?php echo $j['dest_city']; ?></h4>
                            <section>
                                <p><?php echo $j['review_star']; ?></p>
                                <p><?php echo $j['review_comment']; ?></p>
                            </section>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
                <hr>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>