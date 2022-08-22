<form action="" method="POST">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>
        <?php

        if (isset($_GET['editcats'])) {
            $the_cat_id = $_GET['editcats'];

            $query = "SELECT * FROM categories WHERE cat_id = $the_cat_id";
            $get_all_cats_ID = mysqli_query($db_Connection, $query);

            while ($row = mysqli_fetch_assoc($get_all_cats_ID)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
        ?>
                <input type="text" value="<?php if (isset($cat_title)) {
                                                echo $cat_title;
                                            } ?>" class="form-control" name="catNameInput">
        <?php }
        } ?>
        <?php

        if (isset($_POST['editCatBtn'])) {
            $the_cat_title = $_POST['catNameInput'];

            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = $cat_id ";
            $query_edit_cats = mysqli_query($db_Connection, $query);

            header("Location: categories.php");
        }

        ?>

    </div>
    <div class="form-group">
        <input type="submit" name="editCatBtn" value="Update" class="btn btn-primary">
    </div>
</form>