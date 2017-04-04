<!DOCTYPE html>
<html lang="en">
	<head> 
		<title>Employee Records</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
		<link rel="stylesheet" type="text/css" href="employee.css" />
	</head>
	<body ng-app="myApp" ng-cloak>
		<form method="POST">
			<center>
				<h1>EMPLOYEE INFO</h1>
				<hr>
				<div>
				<md-input-container flex>
					<label>EMP NO </label><input type="text" name="emp_no" id="emp_no" />
				</md-input-container>
				</div>
				<div>
				<md-input-container flex>
					<label>EMP Name </label><input type="text" name="emp_name" id="emp_name" />
				</md-input-container>
				</div>
				<div>
				<md-input-container flex>
					<label>EMP Address </label><textarea name="emp_address" rows="2" cols="30"></textarea><br>
				</md-input-container>
				</div>
				<div>
				<md-input-container flex>
					<label>DOB </label><input type="date" name="DOB"/>
				</md-input-container>
				</div>
				<div>
				<md-input-container flex>
					<label>Contact No </label><input type="text" name="contact_no" pattern="[1-9]{1}[0-9]{9}">
				</md-input-container>
				</div>
				<hr>
				<h3>OPERATION'S MENU</h3>
				<div id="divPadding">
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
				 </md-input-container>
					<section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
						<md-button class="md-raised md-primary" type="submit" name="submit">SAVE</md-button>
						<md-button class="md-raised md-warn" type="reset" name="reset">CLEAR</md-button>
					</section>
			</center>
		</form>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
	<script type="text/javascript">
		angular.module('myApp', ['ngMaterial']);
	</script>
	
</body>
</html>

<?php
	error_reporting(E_ALL);
	ini_set('dispaly_errors',1);
	$_POST['View'] = 'Employee';
	include_once 'common.php';
	if(isset($_POST["submit"])) {
		if(($_POST["operation"]) == 'getAll') {  
			echo "<table border = 1>
			<tr><th>EMP NO</th>
			<th>EMP NAME</th>
			<th>ADDRESS</th>
			<th>DOB</th>
			<th>Contact No.</th></tr>
			";
			foreach($result AS $row) {            
			echo "<tr>
			<td>" . $row['emp_no'] . "</td>
			<td>" . $row['emp_name'] . "</td>
			<td>" . $row['address'] . "</td>
			<td>" . $row['birth_date'] . "</td>
			<td>" . $row['contact_no'] . "</td>
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
                