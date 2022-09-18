<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Reg Date</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM users ";
        $query_to_fetch_users = mysqli_query($db_Connection, $query);

        while ($row = mysqli_fetch_assoc($query_to_fetch_users)) {
            $id = $row['id'];
            $userName = $row['username'];
            $firstName = $row['first_name'];
            $lastName= $row['last_name'];
            $email = $row['email'];
            $userRole= $row['user_role'];

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$userName</td>";
            echo "<td>$firstName </td>";
            echo "<td>$lastName</td>";
            echo "<td>$email</td>";
            echo "<td>$userRole </td>";
            echo "<td>Today's date</td>";

            

            // echo "<td><a href='users.php?admin=$id'>Make Admin</a> </td>";
            // echo "<td><a href='users.php?subscriber=$id'>Make Sub</a> </td>";
            echo "<td><a href='users.php?source=edit_user&id=$id'>Edit</a> </td>";
            echo "<td><a href='users.php?delete=$id'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <!-- Actions to approve, unapprove, and delete comment here -->
        <?php
        // if (isset($_GET['admin'])) {
        //     $the_user_id = $_GET['admin'];

        //     $query = "UPDATE users SET user_role = 'admin' WHERE id = $the_user_id ";
        //     $query_admin_users = mysqli_query($db_Connection, $query);
        //     header("Location: users.php");
        // }

        // if (isset($_GET['subscriber'])) {
        //     $the_user_id = $_GET['subscriber'];

        //     $query = "UPDATE users SET user_role = 'subscriber' WHERE id = $the_user_id ";
        //     $query_admin_users = mysqli_query($db_Connection, $query);
        //     header("Location: users.php");
        // }

        if (isset($_GET['delete'])) {
            $the_user_id= $_GET['delete'];

            $query = "DELETE FROM users WHERE id = $the_user_id ";
            $query_delete_user = mysqli_query($db_Connection, $query);
            header("Location: users.php");
        }
        ?>
    </tbody>
</table>