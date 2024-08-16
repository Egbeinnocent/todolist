<?php
include'conn.php';

if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    
    $sql = "DELETE FROM `task` WHERE `id`= '$delid'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location:todo.php?deleted');

    }
}
?>