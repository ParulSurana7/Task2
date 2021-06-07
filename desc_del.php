<?php
$con = new mysqli('localhost', 'root', '', 'task');
if (mysqli_query($con, "Delete from description where id=$_GET[ID]")) {
    header("location:index.php");
}
