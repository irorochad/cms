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
                        <small>Categories Page</small>
                    </h1>

                    <?php
                    InsertCategory();
                    // Insert Data Into Form.
                    // End Insert Data inot Form
                    ?>

                    <div class="col-xs-6">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="catNameInput">
                            </div>
                            <div class="form-group">

                                <input type="submit" name="addCatBtn" value="Add Category" class="btn btn-primary">
                            </div>
                        </form>
                    </div> <!-- End Table Rows -->

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Names</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    findAllCategory();
                                    ?>
                                    <!-- <td>PHP</td> -->


                                </tr>
                                <?php
                                if (isset($_GET['deletecats'])) {
                                    $the_cat_id = $_GET['deletecats'];

                                    deleteCats();
                                }

                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-xs-6">
                        <?php
                        if (isset($_GET['editcats'])) {
                            $cat_id = $_GET['editcats'];
                            include "includes/category_edit.inc.php";
                        }
                        ?>
                    </div> <!-- End Edit Form-->

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