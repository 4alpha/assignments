<!DOCTYPE html>
	<html>
		<head> 
			<title>Department</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="employee.css" />
		</head>	
		<body>
			<div class="container">
				<div class="row">
					<div class="col-md-2 offset-md-9">
							<p>
								<button id= "addDepartment" class="btn btn-outline-success" onclick="addDepartment()">
									<i class="fa fa-user-plus" aria-hidden="true"></i>
								</button>
							</p>
						</div>
					</div>
				</div>		
				<div class="container" id="acceptInfo" style="display:none">
					<form method="POST">
						<div class="col-md-7 offset-md-2">
							<div class="mx-auto" style="width: 400px">
								<h1>DEPARTMENT INFO</h1>
							</div>
							<hr>
							<div class="form-group row" id="dept_no">
								<label class="col-2 col-form-label">Department No</label>
									<div class="col-10">
									<input class="form-control" type="text" name="dept_no" id="deptNo">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Department Name</label>
								<div class="col-10">
									<input class="form-control" type="text" name="dept_name" id="deptName">
								</div>
							</div>
							<div id="save" class="span2">
								<div class="form-group row">
									<label class="col-4 col-form-label">Can Have Multi Dept?</label>
									<div class="col-10">
										<div class="radio">
											<label><input type="radio" name="optradio" value="true">Yes</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="optradio" value="false">No</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 offset-md-3">
										<button type="submit" class="btn btn-success btn-block" name="operation" value="insert">SAVE</button>
									</div>
									<div class="col-md-3 offset-md-1 ">
										<button type="reset" class="btn btn-warning btn-block">CLEAR</button>
									</div>
								</div>
							</div>
							<div id="update" class="span2">
								<div class="form-group row">
									<label class="col-4 col-form-label">Can Have Multi Dept?</label>
									<div class="col-10">
										<div class="radio">
											<label><input type="radio" name="optradio" value="true">Yes</label>
										</div>
										<div class="radio">
											<label><input type="radio" name="optradio" value="false">No</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 offset-md-3"> 
										<button type="submit" id="update" class="btn btn-success btn-block" name="operation" value="update">UPDATE</button>
									</div>
									<div class="col-md-3 offset-md-1 ">
										<button type="reset" class="btn btn-warning btn-block">CLEAR</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			<script src="deptView.js"></script>
		</body>
	</html>

	<?php
		error_reporting(E_ALL);
		ini_set('dispaly_errors',1);
		$_POST['View'] = 'Department';
		
		include_once 'common.php';		
			$getAll = $obj->getAll(); 
			echo '<div class="container" id="table">
							<div class="row justify-content-center">
								<div class="col-8">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead class="thead-default">
												<tr>
													<th>Department No</th>
													<th>Department Name</th>
													<th>Multi Dept</th>
													<th>ACTION</th>
												</tr>
											</thead>';
			foreach($getAll AS $row) {            
				echo "<tbody>
								<tr>
									<td>" . $row['dept_no'] . "</td>
									<td>" . $row['dept_name'] . "</td>
									<td>" . $row['can_have_multi_departments'] . "</td>
									<td>" . '<a href="?operation=update&dept_no=' . $row['dept_no'] .'&dept_name='.$row['dept_name']. '" class="btn btn-outline-primary" 
														onclick="return updateDepartment(' . $row['dept_no'] .')">
															<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
													</a> 
													<a href="?operation=delete&dept_no=' . $row['dept_no'] . '" class="btn btn-outline-danger" name="operation" value="delete">
														<i class="fa fa-trash-o" aria-hidden="true"></i>
													</a>' . "
									</td>
								<tr>
							<tbody>";
			}
	?>