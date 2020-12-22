    <?php
        require 'connection.php';

        $obj = new DbCon();
        $conn = $obj->connect();   

        session_start();
        
        if(isset($_SESSION["designation"]))
        {
            if($_SESSION["designation"]=="Receiver")
            {
                $sql = "select request_id from requests where sample_id = '".$_GET["sample_id"]."' and receiver_id='".$_SESSION["receiverId"]."'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {
                    echo "<script> alert('You have already requested this sample !!'); window.location.href = 'index.php'; </script>";
                }
                else
                {
                    $sql = "select max(request_id) as mid from requests";
                    $result = $conn->query($sql);
                    $max = $result->fetch_assoc();
                    $rid= $max["mid"]+1;
                    $sql = "INSERT INTO requests( request_id, receiver_id, sample_id, status) VALUES ('$rid','".$_SESSION["receiverId"]."','".$_GET["sample_id"]."','Requested')";

                    if($conn->query($sql))
                    {
                        echo "<script> alert('Requested successfully !!'); window.location.href = 'index.php'; </script>";
                    }
                    else
                    {
                        echo "<script> alert('Error requesting sample !!'); window.location.href = 'index.php'; </script>";
                    }
                }
                
            }
            else
            {
                echo "<script> alert('Hospitals cannot request samples !!'); window.location.href = 'index.php';</script>";
            }
        }
        else
        {
            echo "<script> alert('Log in first !!'); window.location.href = 'Login.php';</script>";
        }
    ?>