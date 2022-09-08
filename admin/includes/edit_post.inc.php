<?php

if (isset($_GET['p_id'])) {
    $the_p_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_p_id ";
$edit_post = mysqli_query($db_Connection, $query);

while ($row = mysqli_fetch_assoc($edit_post)) {
    $postId = $row['post_id'];
    $post_cat_Id = $row['post_category_id'];
    $postTitle = $row['post_title'];
    $postAuthor = $row['post_author'];
    $postDate = $row['post_date'];
    $postImg = $row['post_image'];
    $postContents = $row['post_content'];
    $postTags = $row['post_tags'];
    $postStatus = $row['post_status'];
}

if (isset($_POST['updateBtn'])) {
    $post_cat_Id = $_POST['post_category'];
    $postTitle = $_POST['post_title'];
    $postAuthor = $_POST['post_author'];
    $postStatus = $_POST['post_status'];
    $postTags = $_POST['post_tags'];
    $postContents = $_POST['post_content'];
    $postImage = $_FILES['post_img']['name'];
    $post_img_temp = $_FILES['post_img']['tmp_name'];

    move_uploaded_file($post_img_temp, "../images/$postImage");
    $post_comment_count = 4;
    if(empty($postImage)){
        $query = "SELECT * FROM posts WHERE post_id = $the_p_id ";
        $ImgFinder = mysqli_query($db_Connection, $query);
        while($row = mysqli_fetch_array($ImgFinder)) {
            $postImage = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_category_id = '{$post_cat_Id}', ";
    $query .= "post_title = '{$postTitle}', ";
    $query .= "post_author = '{$postAuthor}', ";
    $query .= "post_date = now(), ";
    $query .= "post_image = '{$postImage}', ";
    $query .= "post_content = '{$postContents}', ";
    $query .= "post_tags = '{$postTags}', ";
    $query .= "post_comment_counts = {$post_comment_count}, ";
    $query .= "post_status =  '{$postStatus}' ";
    $query .= "WHERE post_id = {$the_p_id} ";

    $updatePost = mysqli_query($db_Connection, $query);
    if(!$updatePost) {
        die ("Unable to update, please check your errors." .mysqli_error($db_Connection));
    }

}

?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="PostTitle">Post Title</label>
        <input type="text" value="<?php echo $postTitle; ?>" class="form-control" placeholder="Post title" name="post_title">
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
        <input type="text" value="<?php echo $postAuthor; ?>" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="postStatus">Post Staus</label>
        <input type="text" value="<?php echo $postStatus; ?>" class="form-control" name="post_status">
    </div>
    <div class="form-group">
      <?php echo " <img src='../images/$postImg'>"; ?>
      <input type="file" class="form-control" name="post_img">
      
    </div>
    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input type="text" value="<?php echo $postTags; ?>" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" rows="5" name="post_content"><?php echo $postContents; ?></textarea>
    </div>

    <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
</form>