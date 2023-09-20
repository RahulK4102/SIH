<?php
include 'database.php';
$class = new Database();
if (isset($_POST['submit'])) {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    
    $class->insert('class',['class_id'=>$class_id,'class_name'=>$class_name] );
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/sih/class_display.php');
}
if (isset($_POST['update'])) {
    $class_id = $_GET['update_class_id'];
    $class_name = $_POST['class_name'];
    $class->update('class', ['class_id' => $class_id, 'class_name' => $class_name],'class_id = '.$class_id);
    echo '<script>alert("updated Succesfully ")</script>';
    header('location:/sih/class_display.php');
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Info</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" >
            <div class="inputbox">
                <input type="quantity" name="class_id">
                <label for="">Class Id</label>
            </div>
            <div class="inputbox">
                <input type="name" name="class_name">
                <label for="">Class Name</label>
            </div>
            <button name="submit" >Submit</button>
            <button name="update">UPDATE</button>
        </form>
    </div>
</body>
</html>