
<?php
require_once('db-connection.php');
   $id = $_GET['id'];
   $sql = "DELETE FROM work WHERE id = $id";

   if(mysqli_query($conn,$sql)){
    echo "delete success";
     header("location:./read.php");
   }else{
   echo "delete failed".mysqli_connect_error();
   }
?>