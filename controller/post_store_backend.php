<?php
session_start();
require_once '../data_base/env.php';
if(isset($_POST['submit'])){
    $request = $_POST; //Request
    $title = $request['title'];
    $detiles = $request['detiles'];
    $errors = [];//All error massage
    if(empty($title)){
        $errors['title'] = 'Please input your title';
    }elseif(strlen($title) > 15){
        $errors['title'] = 'Your title must be 15 chart.';
    }if(empty($detiles)){
        $errors['detiles'] = 'Please input your detiles';
    }elseif(strlen($detiles) < 25){
        $errors['detiles'] = 'Your detiles must be more then 25 chart.';
    }if(count($errors) > 0){
        $_SESSION['errors'] = $errors;                                  
        header('Location: ../index.php');//Redirect index/main page 
        $_SESSION['unsuccess_notification'] = 'Something is wrong! Post not Uploaded';
    }else{
        $Query = "INSERT INTO blog_posts(title, detiles) VALUES ('$title','$detiles')";
        $insertQuery = mysqli_query($connection, $Query);//data insert in database 
        if($insertQuery){
            header('Location: ../all_posts.php');//Redirect all posts page 
            $_SESSION['success_notification'] = 'Okay Fine! Your post successfully uploaded';
        }
    }



}

?>