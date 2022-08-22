<?php
include "includes/header.inc.php";
include "includes/functions.inc.php";
?>


<body>

    <!-- Navigation -->
    <?php include "includes/navigation.inc.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Search Result Page
                </h1>



                <?php

                if (isset($_POST['submitBTN'])) {
                    $searchData = $_POST['search-data'];
                    searchFunc();
                }

                ?>



                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/blogSide.inc.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php
        include "includes/footer.inc.php";
        ?>