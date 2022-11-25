<?php
session_start();
require_once '../data_base/env.php';
$id = $_GET['id'];
$Query = "DELETE FROM blog_posts WHERE id = $id";
$deleteQuery = mysqli_query($connection, $Query);
if($deleteQuery){
    $_SESSION['delete_notificaton'] = 'Your selceted post was delete.';
    header('Location: ../all_posts.php');
}


?>