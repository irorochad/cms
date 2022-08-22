<?php
include "includes/header.inc.php";
?>


<body>

    <!-- Navigation -->
    <?php include "includes/navigation.inc.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php
                $query = "SELECT * FROM posts";

                $fetch_all_posts_data = mysqli_query($db_Connection, $query);

                while ($row = mysqli_fetch_assoc($fetch_all_posts_data)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_contnet = $row['post_content'];
                    $post_tags = $row['post_tags'];


                ?>


                    <!--  Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="https://placehold.co/900x300" alt="">
                    <hr>
                    <p><?php echo $post_contnet; ?></p>
                    <a class="btn btn-primary " href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php
                } ?>



                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/blogSide.inc.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php
        include "includes/footer.inc.php";
        ?>