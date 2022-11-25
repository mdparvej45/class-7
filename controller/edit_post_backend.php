<?php
session_start();
require_once '../data_base/env.php';
$id = $_GET['id'];
//All requested
$request = $_POST;
$title = $request['title'];
$detiles = $request['detiles'];
if(isset($request['save_changed'])){
    $errors = [];
    if(empty($title)){
        $errors['title'] = 'Your title is empty';
    }elseif(strlen($title) > 15){
        $errors['title'] = 'Your title must be 15 chart.';
    }if(empty($detiles)){
        $errors['detiles'] = 'Your detiles is empty';
    }elseif(strlen($detiles) < 25){
        $errors['detiles'] = 'Your detiles must be more then 25 chart.';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header("Location: ../edit_post.php?id=$id");
    }else{
        $query = "UPDATE blog_posts SET title='$title',detiles='$detiles' WHERE id = $id";
        $updateQuery = mysqli_query($connection, $query);
        $_SESSION['update_notificaton'] = 'Okay Fine! Your post successfully changed';
        header('Location: ../all_posts.php');
    }
}


?>