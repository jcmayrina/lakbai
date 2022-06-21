<?php
session_start();
require_once('admin-db.php');

$data = new admin();
$userdata = $data->viewUsers();
$tourdata = $data->viewTours();
$reviewdata = $data->viewReviews();
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
    <link rel="stylesheet" href="/css/admin.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="/js/admin.js"></script>
</head>

<body>
    <div class="navmain">
        <ul class="navlink">
            <li class="showtour">Tours</li>
            <li class="showuser">Users</li>
            <li class="showfeed">Feedbacks</li>
            <li>Logout</li>
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
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
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
                                <td><?php echo $i['dest_desc']; ?></td>
                                <td><?php echo $i['dest_add']; ?></td>
                                <td><?php echo $i['dest_stprice']; ?></td>
                                <td><?php echo $i['dest_season']; ?></td>
                                <td><?php echo $i['dest_image']; ?></td>
                                <td class="maps"><?php echo $i['dest_map']; ?></td>
                                <td><?php echo $i['dest_lat']; ?></td>
                                <td><?php echo $i['dest_long']; ?></td>
                                <td><?php echo $i['dest_tags']; ?></td>
                                <td>
                                    <a href="admin-db.php?edit=<?php echo $i['dest_id'] ?>" class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="/include/reg-form-handling.php?deletetour=<?php echo $i['dest_id'] ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
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
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
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
    </div>

    <!-- feedback -->
    <div class="container-lg" id="feedback">
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
    </div>

</body>

</html>