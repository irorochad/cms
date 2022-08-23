<table class="table table-bordered table-hover">

<thead>
    <tr>
        <th>Id</th>
        <th>Category</th>
        <th>Author</th>
        <th>Post Title</th>
        <th>Staus</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
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
        $postComments = $row['post_content'];
        $postTags = $row['post_tags'];
        $postStatus = $row['post_status'];

        echo "<tr>";
        echo "<td>$postId</td>";
        echo "<td>$post_cat_Id</td>";
        echo "<td>$postAuthor</td>";
        echo "<td>$postTitle</td>";
        echo "<td>$postStatus</td>";
        echo "<td><img src='../images/$postImg' width='60' /></td>";
        echo "<td>$postTags</td>";
        echo "<td>$postComments</td>";
        echo "<td>$postDate </td>";
        echo "</tr>";
    }
    ?>
    <!-- <tr>
        <td>1</td>
        <td>iroro</td>
        <td>What is Binance</td>
        <td>Exchanges</td>
        <td>Approved</td>
        <td>Image</td>
        <td>cryptos</td>
        <td>5</td>
        <td>22/33/3</td>
    </tr> -->
</tbody>
</table>