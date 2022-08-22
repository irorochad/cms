<?php

function InsertCategory()
{
    global $db_Connection;
    $query = "SELECT * FROM categories";
    $get_all_cats = mysqli_query($db_Connection, $query);



    if (isset($_POST['addCatBtn'])) {
        $addToCats = $_POST['catNameInput'];

        if ($addToCats == '' || empty($addToCats)) {
            echo "<h3> Please type in a cats </h3> ";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE('$addToCats')";
            $addToCats_query = mysqli_query($db_Connection, $query);

            if (!$addToCats_query) {
                die("Unable to add to database. ");
            } else {
                echo "<h3> Category was added </h3>";
            }
        }
    }
}

function findAllCategory()
{
    global $db_Connection;
    $query = "SELECT * FROM categories";
    $get_all_cats = mysqli_query($db_Connection, $query);

    while ($row = mysqli_fetch_assoc($get_all_cats)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?deletecats={$cat_id}'>Delete</a> 
        <a href='categories.php?editcats={$cat_id}'>Edit</a>
        </td>";
        echo "</tr>";
    }
}

function deletecats()
{
    global $db_Connection;
    global $the_cat_id;
    $query = "DELETE FROM categories WHERE cat_id = $the_cat_id ";
    $query_delete_cats = mysqli_query($db_Connection, $query);
    header("Location: categories.php");
}
