<!-- steps to upate
Get Data => Show => Edit => Update -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('db-connection.php');
    $id = $_GET['id'];
    $sql = " SELECT * FROM work WHERE id = $id ";
    $query = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($query); // get data
    if(isset($_POST['updateBtn'])){
        $id = $_POST['taskId'];
        $taskName = $_POST['taskName'];
        if($taskName == null || $taskName == '' ){
            echo "<small style='color:red;'>You need to fill the name</small>";
        }else{
            $updateSQL = "UPDATE work SET name = '$taskName' where id = $id";
            if( $sqli = mysqli_query($conn,$updateSQL)){
                header("location:./read.php");
            }else{
                echo "Update Error" . mysqli_error(); 
            }
        }
    }
    ?>
    <form action="" method="POST">
        Tasks 
        <input type="hidden" name="taskId" value="<?php echo $data['id']  ?>">
        <input type="text" name="taskName" value="<?php echo $data['name']  ?> " >
        <button name="updateBtn">Update</button>
    </form>
</body>

</html>