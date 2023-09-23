<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Category details</title>
</head>

<body>
    <button type="button" class="btn btn-primary"><a href="./data/category.php" class="text-light">ADD CATEGORY</a></button>
    <table class="table">
        <?php
        include './data/database.php';
        if (isset($_GET['display_class_id'])) {
        ?>
            <thead>
                <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $join = "class ON category.class_id = class.class_id ";
                $display = new Database();
                $class_id = $_GET['display_class_id'];
                $result = $display->display('category', $join, 'class.class_id = ' . $class_id);

                if ($result) {
                    foreach ($result as $row) {

                ?>
                        <tr>
                            <th scope="row"><a href="selected_display.php ?display_category_id=<?php echo $row['category_id']; ?>" class="text-dark"><?php echo $row['category_id']; ?></a></th>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['Date_Time']; ?></td>
                            <td>
                                <button type="button" name="update" class="btn btn-primary"><a href="./data/category.php ?update_category_id=<?php echo $row['category_id']; ?>" class="text-light">UPDATE</a></button>
                                <button type="button" class="btn btn-danger"><a href="delete.php?delete_category_id=<?php echo $row['category_id']; ?>" class="text-light">DELETE</a></button>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['display_category_id'])) {
        ?>
            <thead>
                <tr>
                    <th scope="col">Video Id</th>
                    <th scope="col">Category Id</th>
                    <th scope="col">Video Name</th>
                    <th scope="col">Video Link</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $join = "category ON video.category_id = category.category_id ";
                $display2 = new Database();
                $category_id = $_GET['display_category_id'];
                $result = $display2->display('video', $join, 'category.category_id = ' . $category_id);

                if ($result) {
                    foreach ($result as $row) {

                ?>
                        <tr>
                            <th scope="row"><a href="selected_display.php ?display_video_id=<?php echo $row['video_id']; ?>" class="text-dark"><?php echo $row['video_id']; ?></a></th>
                            <td><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['video_name']; ?></td>
                            <td><?php echo $row['video_link']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['Date_time']; ?></td>
                            <td>
                                <button type="button" name="update" class="btn btn-primary"><a href="./data/video.php ?update_video_id=<?php echo $row['video_id']; ?>" class="text-light">UPDATE</a></button>
                                <button type="button" class="btn btn-danger"><a href="delete.php?delete_video_id=<?php echo $row['video_id']; ?>" class="text-light">DELETE</a></button>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
            <?php
            if (isset($_GET['display_video_id'])) {
            ?>
                <thead>
                    <tr>
                        <th scope="col">Video Id</th>
                        <th scope="col">Category Id</th>
                        <th scope="col">Video Name</th>
                        <th scope="col">class Name</th>
                        <th scope="col">Video Link</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Date/Time</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                $display2 = new Database();
                $video_id = $_GET['display_video_id'];
                $join = "category ON video.category_id = category.category_id JOIN class on class.class_id=category.class_id ";
                $result = $display2->display('video', $join, 'video.video_id = ' . $video_id);

                if ($result) {
                    foreach ($result as $row) {

                ?>
                        <tr>
                            <th scope="row"><?php echo $row['video_id']; ?></th>
                            <td><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['video_name']; ?></td>
                            <td><?php echo $row['class_name']; ?></td>
                            <td><?php echo $row['video_link']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['Date_time']; ?></td>
                            <td>
                                <button type="button" name="update" class="btn btn-primary"><a href="./data/video.php ?update_video_id=<?php echo $row['video_id']; ?>" class="text-light">UPDATE</a></button>
                                <button type="button" class="btn btn-danger"><a href="delete.php?delete_video_id=<?php echo $row['video_id']; ?>" class="text-light">DELETE</a></button>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        <?php
            }
        ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>



<!-- SELECT * from video left join category on category.category_id = video.category_id left join class on class.class_id=category.class_id where video.category_id=3; -->