<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Email</th>
            <th>In Response to</th>
            <th>Approved</th>
            <th>UnApproved</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM comments ORDER BY comment_id DESC ";
        $query_to_Fetch_datas = mysqli_query($db_Connection, $query);

        while ($row = mysqli_fetch_assoc($query_to_Fetch_datas)) {
            $commentId = $row['comment_id'];
            $comment_post_Id = $row['comment_post_id'];
            $commentAuthor = $row['comment_author'];
            $commnetContent= $row['comment_content'];
            $commnetStatus = $row['comment_status'];
            $commentEmail= $row['comment_email'];
            $commentDate = $row['comment_date'];

            echo "<tr>";
            echo "<td>$commentId</td>";
            echo "<td>$commentAuthor</td>";
            echo "<td>$commnetContent </td>";
            echo "<td>$commnetStatus</td>";
            echo "<td>$commentEmail </td>";

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_Id ";
            $find_related_post = mysqli_query($db_Connection, $query);

            while ($row = mysqli_fetch_assoc($find_related_post)) {
                $cat_id = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<td><a target='_blank' href='../post.php?p_id=$cat_id'>$post_title</a></td>";
            }
            

            echo "<td><a href='comments.php?approve={$commentId}'>Approve</a> </td>";
            echo "<td><a href='comments.php?unapprove={$commentId}'>UnApprove</a></td>";
            echo "<td>$commentDate </td>";
            echo "<td><a href='comments.php?delete={$commentId}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <!-- Actions to approve, unapprove, and delete comment here -->
        <?php
        if (isset($_GET['approve'])) {
            $the_comment_id = $_GET['approve'];

            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
            $query_approve_comment = mysqli_query($db_Connection, $query);
            header("Location: comments.php");
        }

        if (isset($_GET['unapprove'])) {
            $the_comment_id = $_GET['unapprove'];

            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
            $query_unapprove_comment = mysqli_query($db_Connection, $query);
            header("Location: comments.php");
        }

        if (isset($_GET['delete'])) {
            $the_comment_id = $_GET['delete'];

            $query = "DELETE FROM comments WHERE comment_id = $the_comment_id ";
            $query_delete_comment = mysqli_query($db_Connection, $query);
            header("Location: comments.php");
        }
        ?>
    </tbody>
</table>