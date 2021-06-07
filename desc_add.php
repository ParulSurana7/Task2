<html>
<?php
if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', '', 'task');
    if ($con->query("insert into description (descp) values('$_POST[desc]');")) {
        //insert into description (descp) values ('demo')
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

<body>
    <div class="container">
        <form action="desc_add.php" method="post" style="border: 1px solid; padding: 25px; margin: 25px;">
            <div class=" form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
            </div>
            <button type="submit" class="btn btn-primary " name="submit" value="submit">Submit</button>
        </form>
    </div>
</body>

</html>