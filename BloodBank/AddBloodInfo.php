<!DOCTYPE html>
<html>
<head>
	<title>Add Blood Sample Info</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		function formSubmit() {
			var num=document.myForm.BloodGroup.value;
	        if(num==" ")
	        {
	        	alert("Please select blood group");
	        	return false;
	        }
		}
		function deleteSample(id) {
			
                       if(confirm("Are you sure ?"))
                       {
                           window.location.href = 'DeleteBloodSampleFromDB.php?del='+id;
                       }
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
			<h1>Edit Blood Sample Information</h1>
			<hr>
			<hr>
			<br>
			<div class="inputValues">
				<form name="myForm" method="POST" action="AddBloodSampleToDB.php" onSubmit="return formSubmit()">
					<div class="formRow">
						<label>Hospital Name:</label><br>
                                                <input type="text"  value="<?php echo $_SESSION["hospitalName"];  ?>" readonly>
					</div>
					<div class="formRow">
						<label>Blood Group:</label><br>
						<select name="BloodGroup">
							<option value=" " selected>Select Blood Group</option>
							<option value="O+">O+</option>
				            <option value="O-">O-</option>
				            <option value="B+">B+</option>
				            <option value="A+">A+</option>
				            <option value="A-">A-</option>
				            <option value="AB+">AB+</option>
				            <option value="AB-">AB-</option>
						</select>
					</div>
					<div class="formRow">
						<input type="submit" name="submit" value="Add">
						<input type="reset">
					</div>
				</form>
			</div>
			<hr>
			<table>
				<tr>
					<th>Blood Sample</th>
					<th>Hospital</th>
					<th>Delete</th>
				</tr>
                                <?php
                                    
                                    $sql = "select blood_group,sample_id from available_samples where hospital_id='".$_SESSION["hospitalId"]."'";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc())
                                    {
                                        echo "<tr>";
                                            echo "<td>".$row["blood_group"]."</td>";
                                            echo "<td>".$_SESSION["hospitalName"]."</td>";
                                            echo "<td><button onclick=\"deleteSample(".$row["sample_id"].")\">Delete</button></td>";
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