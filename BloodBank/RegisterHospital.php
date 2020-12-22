<?php  
    require 'connection.php';

    $obj = new DbCon();
    $conn = $obj->connect();   
    
    

    if(isset($_POST["submit"]))
    {
        $name = $_POST["Name"];
        $email = $_POST["Email"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $pwd = $_POST["pwd"];

        $sql = "select hospital_id from hospital_details where email = '".$email."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            echo "<script> alert('Email already exists !!'); window.location.href = 'HospitalSignUp.php?err=\"Email already exists\"'; </script>";
        }
        else
        {
            $sql = "select max(hospital_id) as mid from hospital_details";
            $result = $conn->query($sql);
            $max = $result->fetch_assoc();
            $rid= $max["mid"]+1;
            $sql = "INSERT INTO hospital_details( hospital_id,hospital_name, email, phone, address, pwd) VALUES ('$rid','$name','$email','$phone','$address','$pwd')";

            if($conn->query($sql))
            {
                echo "<script> alert('Registration successfull !!'); window.location.href = 'Login.php'; </script>";
            }
        }
    }
    else
    {
        
    }


?>  