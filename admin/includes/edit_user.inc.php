<?php

if (isset($_GET['id'])) {
    $the_user_id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = $the_user_id ";
    $edit_user = mysqli_query($db_Connection, $query);

    while ($row = mysqli_fetch_assoc($edit_user)) {
        $userName = $row['username'];
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $password = $row['password'];
        $userRole = $row['user_role'];
    }

    if (isset($_POST['editUser'])) {
        $userName = mysqli_real_escape_string($db_Connection, $_POST['user_name']);
        $userEmail = mysqli_real_escape_string($db_Connection, $_POST['user_email']);
        $firstName = mysqli_real_escape_string($db_Connection, $_POST['first_name']);
        $lastName = mysqli_real_escape_string($db_Connection, $_POST['last_name']);
        $password = mysqli_real_escape_string($db_Connection, $_POST['user_password']);
        $userRole = mysqli_real_escape_string($db_Connection, $_POST['userRole']);

       

        $query = "UPDATE users SET ";
        $query .= "username = '{$userName}', ";
        $query .= "password = '{$password}', ";
        $query .= "first_name = '{$firstName}', ";
        $query .= "last_name = '{$lastName}', ";
        $query .= "email = '{$userEmail}', ";
        $query .= "user_role = '{$userRole}', ";
        $query .= "image = 'imagelink', ";
        $query .= "randSalt =  'hashedpass' ";
        $query .= "WHERE id = {$the_user_id} ";

        $updateuser = mysqli_query($db_Connection, $query);
        if (!$updateuser) {
            die("Unable to update, please check your errors." . mysqli_error($db_Connection));
        }
    }
}
?>



<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" <?php echo "value='$userName'";?> class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" <?php echo "value='$email'";?> class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="First Name">First Name</label>
        <input type="text" <?php echo "value='$firstName'";?> class="form-control" name="first_name">
    </div>
    <div class="form-group">
        <label for="postImg">Last Name</label>
        <input type="text" <?php echo "value='$lastName'";?> class="form-control" name="last_name">
    </div>

    <div class="form-group">
        <label for="user_password">password</label>
        <input type="password" <?php echo "value='$password'";?> class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <select name="userRole">
            <?php echo "<option>$userRole</option>";
            if($userRole == 'admin') {
                echo "<option value='subscriber' >subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="editUser" class="btn btn-primary">Update User</button>
</form>