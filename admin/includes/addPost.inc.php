<?php

if (isset($_POST['postBtn'])) {
    $post_cat_Id = $_POST['post_category'];
    $postTitle = $_POST['post_title'];
    $postAuthor = $_POST['post_author'];
    $postStatus = $_POST['post_status'];
    $postTags = $_POST['post_tags'];
    $postContents = $_POST['post_content'];
    $postCommentsCounts = 4;

    $postImage = $_FILES['post_img']['name'];
    $post_img_temp = $_FILES['post_img']['tmp_name'];

    $postDate = date('d-m-y');

    move_uploaded_file($post_img_temp, "../images/$postImage");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_counts, post_status) ";
    $query .= "VALUES ({$post_cat_Id}, '{$postTitle}', '{$postAuthor}', now(), '{$postImage}', '{$postContents}', '{$postTags}', '{$postCommentsCounts}', '{$postStatus}')";

    $insertQuery = mysqli_query($db_Connection, $query);

    if(!$insertQuery) {
        die("Query Failed." .mysqli_error($db_Connection));

    }
}


?>



<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="PostTitle">Post Title</label>
        <input type="text" class="form-control" placeholder="Post title" name="post_title">
    </div>
    <div class="form-group">
        <select name="post_category" id="post_category">
            <?php
            $query = "SELECT * FROM categories";
            $get_all_cats = mysqli_query($db_Connection, $query);

            while ($row = mysqli_fetch_assoc($get_all_cats)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value='{$cat_id}'>$cat_title</option>";
            }
            ?>
        </select>

    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="postStatus">Post Staus</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="postImg">Post Image</label>
        <input type="file" class="form-control" name="post_img">
    </div>
    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" rows="5" name="post_content"></textarea>
    </div>

    <button type="submit" name="postBtn" class="btn btn-primary">Submit</button>
</form>