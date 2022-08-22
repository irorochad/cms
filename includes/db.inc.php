<?php 

$db_Connection = mysqli_connect("localhost", "root", "", "cms");


if(!$db_Connection){
    die("Unable to connect!");
}