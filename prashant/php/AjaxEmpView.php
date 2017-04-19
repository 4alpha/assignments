<?php
$_POST['view'] = 'Employee';
include_once "common.php";

		$getAll= $obj->getAll();
		// $allEmployees = json_encode($getAll);
		// echo $allEmployees;

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
												<a class="btn btn-outline-danger" href="?operation=delete&emp_no=' . $row['emp_no'] .'" data-toggle="modal" data-target=" #deleteModal" 
													onclick="setEmployeeNumber('. $row['emp_no'] .')">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>' 
												. "
								</td>
						</tr>
						 </tbody>";
		}
	echo"</table></div></div></div></div>";
?>