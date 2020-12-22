<?php  
    require 'connection.php';

    $obj = new DbCon();
    $conn = $obj->connect();   
    
    

    if(isset($_POST["submit"]))
    {
        $name = $_POST["Name"];
        $email = $_POST["Email"];
        $age = $_POST["Age"];
        $phone = $_POST["Phone"];
        $address = $_POST["Address"];
        $bloodGroup = $_POST["BloodGroup"];
        $pwd = $_POST["pwd"];

        $sql = "select receiver_id from receiver_details where email = '".$email."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            echo "<script> alert('Email already exists !!'); window.location.href = 'ReceiverSignUp.php?err=\"Email already exists\"'; </script>";
            
        }
        else
        {
            $sql = "select max(receiver_id) as mid from receiver_details";
            $result = $conn->query($sql);
            $max = $result->fetch_assoc();
            $rid= $max["mid"]+1;
            $sql = "INSERT INTO receiver_details( receiver_id,receiver_name, email, age, phone, address, blood_group, pwd) VALUES ('$rid','$name','$email','$age','$phone','$address','$bloodGroup','$pwd')";

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