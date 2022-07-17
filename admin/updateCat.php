<?php include_once('includes/functions.php'); ?>

<?php include_once('includes/header.php'); ?>

<?php

$cat_id = $_GET['update'];
if(isset($_POST['update'])){
    $cat_id = $_GET['update'];
    $cat_title = $_POST['cat_title'];


    updateCategory($cat_id,$cat_title);
    header('location:categories.php');


}


?>