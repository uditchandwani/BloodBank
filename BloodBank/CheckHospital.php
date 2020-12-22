<?php
        if(isset($_SESSION["designation"]))
        {
            if($_SESSION["designation"]=="Receiver")
            {
                echo "<script> alert('You cannot visit this page !!');  window.location.href = 'index.php?';</script>";;
            }
        }
?>
