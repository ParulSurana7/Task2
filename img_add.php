<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <form action="img_add.php?ID=<?= $_GET['ID'] ?>" method="post" enctype="multipart/form-data" style="border: 1px solid; padding: 25px; margin: 25px;">
        <label for="img"> Image to upload:</label>
        <input class="form-control" type="file" name="image[]" id="img" multiple="multiple">
        <input type="submit" class="btn btn-primary " value="Upload Image" name="submit">
        <input type="text" hidden name="id" id="id" value="<?= $_POST['id']; ?>">
    </form>

</html>
<?php
$a = [];
$output_dir = "uploads/";
if (isset($_FILES["image"]['name'])) {
    $fileCount = count($_FILES["image"]['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $ImageName      = str_replace(' ', '-', strtolower($_FILES['image']['name'][$i]));
        $ImageType      = $_FILES['image']['type'][$i];
        $NewImageName = $ImageName;
        array_push($a, $NewImageName);
        $ret[$NewImageName] = $output_dir . $NewImageName;
        if (!file_exists($output_dir)) {
            @mkdir($output_dir, 0777);
        }

        move_uploaded_file($_FILES["image"]["tmp_name"][$i], $output_dir . "/" . $NewImageName);
        if (isset($_POST['submit'])) {
            $b = implode(",", $_FILES["image"]['name']);
            $con = new mysqli('localhost', 'root', '', 'task');
            if ($con->query("insert into image (d_id, img) values($_GET[ID], '$b')")) {
                echo "record saved";
                $_POST = array();
            } else {
                echo "record not saved";
            }
            header("location:image.php?ID=$_GET[ID]");
        }
    }
}
?>