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
                        <small>VIew All Posts Page</small>
                    </h1>
                    <?php

                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        case 'addPost':
                            include "includes/addPost.inc.php";
                            break;

                        case 'edit_post':
                            include "includes/edit_post.inc.php";
                            break;

                        case 600:
                            echo "Page 6";
                            break;
                        default:
                            include "includes/view_all_post.inc.php";
                            break;
                    }

                    ?>

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