<!DOCTYPE html>
<html>
<head>
	<title>Blood Samples Requested</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="mainPages">
	<?php
            include 'Header.php';
            include 'CheckReceiver.php';
            require 'connection.php';
    
        $obj = new DbCon();
        $conn = $obj->connect();
        ?>
	<div class="container">
		<div class="pageContent">
			<h1>List Of Blood Samples Requested</h1>
			<hr>
			<hr>
			<br>
			<table>
				<tr>
					<th>Blood Sample</th>
					<th>Hospital</th>
					<th>Status</th>
				</tr>
                <?php 
                    $sql = "select status,blood_group,hospital_name from hospital_details hd inner join (select status,blood_group,hospital_id from available_samples aas inner join (select status,sample_id,rq.request_id from requests rq inner join receiver_details rd on rq.receiver_id=rd.receiver_id where rq.receiver_id='".$_SESSION["receiverId"]."') et on aas.sample_id=et.sample_id) et1 on hd.hospital_id=et1.hospital_id;";
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
                                echo $row["status"];
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