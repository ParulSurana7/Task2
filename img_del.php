<?php
$con = new mysqli('localhost', 'root', '', 'task');
if (mysqli_query($con, "Delete from image where id=$_GET[ID]")) {
    header("location:image.php?ID=$_GET[ID]");
}
