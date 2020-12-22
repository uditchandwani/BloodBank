<!DOCTYPE html>
<html>
<head>
	<title>Blood Sample Requests</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		function formSubmit() 
                {
                    var num=document.myForm.Status.value;
                    if(num==" ")
                    {
                            alert("Please select status");
                            return false;
                    }
		}
		function EditRequest(id) {
			var row=document.getElementById("edit"+id);
                        document.myForm.BloodGroup.value=row.getElementsByClassName("td1")[0].innerHTML;
                        document.myForm.ReceiverName.value=row.getElementsByClassName("td2")[0].innerHTML;
                        document.myForm.Status.value=row.getElementsByClassName("td3")[0].innerHTML;
                        document.myForm.RequestId.value=id;
                        
		}
	</script>
</head>
<body class="mainPages">
	<?php
            include 'Header.php';
            include 'CheckHospital.php';
            require 'connection.php';

            $obj = new DbCon();
            $conn = $obj->connect();
        ?>
	<div class="container">
		<div class="pageContent">
			<h1>List Of Requested Samples</h1>
			<hr>
			<hr>
			<br>
			<div class="inputValues">
                            <form name="myForm" action="UpdateRequestInDB.php" method="POST" onSubmit="return formSubmit()">
					<div class="formRow">
                                                <input type="number" name="RequestId" value="" style="display: none;">
						<label>Blood Group</label><br>
						<input type="text" name="BloodGroup" value="" readonly>
					</div>
					<div class="formRow">
						<label>Receiver Name</label><br>
                                                <input type="text" name="ReceiverName" value="" readonly>
                                                
					</div>
					<div class="formRow">
						<label>Status</label><br>
						<select name="Status">
							<option value=" " selected>Select</option>
							<option value="Requested">Requested</option>
							<option value="Approved">Approved</option>
							<option value="Rejected">Rejected</option>
						</select>
					</div>
					<div class="formRow">
						<input type="submit" name="submit" value="Update">
						<input type="reset">
					</div>
				</form>
			</div>
			<hr>
			<table>
				<tr>
					<th>Blood Sample</th>
					<th>Receiver Name</th>
					<th>Status</th>
					<th>Edit</th>
				</tr>
                                <?php 
                                    $sql = "select request_id,receiver_name,blood_group,status from (select request_id,status,receiver_name,sample_id from requests rs inner join receiver_details rd on rs.receiver_id=rd.receiver_id ) et inner join available_samples av on et.sample_id=av.sample_id where hospital_id='".$_SESSION["hospitalId"]."';";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc())
                                    {
                                        echo "<tr id=\"edit".$row["request_id"]."\">";
                                            echo "<td class=\"td1\">";
                                                echo $row["blood_group"];
                                            echo "</td>";

                                            echo "<td class=\"td2\">";
                                                echo $row["receiver_name"];
                                            echo "</td>";

                                            echo "<td class=\"td3\">";
                                                echo $row["status"];
                                            echo "</td>";
                                            
                                            echo "<td>";
                                                echo "<button onclick=\"EditRequest(".$row["request_id"].")\">Edit</button>";
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