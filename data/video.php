<?php
include 'database.php';
$video = new Database();
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $video_name = $_POST['video_name'];
    $video_link = $_POST['video_link'];
    $video_id = $_POST['video_id'];

    $video->insert('video', ['category_id' => $category_id, 'video_name' => $video_name, 'video_link' => $video_link, 'video_id' => $video_id]);
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/video_display.php');
}
if (isset($_POST['update'])) {
    $video_id = $_GET['update_video_id'];
    $category_id = $_POST['category_id'];
    $video_name = $_POST['video_name'];
    $video_link = $_POST['video_link'];
    $video->update('video', ['video_id' => $video_id, 'category_id' => $category_id, 'video_name' => $video_name, 'video_link' => $video_link], 'video_id =' . $video_id);
    echo '<script>alert("Inserted Succesfully ")</script>';
    header('location:/SIH1/video_display.php');
}
if(isset($_GET['add_class_id'])) {
$add_class_id = $_GET['add_class_id'];
$classes = $video->display1('category','class_id ='.$add_class_id);

if ($classes !== false) {
    foreach ($classes as $row) {
    }
} else {
    echo "Error fetching data from the database.";
}
}
if (isset($_GET['update_video_id'])) {

    $update_video_id = $_GET['update_video_id'];
    $classes = $video->display1('video', 'video_id =' . $update_video_id);

    if ($classes !== false) {
        foreach ($classes as $row) {
            $category_id_1 =  $row['category_id'];
        }
        $classes2 = $video->display1('category', 'category_id = ' . $category_id_1);
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
    <title>Video Info</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Category Id</th>
                        <th scope="col">Video Name</th>
                        <th scope="col">Video Link</th>
                        <th scope="col">Video Id</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            <?php
                            if(isset($_GET['update_video_id'])){
                            ?>
                            <div class="inputbox">
                                        <input type="name" name="category_id" value=<?php foreach ($classes as $row) {echo $row['category_id'];} ?> >
                                <?php
                                }else{
                                ?>
                            </div>
                            <div class="inputbox">
                                <select name="category_id">
                                    <?php
                                    foreach ($classes as $row) {
                                    ?>
                                        <option value="<?php echo $row['category_id']; ?> "> <?php echo $row['category_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?php
                                }
                                ?>
                            </div>
                        </th>
                        <td>
                        <?php
                            if(isset($_GET['update_video_id'])){
                            ?>
                            <div class="inputbox">
                                <input type="name" name="video_name" value= <?php foreach ($classes as $row) {echo $row['video_name'];} ?> >
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="inputbox">
                                <input type="name" name="video_name">
                            </div>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                        <?php
                            if(isset($_GET['update_video_id'])){
                            ?>
                            <div class="inputbox">
                                <input type="url" name="video_link" value=<?php foreach ($classes as $row) {echo $row['video_link'];} ?> >
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="inputbox">
                                <input type="url" name="video_link">
                            </div>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                        <?php
                            if(isset($_GET['update_video_id'])){
                            ?>
                            <div class="inputbox">
                                <input type="quantity" name="video_id" value=<?php foreach ($classes as $row) {echo $row['video_id'];} ?> >
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="inputbox">
                                <input type="quantity" name="video_id">
                            </div>
                            <?php
                            }?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- <div class="inputbox">
                <label for="">Category Id</label>
                <select name="category_id">
                    <?php
                    foreach ($classes as $row) {
                    ?>
                        <option value="<?php echo $row['category_id']; ?> "> <?php echo $row['category_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="inputbox">
                <input type="name" name="video_name">
                <label for="">Video Name</label>
            </div>
            <div class="inputbox">
                <input type="url" name="video_link">
                <label for="">Video Link</label>
            </div>
            <div class="inputbox">
                <input type="quantity" name="video_id">
                <label for="">Video Id</label>
            </div> -->
            <button name="submit" class="btn btn-primary">SUBMIT</button>
            <button name="update" class="btn btn-primary">UPDATE</button>
        </form>
    </div>
</body>

</html>