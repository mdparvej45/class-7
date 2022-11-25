<?php
require_once '../data_base/env.php';
$id = $_GET['id'];
$status = $_GET['status'];
if($status == '1'){
    $Query = "UPDATE blog_posts SET status='0' WHERE id = $id";
    $updateQuery = mysqli_query($connection, $Query);
    header('Location: ../all_posts.php');
}else{
    $query = "UPDATE blog_posts SET status='1' WHERE id = $id";
    $updateQuery = mysqli_query($connection, $query);
    header('Location: ../all_posts.php');
}


?>