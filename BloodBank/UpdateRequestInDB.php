<?php  
    require 'connection.php';

    $obj = new DbCon();
    $conn = $obj->connect();   
    
    

    if(isset($_POST["submit"]))
    {
        $request_id = $_POST["RequestId"];
        $status = $_POST["Status"];
        
        $sql = "update requests set status='".$status."' where request_id='".$request_id."'";
        if($conn->query($sql))
        {
            echo "<script> alert('Request Updated !!'); window.location.href = 'ViewRequests.php'; </script>"; 
        }
        else
        {
            echo "<script> alert('Error updating request !!'); window.location.href = 'ViewRequests.php'; </script>";
        }
    }
?>