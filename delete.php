<?php
include './data/database.php';

if (isset($_GET['delete_class_id'])) {
    $class = new Database();
    $class_id = $_GET['delete_class_id'];
    $class->delete('class','class_id ='.$class_id);
    echo '<script>alert("Deleted Succesfully ")</script>';
    header('location:class_display.php');
}
if (isset($_GET['delete_category_id'])) {
    $category = new Database();
    $category_id = $_GET['delete_category_id'];
    $category->delete('category','category_id ='.$category_id);
    echo '<script>alert("Deleted Succesfully ")</script>';
    header('location:category_display.php');
}
if (isset($_GET['delete_video_id'])) {
    $video = new Database();
    $video_id = $_GET['delete_video_id'];
    $video->delete('video','video_id ='.$video_id);
    echo '<script>alert("Deleted Succesfully ")</script>';
    header('location:video_display.php');
}
?>