<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Class Details</title>
</head>

<body>
    <button type="button" class="btn btn-primary"><a href="./data/class.php" class="text-light">ADD CLASS</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Class Id</th>
                <th scope="col">Class Name</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include './data/database.php';
            $display = new Database();
            $result = $display->display('class');
            if ($result) {
                foreach ($result as $row) {

            ?>
                    <tr>
                        <th scope="row"><a href="selected_display.php ?display_class_id=<?php echo $row['class_id']; ?>" class="text-dark"><?php echo $row['class_id']; ?></a></th>
                        <td><?php echo $row['class_name']; ?></td>
                        <td><?php echo $row['Date_time']; ?></td>
                        <td>
                            <button type="button" name="update" class="btn btn-primary"><a href="./data/class.php ?update_class_id=<?php echo $row['class_id']; ?>" class="text-light">UPDATE</a></button>
                            <button type="button" class="btn btn-danger"><a href="delete.php?delete_class_id=<?php echo $row['class_id']; ?>" class="text-light">DELETE</a></button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>