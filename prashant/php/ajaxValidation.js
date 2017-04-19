$(document).ready(function(){
	getAllEmployees();		
});

$("#formid").on("submit",function() {
	var emp_pattern = /^[A-Za-z\s]+$/;
	var emp_name = document.getElementById("empName").value;
	if(emp_name == null || emp_name == '' || !emp_pattern.test(emp_name)) {
		alert("Error: EMP Name contains invalid characters!");	
        document.getElementById('empName').focus();
		return false;
		
	}

	var address = document.getElementById("emp_address").value;
	if(emp_address == null || emp_address == '') {
		alert("Error: EMP Address is Empty!");
        document.getElementById("emp_address").focus();
		return false;
	}

	var contact_no = document.getElementById("contact_no").value;
	contact_pattern = /^[0-9]{10}$/;
	if(contact_no == null || contact_no == '' || !contact_pattern.test(contact_no)) {
		alert("Error: Contact Number should be valid number!");
		document.getElementById("contact_no").focus();
		return false;
	}

	var dob = document.getElementById("dob").value;
	var dob_pattern = /^\d{4}\-\d{1,2}\-\d{1,2}$/;
	if(dob == null || dob == "" || !dob_pattern.test(dob)) {
		alert("Error:Birth Date Format is INCORRECT!");
		document.getElementById("dob").focus()
		return false;
	}

	var min_select =1;
	var max_allowed = 2;
	var i = 0;
	var selectedList = document.getElementById("departments");
	var count = 0;
	for(i = 0; i < selectedList.options.length; i++) {
		if (selectedList.options[i].selected) {
			count++;  
		}
	} 
	if(count > max_allowed) {
		alert("You can select maximum " + max_allowed + " Departments");
		document.getElementById("departments").focus();
		return false;
	}
	if(count < min_select) {
		alert("You have to select minimum " + min_select + " Department");
		document.getElementById("departments").focus();
		return false;
	}

	$.ajax({
					type: "POST", 
					url: "common.php",					
					data:{view: "Employee",
								emp_no: $("#empNo").val(),
								emp_name: $("#empName").val(),
								emp_address: $("#emp_address").val(),
								DOB: $("#dob").val(),
								contact_no: $("#contact_no").val(),
								departments: $("#departments").val(),
								operation: $.operation},										
					success: function(result) {
						alert(result);
						getAllEmployees();
						$("#addEmployee").show();
						$("#empTable").show();
						$("#acceptInfo").hide();
							}						
		});			
	return false;
});

$("button[name=operation]").on("click", function(){
		$.operation = $(this).val();
	});

$("#addEmployee").on("click",function(){
	$("#empName").val("");
	$("#emp_address").val("");
	$("#dob").val("");
	$("#contact_no").val("");
	$("#acceptInfo").show();
	$("#addEmployee").hide();
	$("#empTable").hide();
	$("#add").show();
	$("#update").hide();
	$("#emp_no").hide();
	$("#departments").val(getAllDepartments());
});

function updateEmployee (empno,empname,address,dob,contact) {
	$("#acceptInfo").show();
	$("#update").show();
	$("#empNo").show();
	$("#addEmployee").hide();
	$("#empTable").hide();
	$("#add").hide();
	$("#emp_no").show();
	$("#empNo").val(empno);
	$("#empName").val(empname);
	$("#emp_address").val(address);
	$("#dob").val(dob);
	$("#contact_no").val(contact);
	$("#departments").val(getAllDepartments());
	return false;
};

$("#confirmDelete").on("click",function(){
	$.ajax({
					type: "POST", 
					url: "common.php",					
					data:{view: "Employee",
								emp_no: $.emp_no,
								operation: "delete"},										
					success: function(result) {
						$('#deleteModal').modal('hide');
					
						getAllEmployees();
						$("#addEmployee").show();
						$("#empTable").show();
						$("#acceptInfo").hide();
							alert(result);
							}						
		});			
});

function setEmployeeNumber(emp_no) {
	$.emp_no = emp_no;
}
function getAllDepartments() {
		$.get("allDepartments.php",function(data){
			$("#deptList").html(data);
		});
	}

function getAllEmployees() {
		$.get("AjaxEmpView.php",function(data){
			$("#empTable").html(data);
		});
};

$("input[name=cancel]").on("click",function(){
	$("#addEmployee").show();
	$("#acceptInfo").hide();
	$("#empTable").show();
});