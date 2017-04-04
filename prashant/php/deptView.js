function addDepartment() {
	document.getElementById("acceptInfo").style.display = 'block';
	document.getElementById("save").style.display = 'block';
	document.getElementById("addDepartment").style.display = 'none';
	document.getElementById("table").style.display = 'none';	
	document.getElementById("update").style.display = 'none';
	document.getElementById("dept_no").style.display = 'none';
}

function updateDepartment(dept_no) {
	document.getElementById("acceptInfo").style.display = 'block';
	document.getElementById("update").style.display = 'block';
	document.getElementById("deptNo").style.display = 'block';
	document.getElementById("addDepartment").style.display = 'none';
	document.getElementById("table").style.display = 'none';
	document.getElementById("save").style.display = 'none';
	document.getElementById("deptNo").value = dept_no;
	return false;
}