<?php
include 'database.php';
$class = new Database();
$result = $class->display('class');
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
        <h2>Select Desired Class</h2>
    </div>
    <div class="classes">
    <?php
        if($result){
        foreach($result as $row){
            ?>
        <div class="card">
            <a  href="Subjects.php ?display_class_id=<?php echo $row['class_id'];  ?>">
                <div class="circle">
                    <h2><?php echo $row['class_name']; ?></h2>
                </div>
                <div class="content">
                    <img src="https://th.bing.com/th/id/OIP.FzNvoWJ4D9lN01aWy2krXgHaFj?pid=ImgDet&rs=1" alt=""
                        srcset="">
                </div>
            </a>
        </div>
        <?php } } ?>
    </div>
</body>

</html>