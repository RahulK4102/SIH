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


$classes1 = $category->display('class');
foreach ($classes1 as $row) {
}
if (isset($_GET['update_category_id'])) {

    $update_category_id = $_GET['update_category_id'];
    $classes = $category->display1('category', 'category_id =' . $update_category_id);

    if ($classes !== false) {
        foreach ($classes as $row) {
            $class_id_1 =  $row['class_id'];
        }
        $classes2 = $category->display1('class', 'class_id = ' . $class_id_1);
        foreach ($classes2 as $row) {
        }
    } else {
        echo "Error fetching data from the database.";
    }
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
                <thead class="thead-dark">
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
                                <?php
                                if (isset($_GET['update_category_id'])) {
                                    $update_category_id = $_GET['update_category_id'];
                                ?>
                                    <input type="quantity" name="category_id" value=<?php
                                                                                    echo $update_category_id;
                                                                                    ?>>
                                <?php
                                } else {
                                ?>
                                    <input type="quantity" name="category_id">
                                <?php
                                }
                                ?>
                            </div>
                        </th>
                        <td>
                            <?php
                            if (isset($_GET['update_category_id'])) {
                            ?>
                                <div class="inputbox">
                                    <label for="">Class Id</label>
                                    <select name="class_id">
                                        <?php
                                        foreach ($classes as $row) {
                                        ?>
                                            <option value="<?php echo $row['class_id'];
                                                        } ?> "> <?php foreach ($classes2 as $row) {
                                                                                                    echo $row['class_name']; ?></option>
                                        <?php
                                                                                                }
                                                                                            } else {
                                        ?>
                                    </select>
                                </div>
                                <div class="inputbox">
                                    <label for="">Class Id</label>
                                    <select name="class_id">
                                        <?php
                                                                                                foreach ($classes1 as $row) {
                                        ?>
                                            <option value="<?php echo $row['class_id']; ?> "> <?php echo $row['class_name']; ?></option>
                                        <?php
                                                                                                }
                                        ?>
                                    </select>
                                </div>
                            <?php
                                                                                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_GET['update_category_id'])) {
                            ?>
                                <div class="inputbox">
                                    <input type="name" name="category_name" value=<?php foreach ($classes as $row) {
                                                                                      echo $row['category_name'];
                                                                                    } ?>>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="inputbox">
                                    <input type="name" name="category_name">
                                </div>
                            <?php
                            }
                            ?>
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