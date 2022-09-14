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

                if (isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                }

                $query = "SELECT * FROM posts WHERE post_id = $the_post_id";

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
                    <img class="img-responsive" <?php echo "src='./images/$post_image'"; ?> alt="">
                    <hr>
                    <p><?php echo $post_contnet; ?></p>
                    <a class="btn btn-primary " href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php
                } ?>

                <!-- Comments Form -->
                <?php
                if (isset($_POST['postComment'])) {
                    $the_post_id = $_GET['p_id'];
                    $commentAuthor = mysqli_real_escape_string($db_Connection, $_POST['comment_author']);
                    $commentEmail = mysqli_real_escape_string($db_Connection, $_POST['comment_email']);
                    $commentContent = mysqli_real_escape_string($db_Connection, $_POST['comment_content']);

                    $query = "INSERT INTO `comments` (comment_post_id, comment_author, comment_content, comment_status, comment_email,	comment_date) ";
                    $query .= "VALUES($the_post_id, '{$commentAuthor}', '{$commentContent}', 'pending', '{$commentEmail}', now() )";

                    $postComment = mysqli_query($db_Connection, $query);
                    if ($postComment) {
                        echo "Your comment as been sent is now pending approval";
                    } else {
                        die("Hehe - something went wrong, please try again");
                    }
                    // Increament post comment counts +1 each time a new comment is added!

                    $increamentcommentsquery = "UPDATE posts SET post_comment_counts = post_comment_counts + 1 ";
                    $increamentcommentsquery .= "WHERE post_id = $the_post_id ";

                    $sendIncreamentQuery = mysqli_query($db_Connection, $increamentcommentsquery);
                }

                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" name="comment_author"></input>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="comment_email"></input>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment *</label>
                            <textarea class="form-control" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="postComment" class="btn btn-primary">Post</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id AND comment_status = 'approved' ORDER BY comment_id DESC ";
                $fetch_comments_query = mysqli_query($db_Connection, $query);
                $comment_counts = mysqli_num_rows($fetch_comments_query);

                if ($comment_counts <= 0) {
                    echo "No comments yet, be the first to add a comment.";
                } else {
                    while ($row = mysqli_fetch_assoc($fetch_comments_query)) {
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                ?>
                        <div class="media">
                            <a class="pull-left">
                                <img class="media-object" src="https://place-hold.it/64x64/000000/ffffff&text=Image%20here%20" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small>A<?php echo $comment_date; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>
                <?php
                    }
                }

                ?>


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