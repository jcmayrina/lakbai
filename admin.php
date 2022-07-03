<?php
session_start();
require_once('admin-db.php');

$data = new admin();
$userdata = $data->viewUsers();
$tourdata = $data->viewToursGen();
$reviewdata = $data->viewReviews();
$updatedata = $data->editTour();

if ($_SESSION['userLvl'] != 1) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="./js/admin.js"></script>
</head>

<body>
    <div class="navmain">
        <ul class="navlink">
            <li class="showtour">Tours</li>
            <li class="showuser">Users</li>
            <!-- <li class="showfeed">Feedbacks</li> -->
            <a href="logout.php">
                <li>Logout</li>
            </a>
    </div>

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
    <!-- tours -->
    <div class="container-lg" id="tour">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Tour <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="#bottom">
                                <button type="button" class="btn btn-info add-new-tour"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Starting Price</th>
                            <th>Best Season</th>
                            <th>Image</th>
                            <th>Map iframe</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tourdata as $i) { ?>
                            <tr>
                                <td><?php echo $i['dest_name']; ?></td>
                                <td class="desc"><?php echo $i['dest_desc']; ?></td>
                                <td><?php echo $i['dest_add']; ?></td>
                                <td><?php echo $i['dest_city']; ?></td>
                                <td><?php echo $i['dest_stprice']; ?></td>
                                <td><?php echo $i['dest_season']; ?></td>
                                <td><img src="<?php echo "images/lakbai-places/" . $i['dest_image']; ?>" alt="" height="100px" width="120px"></td>
                                <td class="maps"><?php echo $i['dest_map']; ?></td>
                                <td><?php echo $i['dest_lat']; ?></td>
                                <td><?php echo $i['dest_long']; ?></td>
                                <td><?php echo $i['dest_tags']; ?></td>
                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                    <a href="?edittour=<?php echo $i['dest_id'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="./include/reg-form-handling.php?deletetour=<?php echo $i['dest_id'] ?>" onclick='javascript:return confirm("Are you sure you want to delete this comment?")' class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <table class="table table-bordered updateTourTable" id="updateTourTable" <?php if (isset($_GET['edittour'])) echo "style='display: block'" ?>>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Starting Price</th>
                            <th>Best Season</th>
                            <th>Image</th>
                            <th>Map iframe</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form method="POST" action="./include/reg-form-handling.php" enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['edittour']))
                                    foreach ($updatedata as $i) {
                                ?>
                                    <td><input type="hidden" value="<?php echo $i['dest_id']; ?>" name="destID"><input class="form-control" value="<?php echo $i['dest_name']; ?>" type="text" name="destName" id="destName"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_desc']; ?>" type="text" name="destDesc" id="destDesc"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_add']; ?>" type="text" name="destAdd" id="destAdd"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_city']; ?>" type="text" name="destCity" id="destCity"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_stprice']; ?>" type="text" name="destPrice" id="destPrice"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_season']; ?>" type="text" name="destSeason" id="destSeason"></td>
                                    <td>
                                        <img src="<?php echo "images/lakbai-places/" . $i['dest_image']; ?>" height="100px" width="120px">
                                        <input type="hidden" value="<?php echo $i['dest_image']; ?>" name="destExistImg">
                                        <input class="form-control-pass" type="file" name="destImageUpl" id="destImageUpl">
                                        <label for="destImageUpl">Choose Image</label>
                                    </td>
                                    <td><input class="form-control" value='<?php echo $i['dest_map']; ?>' type="text" name="destMap" id="destMap"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_lat']; ?>" type="text" name="destLat" id="destLat"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_long']; ?>" type="text" name="destLong" id="destLong"></td>
                                    <td><input class="form-control" value="<?php echo $i['dest_tags']; ?>" type="text" name="destTags" id="destTags"></td>
                                    <td>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-info" name="editTour">Edit</button>
                                        </div>
                                    </td>
                                <?php
                                    }
                                ?>
                            </form>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered addTourTable" id="addTourTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Starting Price</th>
                            <th>Best Season</th>
                            <th>Image</th>
                            <th>Map iframe</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form method="POST" action="./include/reg-form-handling.php" enctype="multipart/form-data">
                                <td><input class="form-control" type="text" name="destName" id="destName"></td>
                                <td><input class="form-control" type="text" name="destDesc" id="destDesc"></td>
                                <td><input class="form-control" type="text" name="destAdd" id="destAdd"></td>
                                <td><input class="form-control" type="text" name="destCity" id="destCity"></td>
                                <td><input class="form-control" type="text" name="destPrice" id="destPrice"></td>
                                <td><input class="form-control" type="text" name="destSeason" id="destSeason"></td>
                                <td>

                                    <input class="form-control-pass" type="file" name="destImageUpl" id="destImageUpl">
                                    <label for="destImageUpl">Choose Image</label>
                                </td>
                                <td><input class="form-control" type="url" name="destMap" id="destMap"></td>
                                <td><input class="form-control" type="text" name="destLat" id="destLat"></td>
                                <td><input class="form-control" type="text" name="destLong" id="destLong"></td>
                                <td><input class="form-control" type="text" name="destTags" id="destTags"></td>
                                <td>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-info" name="addTour">Add</button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- users -->
    <div class="container-lg" id="user">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>User <b>Details</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Tags</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userdata as $i) { ?>
                            <tr>
                                <td><?php echo $i['user_fname']; ?></td>
                                <td><?php echo $i['user_lname']; ?></td>
                                <td><?php echo $i['user_contact']; ?></td>
                                <td><?php echo $i['user_email']; ?></td>
                                <td class="pass"><?php echo $i['user_pass']; ?></td>
                                <td><?php echo $i['user_tags']; ?></td>
                                <td>
                                    <a href="./include/reg-form-handling.php?deleteuser=<?php echo $i['user_id'] ?>" onclick='javascript:return confirm("Are you sure you want to delete this comment?")' class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- feedback -->
    <!-- <div class="container-lg" id="feedback">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Feedbacks</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User First Name</th>
                            <th>Tour</th>
                            <th>Comment</th>
                            <th>Stars</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($reviewdata as $i) { ?>
                            <tr>
                                <td><?php echo $i['user_fname']; ?></td>
                                <td><?php echo $i['dest_name']; ?></td>
                                <td><?php echo $i['review_comment']; ?></td>
                                <td><?php echo $i['review_star']; ?></td>
                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
    <div class="bottom" id="bottom"></div>
</body>

</html>