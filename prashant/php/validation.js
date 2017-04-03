function checkForm(form) {
    if(form.empName.value == "") {
      alert("Error: Employee Name is empty!");
      form.empName.focus();
      return false;
		}
		var re = /^[A-Za-z\s]+$/;
		if((document.getElementById("empName").value).search(re) == -1) {
      alert("Error: EMP Name contains invalid characters!");
			document.getElementById("empName").focus();
      return false;
		}
		if((document.getElementById("contact_no").value).search(/^\+*[0-9]+$/) == -1) {
			alert("Error: Contact Number should be valid number!");
			document.getElementById("contact_no").focus();
			return false;
	}
	return true;
}