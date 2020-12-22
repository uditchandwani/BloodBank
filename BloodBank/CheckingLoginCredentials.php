<?php  
    require 'connection.php';

    $obj = new DbCon();
    $conn = $obj->connect();   
    
    

    if(isset($_POST["submit"]))
    {
        $email = $_POST["Email"];
        $pwd = $_POST["pwd"];
        $role = $_POST["Role"];

        if($role=="Receiver")
        {
            $sql = "select receiver_id,receiver_name from receiver_details where email = \"$email\"";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                $sql = "select receiver_id as rid,receiver_name as rn from receiver_details where email = \"$email\" and pwd=\"$pwd\" ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    $row=$result->fetch_assoc();
                    session_start();
                    $_SESSION["designation"] = "Receiver";
                    $_SESSION["receiverId"] = $row["rid"] ;
                    $_SESSION["receiverName"] = $row["rn"];
                    echo "<script> alert('Logged in successfully !!');  window.location.href = 'index.php?';</script>";
                }
                else
                {
                    echo "<script> alert('Password incorrect !!'); window.location.href = 'Login.php?'; </script>";
                }
            }
            else 
            {
                echo "<script> alert('Please enter valid email !!'); window.location.href = 'Login.php?'; </script>";
            }
        }
        else
        {
            $sql = "select hospital_id,hospital_name from hospital_details where email = \"$email\"";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                $sql = "select hospital_id as hid,hospital_name as hn from hospital_details where email = \"$email\" and pwd=\"$pwd\" ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    $row=$result->fetch_assoc();
                    session_start();
                    $_SESSION["designation"] = "Hospital";
                    $_SESSION["hospitalId"] = $row["hid"] ;
                    $_SESSION["hospitalName"] = $row["hn"];
                    echo "<script> alert('Logged in successfully !!'); window.location.href = 'index.php?'; </script>";
                }
                else
                {
                    echo "<script> alert('Password incorrect !!'); window.location.href = 'Login.php?'; </script>";
                }
            }
            else 
            {
                echo "<script> alert('Please enter valid email !!'); window.location.href = 'Login.php?'; </script>";
            }
        }
            
        
    }


?>  