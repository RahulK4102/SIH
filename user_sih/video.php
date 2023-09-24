<?php
include 'database.php';
$video = new Database();
$category_id = $_GET['display_subject_id'];
$result = $video->display1('video','category_id ='.$category_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIH</title>
    <link rel="stylesheet" href="sih1.css">
</head>

<body>
    <nav>
        <ul>
            <li class="nav"><a href="index.php">Home</a></li>
            <li class="nav"><a href="#">Category</a></li>
            <li class="nav"><a href="Contact.html">Contact Us</a></li>
            <li class="nav"><a href="#">downloads</a></li>
        </ul>
    </nav>
    <div class="category">
        <h2>AVAILABLE VIDEOS</h2>
    </div>
    <div class="classes">
    <?php
        if($result){
        foreach($result as $row){
            ?>
        <div class="card_">
            <a href="#">
                <div class="circle">
                    <h2><?php echo $row['video_name']; ?></h2>
                </div>
            </a>
            <div class="content">
                <?php
                $video_links =$row['video_link'];
                $final = str_replace('watch?v=', 'embed/',$video_links);
                   echo "<iframe src='$final' frameborder='0' allow = 'autoplay; encrypted-media' allowfullscreen ></iframe>";
                ?>
            </div>
        </div>
        <?php } }else{
            echo "not found";
        } ?>
    </div>
</body>

</html>