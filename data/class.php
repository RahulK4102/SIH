<?php
include 'database.php';
$class = new Database();
if (isset($_POST['submit'])) {
    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];

    $class->insert('class', ['class_id' => $class_id, 'class_name' => $class_name]);
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/class_display.php');
}
if (isset($_POST['update'])) {
    $class_id = $_GET['update_class_id'];
    $class_name = $_POST['class_name'];
    $class->update('class', ['class_id' => $class_id, 'class_name' => $class_name], 'class_id = ' . $class_id);
    echo '<script>alert("updated Succesfully ")</script>';
    header('location:/SIH1/class_display.php');
}
if (isset($_GET['update_class_id'])) {

    $update_class_id = $_GET['update_class_id'];
    $classes = $class->display1('class', 'class_id =' . $update_class_id);

    if ($classes !== false) {
        foreach ($classes as $row) {
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
    <title>Class Info</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Class Id</th>
                        <th scope="col">Class Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <div class="inputbox">
                                <?php
                                if (isset($_GET['update_class_id'])) {
                                    $update_class_id = $_GET['update_class_id'];
                                ?>
                                    <input type="quantity" name="class_id" value=<?php echo $update_class_id; ?>>
                                    <label for="">Class Id</label>
                                <?php
                                } else {
                                ?>
                                    <input type="quantity" name="class_id">
                                    <label for="">Class Id</label>
                                <?php
                                }
                                ?>
                            </div>
                        </th>
                        <td>
                            <div class="inputbox">
                                <?php
                                if (isset($_GET['update_class_id'])) {
                                    $update_class_id = $_GET['update_class_id'];
                                ?>
                                    <input type="name" name="class_name" value=<?php foreach ($classes as $row) {
                                                                                    echo $row['class_name'];
                                                                                } ?>>
                                    <label for="">Class Name</label>
                                <?php
                                } else {
                                ?>
                                    <input type="quantity" name="class_name">
                                    <label for="">Class Name</label>
                            </div>
                        <?php
                                }
                        ?>
                        </td>

                    </tr>
                </tbody>
            </table>
            <!-- <div class="inputbox">
                <input type="quantity" name="class_id">
                <label for="">Class Id</label>
            </div>
            <div class="inputbox">
                <input type="name" name="class_name">
                <label for="">Class Name</label>
            </div> -->
            <button name="submit" class="btn btn-primary">Submit</button>
            <button name="update" class="btn btn-primary">UPDATE</button>
        </form>
    </div>
</body>

</html>