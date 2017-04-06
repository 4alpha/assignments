<!DOCTYPE html>
<html>
	<head> 
		<title>Employee Records</title>
		<link rel="stylesheet" type="text/css" href="employee.css" />
	</head>
	<body>
		<form method="POST" onsubmit="return checkForm(this);">
			<center>
				<h1>EMPLOYEE INFO</h1>
				<hr>
				<div id="divPadding">
					<label>EMP NO </label><input type="text" name="emp_no" id="emp_no" /> 
				</div>
				<div id="divPadding">
					<label>EMP Name </label><input type="text" name="emp_name" id="emp_name" />
				</div>
				<div id="divPadding">
					<label>EMP Address </label><textarea name="emp_address" rows="4" cols="40"></textarea><br>
				</div>
				<div id="divPadding">
					<label>DOB </label><input type="date" name="DOB"/>
				</div>
				<div id="divPadding">
					<label>Contact No </label><input type="text" name="contact_no" pattern="[1-9]{1}[0-9]{9}">
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
				<center>
					<button type="submit" name="submit"> SEND </button>
					<button type="reset" name="reset"> Clear </button>
				</center>
			</center>
		</form>
		<script type="text/javascript">

  function checkForm(form) {
    // if(form.emp_name.value == "") {
    //   alert("Error: Input is empty!");
    //   form.emp_name.focus();
    //   return false;
		// }
		var re = /^[A-Za-z\s]+$/;
		if((document.getElementById("emp_name").value).search(re) == -1) {
      alert("Error: EMP Name contains invalid characters!");
			document.getElementById("emp_name").focus();
      return false;
		}
		if((document.getElementById("emp_no").value).search(/^[0-9]+$/) == -1) {
			alert("Error: EMP No should be valid number!");
			document.getElementById("emp_no").focus();
			return false;
	}
	return true;
}
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
                