<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Table List</h1>
    <a href="./create.php">Create Page</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td>1</td>
                <td>Code-lab</td>
                <td>01.02.2022</td>
                <th>
                    <a href="#">Update</a> |
                    <a href="#">Delete</a>
                </th>
            </tr> -->
            <?php
            require_once("./db-connection.php");
            // SELECT * FROM table_name;
            $sql = "SELECT * FROM work";
            $query = mysqli_query($conn, $sql);
            $totalRow = mysqli_num_rows($query);
            // echo "<pre>";
            // var_dump(mysqli_fetch_assoc($query));
            while ($row = mysqli_fetch_assoc($query)) {
                $time = date('d.m.y g:iA',strtotime($row['created_at']));
                echo "
                <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$time}</td>
                <th>
                    <a href='./update.php?id={$row['id']}'>Update</a> |
                    <a href='./delete.php?id={$row['id']}'>Delete</a>
                </th>
                </tr>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>