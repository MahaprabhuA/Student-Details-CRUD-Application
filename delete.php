<?php
    include 'DBconn.php';
    $delete = $_GET['dlt'];
    $sql = "delete from student_details where id = '$delete'";
    if (isset($_GET['dlt']) && !empty($_GET['dlt'])) 
    {
        $delete = $_GET['dlt'];
        $sql = "DELETE FROM Student_details WHERE ID = '$delete'";
        if (mysqli_query($connection, $sql)) 
        {
            header("Location: index.php");
            exit();
        } 
        else 
        {
            echo "Error: " . mysqli_error($connection);
        }
    } 
    else 
    {
        echo "Invalid request.";
    }    
?>