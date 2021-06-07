<html>
<?php
if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', '', 'task');
    if ($con->query("update description set `descp`= '$_POST[desc]' where id=$_GET[ID]")) {
        echo "record saved";
        $_POST = array();
    } else {
        echo "record not saved";
    }
    header("location:index.php");
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<?php
$index = 0;
$con = new mysqli('localhost', 'root', '', 'task');
$result = $con->query("select * from description where id=$_GET[ID]");
while ($row = $result->fetch_assoc()) {
?>

    <body>
        <div class="container">
            <form action="desc_edit.php?ID=<?= $_GET['ID'] ?>" method="post">
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" rows="5" id="desc" name="desc"><?= $row["descp"] ?></textarea>
                <?php }
                ?>
                </div>
                <button type="submit" class="btn btn-primary " name="submit">Submit</button>
            </form>
        </div>
    </body>

</html>