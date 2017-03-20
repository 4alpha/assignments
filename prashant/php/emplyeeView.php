<!DOCTYPE html>
<html>
	<head> 
		<title>Employee Records</title>
	</head>
	<body>
		<form method="POST">
			<center>
				<h1>EMPLOYEE INFO</h1>
				<hr>
				<div style="padding:10px">
					<label>EMP NO</label><input type="text" name="emp_no" />
				</div>
				<div style="padding:10px">
					<label>EMP Name</label><input type="text" name="emp_name" />
				</div>
				<div style="padding:10px">
					<label>EMP Address</label><textarea name="emp_address" rows="4" cols="40"></textarea><br>
				</div>
				<div style="padding:10px">
					<label>DOB </label><input type="date" name="DOB" />
				</div>
				<hr>
				<h3>OPERATION'S MENU</h3>
				<div style="padding:10px">
					<div>
						<input type="radio" name="operation" value="getAll" />GET All RECORDS
					</div>
					<div>
						<input type="radio" name="operation" value="get" />GET PERTICULAR RECORD
					</div>
					<div>
						<input type="radio" name="operation" value="insert" />ADD RECORD
					</div>
					<div>
						<input type="radio" name="operation" value="update" />UPDATE RECORD
					</div>
					<div>
						<input type="radio" name="operation" value="delete" />DELETE RECORD
					</div>
				</div>
				<center>
					<button type="submit" name="submit"> SEND </button>
					<button type="reset" name="reset"> Clear </button>
				</center>
			</center>
		</form>
	</body>
</html>

<?php
	$_POST['View'] = 'Employee';
		error_reporting(E_ALL);
	ini_set('dispaly_errors',1);
	include_once 'common.php';
	if(isset($_POST["submit"])) {
		if(($_POST["operation"]) == 'getAll') {  
			echo "<table border = 1>
			<tr><th>EMP NO</th>
			<th>EMP NAME</th>
			<th>ADDRESS</th>
			<th>DOB</th></tr>
			";
			foreach($result AS $row) {            
			echo "<tr>
			<td>" . $row['emp_no'] . "</td>
			<td>" . $row['emp_name'] . "</td>
			<td>" . $row['address'] . "</td>
			<td>" . $row['birth_date'] . "</td>
			<tr>";
			} echo" </table>";       
		}
		if(($_POST["operation"]) == 'get') {
			print_r($result);
		}    
		if($_POST["operation"] == "insert") {
			echo $result; 
		}
		if($_POST["operation"] == "update") {
			echo $result;
		}
		if($_POST["operation"] == "delete") {
			echo $result;
		}
	}
?>
                