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
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Category Info</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-dark" >
                    <tr>
                        <th scope="col">Category Id</th>
                        <th scope="col">Class Id</th>
                        <th scope="col">Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <div class="inputbox">
                                <input type="name" name="category_id">
                            </div>
                        </th>
                        <td>
                            <div class="inputbox">
                                <label for="">Class Id</label>
                                <select name="class_id">
                                    <?php
                                    foreach ($classes as $row) {
                                    ?>
                                        <option value="<?php echo $row['class_id']; ?> "> <?php echo $row['class_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="inputbox">
                                <input type="name" name="category_name">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="inputbox">
                <input type="name" name="category_id">
                <label for="">Category Id</label>
            </div>
            <div class="inputbox">
                <label for="">Class Id</label>
                <select name="class_id">
                    <?php
                    foreach ($classes as $row) {
                    ?>
                        <option value="<?php echo $row['class_id']; ?> "> <?php echo $row['class_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="inputbox">
                <input type="name" name="category_name">
                <label for="">Category Name</label>
            </div> -->
            <button name="submit" class="btn btn-primary">SUBMIT</button>
            <button name="update" class="btn btn-primary">UPDATE</button>
        </form>
    </div>
</body>

</html>