<?php
include 'database.php';
$video = new Database();
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $video_name = $_POST['video_name'];
    $video_link = $_POST['video_link'];
    $video_id = $_POST['video_id'];
    
    $video->insert('video',['category_id'=>$category_id,'video_name'=>$video_name,'video_link'=>$video_link , 'video_id'=>$video_id] );
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/video_display.php');
}
if (isset($_POST['update'])) {
    $video_id = $_GET['update_video_id'];
    $category_id = $_POST['category_id'];
    $video_name = $_POST['video_name'];
    $video_link = $_POST['video_link'];
    $video->update('video', ['video_id' => $video_id, 'category_id' => $category_id, 'video_name'=>$video_name, 'video_link'=>$video_link], 'video_id =' . $video_id);
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/video_display.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Info</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" >
            <div class="inputbox">
                <input type="quantity" name="category_id">
                <label for="">Category Id</label>
            </div>
            <div class="inputbox">
                <input type="name" name="video_name">
                <label for="">Video Name</label>
            </div>
            <div class="inputbox">
                <input type="url" name="video_link">
                <label for="">Video Link</label>
            </div>
            <div class="inputbox">
                <input type="quantity" name="video_id">
                <label for="">Video Id</label>
            </div>
            <button name="submit" >SUBMIT</button>
            <button name="update">UPDATE</button>
        </form>
    </div>
</body>
</html>