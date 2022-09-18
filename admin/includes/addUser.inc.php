<?php

if (isset($_POST['addUserBTN'])) {
    $userName = mysqli_real_escape_string($db_Connection, $_POST['user_name']);
    $userEmail = mysqli_real_escape_string($db_Connection, $_POST['user_email']);
    $firstName = mysqli_real_escape_string($db_Connection, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($db_Connection, $_POST['last_name']);
    $password = mysqli_real_escape_string($db_Connection, $_POST['user_password']);
    $userRole = mysqli_real_escape_string($db_Connection, $_POST['userRole']);

    
    // $postCommentsCounts = 4;

    // $postImage = $_FILES['post_img']['name'];
    // $post_img_temp = $_FILES['post_img']['tmp_name'];

    // $postDate = date('d-m-y');

    // move_uploaded_file($post_img_temp, "../images/$postImage");

    $query = "INSERT INTO users(`username`, `password`, `first_name`, `last_name`, `email`, `user_role`, `image`, `randSalt`) ";
    $query .= "VALUES ('{$userName}', '{$password}', '{$firstName}', '{$lastName}', '{$userEmail}', '{$userRole}', 'someimglink', 'somerandom' )";

    $insertUsersQuery = mysqli_query($db_Connection, $query);

    if (!$insertUsersQuery) {
        die("Query Failed." . mysqli_error($db_Connection));
    }
}


?>



<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" required class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="First Name">First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>
    <div class="form-group">
        <label for="postImg">Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>

    <div class="form-group">
        <label for="user_password">password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">

        <select name="userRole">
            <option>subscriber</option>
            <option>admin</option>
        </select>
    </div>

    <button type="submit" name="addUserBTN" class="btn btn-primary">Add User</button>
</form>