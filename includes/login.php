<?php ob_start();
session_start(); ?>

<?php include "db.inc.php" ?>


<?php

if (isset($_POST['loginBtn'])) {
    $username = mysqli_real_escape_string($db_Connection, $_POST['username']);
    $password = mysqli_real_escape_string($db_Connection, $_POST['userPassword']);

    $query = "SELECT * FROM users where username = '{$username}'";
    $fetchUsers = mysqli_query($db_Connection, $query);

    while ($row = mysqli_fetch_array($fetchUsers)) {
        $user_id = $row['id'];
        $user_name = $row['username'];
        $user_password = $row['password'];
        $user_firstname = $row['first_name'];
        $user_lastname = $row['last_name'];
        $user_email = $row['email'];
        $user_role = $row['user_role'];
    }

    if ($username === $user_name && $password === $user_password) {

        $_SESSION['username'] = $user_name;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['userRole'] = $user_role;

        header("Location: ../admin");
    } else {
        header("Location: ..index.php");
    }
}

?>