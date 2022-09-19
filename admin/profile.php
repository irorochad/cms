<?php ob_start(); ?>
<?php include "includes/admin_header.inc.php" ?>
<?php include "includes/functions.inc.php" ?>

<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_nav.inc.php" ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Howdy, Admin
                        <small>welcome</small>
                    </h1>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_name">Username</label>
                            <input type="text" <?php ?> class="form-control" name="user_name">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" <?php ?> class="form-control" name="user_email">
                        </div>

                        <div class="form-group">
                            <label for="First Name">First Name</label>
                            <input type="text" <?php  ?> class="form-control" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="postImg">Last Name</label>
                            <input type="text" <?php ?> class="form-control" name="last_name">
                        </div>

                        <div class="form-group">
                            <label for="user_password">password</label>
                            <input type="password" <?php  ?> class="form-control" name="user_password">
                        </div>
                        <div class="form-group">
                            <select name="userRole">
                                <?php echo "<option>$userRole</option>";
                                if ($userRole == 'admin') {
                                    echo "<option value='subscriber' >subscriber</option>";
                                } else {
                                    echo "<option value='admin'>admin</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="editUser" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>