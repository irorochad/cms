<?php

if (isset($_POST['postBtn'])) {
    $postTitle = $_POST['post_title'];
    $post_cat_Id = $_POST['post_category_id'];
    $postAuthor = $_POST['post_author'];
    $postStatus = $_POST['post_status'];
    $postTags = $_POST['post_tags'];
    $postComments = $_POST['post_content'];

    $postImage = $_FILES['post_img']['name'];
    $post_img_temp = $_FILES['post_img']['tmp_name'];

    $postDate = date('d-m-y');

    move_uploaded_file($post_img_temp, "../images/$postImage");
}


?>



<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="PostTitle">Post Title</label>
        <input type="text" class="form-control" placeholder="Post title" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_Cat_id">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id">
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