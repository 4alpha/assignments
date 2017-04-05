function checkForm(form) {
	var emp_pattern = /^[A-Za-z\s]+$/;
	var emp_name = document.getElementById("empName").value;
	if(emp_name == null || emp_name == '' || !emp_pattern.test(emp_name)) {
		alert("Error: EMP Name contains invalid characters!");
		emp_name.focus();
		return false;
	}

	var address = document.getElementById("emp_address").value;
	if(emp_address == null || emp_address == '') {
		alert("Error: EMP Address is Empty!");
		emp_address.focus();
		return false;
	}

	var contact_no = document.getElementById("contact_no").value;
	contact_pattern = /^[0-9]{10}$/;
	if(contact_no == null || contact_no == '' || !contact_pattern.test(contact_no)) {
		alert("Error: Contact Number should be valid number!");
		contact_no.focus();
		return false;
	}

	var dob = document.getElementById("dob").value;
	var dob_pattern = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
	if(dob == null || dob == "" || !dob_pattern.test(dob)) {
		alert("Error:Birth Date Format is INCORRECT!");
		dob.focus()
		return false;
	}
	var min_select =1;
	var max_allowed = 2;
	var i = 0;
	var listbox = document.getElementById("departments");
	var count = 0;
	for(i = 0; i < listbox.options.length; i++) {
		if (listbox.options[i].selected) {
			count++;  
		}
	} 
	if(count > max_allowed) {
		alert("You can select maximum " + max_allowed + " Departments");
		listbox.focus();
		return false;
	}
	if(count < min_select) {
		alert("You have to select minimum " + min_select + " Department");
		return false;
	}
	return true;
}