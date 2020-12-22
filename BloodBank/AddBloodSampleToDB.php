<?php
    require 'connection.php';

    $obj = new DbCon();
    $conn = $obj->connect();   
    
    session_start();

    if(isset($_POST["submit"]))
    {
        $blood_group = $_POST["BloodGroup"];
        $sql = "select sample_id from available_samples where blood_group = '".$blood_group."' and hospital_id='".$_SESSION["hospitalId"]."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            echo "<script> alert('Blood sample already exists !!'); window.location.href = 'AddBloodInfo.php'; </script>";
            
        }
        else
        {
            $sql = "select max(sample_id) as mid from available_samples";
            $result = $conn->query($sql);
            $max = $result->fetch_assoc();
            $sid= $max["mid"]+1;
            $sql = "INSERT INTO available_samples( sample_id, blood_group, hospital_id) VALUES ('$sid','$blood_group','".$_SESSION["hospitalId"]."')";

            if($conn->query($sql))
            {
                echo "<script> alert('Sample added successfully !!'); window.location.href = 'AddBloodInfo.php'; </script>";
            }
        }
        
    }
?>