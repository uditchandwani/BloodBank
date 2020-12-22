<!DOCTYPE html>
<html>
<head>
	<title>Availabe Blood Samples</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		function RequestSample(id) {
			if(confirm("Are you sure ?"))
                        {
                            window.location.href = 'AddRequestToDB.php?sample_id='+id;
                        }
		}
	</script>
</head>
<body class="mainPages">
	<?php
            require 'connection.php';
    
        $obj = new DbCon();
        $conn = $obj->connect();
        ?>
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
                    echo "<div class=\"headerLinks\"><a href=\"index.php\">Availabe Blood Samples</a></div>";
                    echo "<div class=\"headerLinks\"><a href=\"ReceiverRequests.php\">Requested Samples</a></div>";
                    echo "<span ><a href=\"Login.php\">Log In / Sign Up</a></span>";
            }
        ?>
    </header>
	<div class="container">
		<div class="pageContent">
			<h1>List Of Availabe Samples</h1>
			<hr>
			<hr>
			<br>
			<table>
				<tr>
					<th>Blood Sample</th>
					<th>Hospital</th>
					<th>Request</th>
				</tr>
                <?php 
                    $sql = "select blood_group,hospital_name,sample_id from available_samples av inner join hospital_details hd on av.hospital_id=hd.hospital_id order by av.hospital_id,av.sample_id";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc())
                    {
                        

                        echo "<tr>";
                            echo "<td>";
                                echo $row["blood_group"];
                            echo "</td>";

                            echo "<td>";
                                echo $row["hospital_name"];
                            echo "</td>";
                            
                            echo "<td>";
                                echo "<button onclick=\"RequestSample(".$row["sample_id"].")\">Request</button>";
                            echo "</td>";
                            
                        echo "</tr>";
                    }
                
                ?>
			</table>
		</div>
	</div>
	<?php
            include 'Footer.php';
        ?>
</body>
</html>