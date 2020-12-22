<?php
    require 'connection.php';

    $obj = new DbCon();
    $conn = $obj->connect();   
    
    session_start();

    if(isset($_GET["del"]))
    {
        $sql = "delete from available_samples where sample_id='".$_GET["del"]."'";
        if($conn->query($sql))
        {
            $sql = "delete from requests where sample_id='".$_GET["del"]."'";
            $conn->query($sql);
            echo "<script> alert('Sample deleted !!'); window.location.href = 'AddBloodInfo.php'; </script>"; 
        }
        else
        {
            echo "<script> alert('Error deleting record !!'); window.location.href = 'AddBloodInfo.php'; </script>";
        }
    }
?>