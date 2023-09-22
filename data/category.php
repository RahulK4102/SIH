<?php
include 'database.php';

$category = new Database();

if (isset($_POST['submit'])) {
    $class_id = $_POST['class_id'];
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];

    $category->insert('category', ['class_id' => $class_id, 'category_name' => $category_name, 'category_id' => $category_id]);
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/category_display.php');
}
if (isset($_POST['update'])) {
    $category_id = $_GET['update_category_id'];
    $class_id = $_POST['class_id'];
    $category_name = $_POST['category_name'];
    $category->update('category', ['class_id' => $class_id, 'category_name' => $category_name], 'category_id =' . $category_id);
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/category_display.php');
}

$classes = $category->display('class');
foreach ($classes as $row) {
    echo $row['class_id'];
    echo $row['class_name'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Info</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="inputbox">
                <input type="name" name="category_id">
                <label for="">Category Id</label>
            </div>
            <div class="inputbox">
                <input type="quantity" name="class_id">
                <label for="">Class Id</label>
                <select name="class_id">
                    <?php 
                        foreach ($classes as $row) {
                    ?>
                    <option value ="<?php echo $row['class_id']; ?> "> <?php echo $row['class_id']; ?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="inputbox">
                <input type="name" name="category_name">
                <label for="">Category Name</label>
            </div>
            <button name="submit">SUBMIT</button>
            <button name="update">UPDATE</button>
        </form>
    </div>
</body>

</html>