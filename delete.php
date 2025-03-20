<?php
    include 'DBconn.php';
    $delete = $_GET['dlt'];
    $sql = "delete from Student_details where id = '$delete'";
    if(mysqli_query($connection,$sql))
        {
            //echo '<script>location.replace("index.php")<script>';
            header("Location: index.php");
            exit();
        }
        else
        {
            echo "Some thing error". $connection->error;
        } 
?>