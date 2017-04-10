<?php 
$_POST['View'] = 'Employee';
include_once"common.php";
?>
<!DOCTYPE html>
	<html>
		<head> 
			<title>Employee Records</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="employee.css" />
		</head>	
		<body>
			<div class="container">
				<p><div class="row"></p>
					<div class="col-md-7 offset-md-2">
						<div class="mx-auto" style="width: 400px">
							<h1>EMPLOYEE INFO</h1>
						</div>
					</div>						
					<div class="col-md-2 offset-md-9">
						<p>
							<button id= "addEmployee" class="btn btn-outline-success" onclick="addEmployee()">
								<i class="fa fa-user-plus" aria-hidden="true"></i>
							</button>
						</p>
					</div>
				</div>
			</div>		
			<div class="container" id="acceptInfo" style="display:none">
				<form method="POST"	onsubmit="return checkForm(this)">
					<div class="col-md-7 offset-md-2">
						<div class="form-group row" id="emp_no">
							<label class="col-2 col-form-label">Employee Id</label>
								<div class="col-10">
								<input class="form-control" type="text" name="emp_no" id="empNo" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Employee Name</label>
							<div class="col-10">
								<input class="form-control" type="text" name="emp_name" id="empName" placeholder="Employee Name" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Address</label>
							<div class="col-10">
								<textarea class="form-control" name="emp_address" id="emp_address" placeholder="Address"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">DOB</label>
							<div class="col-10">
								<input class="form-control" type="date" name="DOB" id="dob" placeholder="YYYY-MM-DD" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Contact No</label>
							<div class="col-10">
								<input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact Number" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-2 col-form-label">Select Departments:</label>
							<div class="col-10">
								<?php
									getDepartments();
								?>
							</div>
						</div>
						<div id="save" class="span2">
							<div class="row">
								<div class="col-md-3 offset-md-3">
									<button type="submit" class="btn btn-success btn-block" name="operation" value="insert">SAVE</button>
								</div>
								<div class="col-md-3 offset-md-1 ">
									<a href="employeeView.php" class="btn btn-warning btn-block">CANCEL</a>
								</div>
							</div>
						</div>
						<div id="update" class="span2">				
							<div class="row">
								<div class="col-md-3 offset-md-3"> 
									<button type="submit" id="update" class="btn btn-success btn-block" name="operation" value="update">UPDATE</button>
								</div>
								<div class="col-md-3 offset-md-1 ">
									<a href="employeeView.php" class="btn btn-warning btn-block">CANCEL</a>
								</div>
							</div>
						</div>
					</div>
				</form>	
			</div>					 
			<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			<script src="empView.js"></script>
			<script src="validation.js"></script>
		</body>
	</html>

<?php
		if($_REQUEST["operation"] == "insert") {
		echo "<div class='container'>
						<div class='col-md-8 offset-md-2'>
							<div class='alert alert-success alert-dismissible fade show' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
								<strong>$result</strong>
							</div>
						</div>
					</div>";
	 }
	 if($_REQUEST["operation"] == "update") {
		echo "<div class='container'>
						<div class='col-md-8 offset-md-2'>
							<div class='alert alert-success alert-dismissible fade show' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
								<strong>$result</strong>
							</div>
						</div>
					</div>";
	 }
	 if($_REQUEST["operation"] == "delete") {
		echo "<div class='container'>
						<div class='col-md-8 offset-md-2'>
							<div class='alert alert-success alert-dismissible fade show' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
								</button>
								<strong>$result</strong>
							</div>
						</div>
					</div>";
	 }
	
		$getAll = $obj->getAll(); 
		echo '<div class="container" id="table">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="table-responsive">
									<table class="table table-hover">
										<thead class="thead-default">
											<tr>
												<th>EMP NO</th>
												<th>EMP NAME</th>
												<th>ADDRESS</th>
												<th>CONTACT</th>
												<th>DOB</th>
												<th>ACTION</th>
											</tr>
										</thead>';
		foreach($getAll AS $row) {            
			echo "<tbody>
							<tr>
								<td>" . $row['emp_no'] . "</td>
								<td>" . $row['emp_name'] . "</td>
								<td>" . $row['address'] . "</td>
								<td>" . $row['contact_no'] . "</td>
								<td>" . $row['birth_date'] . "</td>
								<td>" . '<a href="?operation=update&emp_no=' . $row['emp_no'] .'&emp_name='.$row['emp_name']. '" class="btn btn-outline-primary" 
													onclick="return updateEmployee(\'' . $row['emp_no'] . '\',\''.$row['emp_name']. '\',\''.$row['address']. '\',\''.$row['birth_date']. '\',\''.$row['contact_no'].'\')">
														<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
												</a> 
												<a href="?operation=delete&emp_no=' . $row['emp_no'] . '" class="btn btn-outline-danger" name="operation" value="delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>' . "
								</td>
							<tr>
						<tbody>";
		}
	echo"</table></div></div></div></div>";

	function getDepartments() {
		$dept = new Services\DepartmentServices;
		$dept->getAllDepartments();
		$select= '<select multiple class="form-control" name="departments[]" id="departments" >';
		foreach ($GLOBALS['allDepartments'] as $rs) {
			$select .= '<option value="' . $rs['dept_no'] . '_' . $rs['can_have_multi_departments'] . '">' . $rs['dept_name'] . '</option>';
		}
			$select .= '</select>';
			echo $select;
	}
?>