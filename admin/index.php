<?php ob_start();
session_start(); ?>
<?php include "includes/admin_header.inc.php" ?>


<?php

if (!isset($_SESSION['userRole'])) {
    header("Location: ../index.php");
}


?>




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
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM posts";
                                    $querySelect = mysqli_query($db_Connection, $query);
                                    $post_counts = mysqli_num_rows($querySelect);

                                    echo "<div class='huge'>$post_counts</div>";
                                    echo "<div>Posts</div>";

                                    ?>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $querySelect_comments = mysqli_query($db_Connection, $query);
                                    $comments_counts = mysqli_num_rows($querySelect_comments);

                                    echo "<div class='huge'>$comments_counts</div>";
                                    echo "<div>Comments</div>";

                                    ?>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $query = "SELECT * FROM users";
                                    $querySelect_users = mysqli_query($db_Connection, $query);
                                    $users_counts = mysqli_num_rows($querySelect_users);

                                    echo "<div class='huge'>$users_counts</div>";
                                    echo "<div>Users</div>";

                                    ?>

                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $querySelect_category = mysqli_query($db_Connection, $query);
                                    $category_counts = mysqli_num_rows($querySelect_category);

                                    echo "<div class='huge'>$category_counts</div>";
                                    echo "<div>Categories</div>";

                                    ?>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Chart Row -->
            <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Posts', 'Users', 'Categories'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250]
        ]);

        var options = {
          chart: {
            title: 'Blog Performance',
            subtitle: 'Num. of users, posts, and categories',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
     <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
            <!-- End Chart Row -->
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