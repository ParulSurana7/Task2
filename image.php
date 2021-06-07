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
                <a style="color: inherit;" href="img_add.php?ID=<?= $_GET['ID'] ?>">ADD</a>
            </button>
            <thead>
                <tr>
                    <th> S.No.</th>
                    <th>Image</th>
                    <th>Description ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $index = 0;
            $con = new mysqli('localhost', 'root', '', 'task');
            $result = $con->query("select * from image where d_id=$_GET[ID]");

            while ($row = $result->fetch_assoc()) {
                $img = explode(',', $row['img']);
                $count = count($img);
                $i = 0;
                $row2 = $con->query("select descp from description where id= $_GET[ID]");
                $row3 = $row2->fetch_assoc();
            ?>
                <tr>
                    <td><?= ++$index; ?></td>
                    <td>
                        <?php while ($i < $count) {
                            echo '<img src="uploads/' . $img[$i] . '" height="50">';
                            $i++;
                        }
                        ?>
                    </td>
                    <td><?= $row3["descp"] ?></td>
                    <td>

                        <a href="img_del.php?ID=<?= $row["id"] ?>">Delete </a>
                    </td>
                </tr>
            <?php  }
            ?>
            <tbody>
            <tfoot>
                <tr>
                    <th> S.No.</th>
                    <th>Image</th>
                    <th>Description ID</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
</body>

</html>