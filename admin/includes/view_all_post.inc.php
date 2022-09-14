<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Author</th>
            <th>Post Title</th>
            <th>Staus</th>
            <th>Num. of Comments</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Posts</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM posts";
        $query_to_Fetch_datas = mysqli_query($db_Connection, $query);

        while ($row = mysqli_fetch_assoc($query_to_Fetch_datas)) {
            $postId = $row['post_id'];
            $post_cat_Id = $row['post_category_id'];
            $postTitle = $row['post_title'];
            $postAuthor = $row['post_author'];
            $postDate = $row['post_date'];
            $postImg = $row['post_image'];
            $postContents = $row['post_content'];
            $postTags = $row['post_tags'];
            $postStatus = $row['post_status'];
            $postcommentCounts = $row['post_comment_counts'];
            

            echo "<tr>";
            echo "<td>$postId</td>";

            $query = "SELECT * FROM categories WHERE cat_id = $post_cat_Id ";
            $select_All_cats = mysqli_query($db_Connection, $query);

            while ($row = mysqli_fetch_assoc($select_All_cats)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<td>{$cat_title}</td>";
            }

            echo "<td>$postAuthor</td>";
            echo "<td>$postTitle</td>";
            echo "<td>$postStatus</td>";
            echo "<td>$postcommentCounts</td>";
            echo "<td><img src='../images/$postImg' width='60' /></td>";
            echo "<td>$postTags</td>";
            echo "<td>$postContents</td>";
            echo "<td>$postDate </td>";
            echo "<td>  <a href='posts.php?source=edit_post&p_id={$postId}'>Edit</a> <a href='posts.php?delete={$postId}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <!-- Actions to delete posts here -->
        <?php
        if (isset($_GET['delete'])) {
            $the_post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = $the_post_id ";
            $query_delete_posts = mysqli_query($db_Connection, $query);
            header("Location: posts.php");
        }
        ?>
    </tbody>
</table>