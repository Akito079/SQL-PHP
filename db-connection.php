<?php

$conn = mysqli_connect('localhost','root','','to-do-list');
if(!$conn){
    echo 'db connection failed'.mysqli_connect_error();
}

?>