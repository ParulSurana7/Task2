<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <table class="table table-bordered table-hover">
            <button style="float: right;" type="submit" class="btn btn-primary">
                <a style="color: inherit;" href="desc_add.php">ADD</a>
            </button>
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $index = 0;
            $con = new mysqli('localhost', 'root', '', 'task');
            $result = $con->query("select * from description");

            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>

                    <td><?= ++$index; ?></td>
                    <td><?= $row["descp"]; ?></td>

                    <td>
                        <a href="desc_edit.php?ID=<?= $row["id"] ?>">Edit</a>
                        <a href="desc_del.php?ID=<?= $row["id"] ?>">Delete </a>
                        <a href="image.php?ID=<?= $row["id"] ?>">Image</a>

                    </td>
                </tr>
            <?php  }
            ?>
            <tbody>
            <tfoot>
                <tr>
                    <th>S.No.</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
</body>

</html>