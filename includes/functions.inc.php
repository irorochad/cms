<?php include "db.inc.php";

function searchFunc()
{
    global $db_Connection;
    global $searchData;

    $query = "SELECT * FROM posts WHERE post_content LIKE '%$searchData%' ";
    // $query = "SELECT * FROM posts LIKE '%$searchData%' ";
    $fetch_all_posts_data = mysqli_query($db_Connection, $query);

    if (!$fetch_all_posts_data) {
        die("Can't Connect - please check the erros.");
    }

    $count = mysqli_num_rows($fetch_all_posts_data);
    if ($count == 0) {
        echo "<h2> Couldn't Find Any Data - please try another keyword";
    } else {

        while ($row = mysqli_fetch_assoc($fetch_all_posts_data)) {
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_contnet = $row['post_content'];
            $post_tags = $row['post_tags'];


?>


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
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

<?php
        }
    }
}

?>