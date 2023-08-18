<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>To do list</h1>
    <a href="./read.php">read list</a>
    <!-- INSERT INTO table_name (field1) VALUES ('value1') -->
    <form action="" method="POST">
        <label for="name">Your Tasks</label>
        <input type="text" name="taskName" id="name" placeholder="Enter your task" >
        <button name="addBtn">Add</button>
    </form>
    <?php
    require_once("./db-connection.php");
    if (isset($_POST['addBtn'])) {
        $taskName = $_POST['taskName'];
        if ($taskName == '' || $taskName == null) {
            echo '<small style="color:red;">Message is required</small>';
        } else {
            $sql = "INSERT INTO work (name) VALUES('$taskName')";
            if (mysqli_query($conn, $sql)) {
                header("location:./read.php");
            } else {
                echo 'Insert failed';
            }
        }
    }
    ?>
</body>

</html>