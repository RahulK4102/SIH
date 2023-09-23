<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Video details</title>
</head>

<body>
    <button type="button" id="myButton" class="btn btn-primary">ADD VIDEO</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Video Id</th>
                <th scope="col">Category Id</th>
                <th scope="col">Video Name</th>
                <th scope="col">Video Link</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include './data/database.php';
            $display = new Database();
            $result = $display->display('video');
            if ($result) {
                foreach ($result as $row) {

            ?>
                    <tr>
                        <th scope="row"><a href="selected_display.php ?display_video_id=<?php echo $row['video_id']; ?>" class="text-dark"><?php echo $row['video_id']; ?></a></th>
                        <td><?php echo $row['category_id']; ?></td>
                        <td><?php echo $row['video_name']; ?></td>
                        <td><?php echo $row['video_link']; ?></td>
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
    </table>
    <script>
        const button = document.getElementById('myButton');

        function handleClick() {
            let classId = prompt("In Which class do you want to add details?",'0');
            var classid = parseInt(classId);
            location.replace("http://localhost/SIH1/data/video.php?add_class_id=" + classid);
        }
        button.addEventListener('click', handleClick);
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>