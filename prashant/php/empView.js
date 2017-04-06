function addEmployee() {
	document.getElementById("acceptInfo").style.display = 'block';
	document.getElementById("addEmployee").style.display = 'none';
	document.getElementById("table").style.display = 'none';
	document.getElementById("save").style.display = 'block';
	document.getElementById("update").style.display = 'none';
	document.getElementById("emp_no").style.display = 'none';
}

function updateEmployee(empno,empname,address,dob,contact) {
	document.getElementById("acceptInfo").style.display = 'block';
	document.getElementById("update").style.display = 'block';
	document.getElementById("empNo").style.display = 'block';
	document.getElementById("addEmployee").style.display = 'none';
	document.getElementById("table").style.display = 'none';
	document.getElementById("save").style.display = 'none';
	document.getElementById("empNo").value = empno;
	document.getElementById("empName").value = empname;
	document.getElementById("emp_address").value = address;
	document.getElementById("dob").value = dob;
	document.getElementById("contact_no").value = contact;
	return false;
}