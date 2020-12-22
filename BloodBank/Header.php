<header>
    <h1><a href="index.php">Blood Bank</a></h1>
    <?php 
        session_start();

        if(isset($_SESSION["designation"]))
        {
            if($_SESSION["designation"]=="Receiver")
            {
    
                echo "<div class=\"headerLinks\"><a href=\"index.php\">Availabe Blood Samples</a></div>";
                echo "<div class=\"headerLinks\"><a href=\"ReceiverRequests.php\">Requested Samples</a></div>";
                echo "<span >".$_SESSION["receiverName"]." <a href=\"Logout.php\">Logout</a></span>";
            }
            else
            {
        
                echo "<div class=\"headerLinks\"><a href=\"AddBloodInfo.php\">Add Blood Sample Info</a></div>";
                echo "<div class=\"headerLinks\"><a href=\"ViewRequests.php\">See Requests</a></div>";
                echo "<span >".$_SESSION["hospitalName"]." <a href=\"Logout.php\">Logout</a></span>";
             }
            
        }
        else
        {
                echo "<script> alert('Log in first !!'); window.location.href = 'Login.php';</script>";   
        }
    ?>
</header>