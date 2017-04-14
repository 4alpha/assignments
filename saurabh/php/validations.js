function validateForm(form) {
  var emp_no = document.getElementById("emp_no").value;
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  var hireDate = document.getElementById("hireDate").value;
  var departments = document.getElementById("selectDept").value;
  if(emp_no == "") {
    alert("please enter employee number");
    return false;
  }
  if((isChar(firstName) == false) || (firstName == "")) {
    alert("Please enter correct first name it does not contains symbols or numbers");
    return false;
  }
  if((isChar(lastName) == false) || (lastName == "")) {
    alert("Please enter correct last name it does not contains symbols or numbers");
    return false;
  }
  if(checkDate(hireDate) == false) {
    alert("Please enter date in dd-mm-yyyy format");
    return false;
  }
  if(count($_POST['departments[]']) == 0) {
    alert("Please select department");
    return false;
  }
  if(departments.value == null || departments.value == "") {
    alert("Please select department");
    return false;
  }
  if(elements["departments"].selectedIndex < 0) {
    alert("select department");
  }
}

function checkDate(data) {
  if(data.match(/^([0-9]{2})\-([0-9]{2})\-([0-9]{4})$/)) {
    return true;
  } else {
    return false;
  }
}

function isChar(data) {
  if(data.search(/[^A-Za-z\s]/) != -1) {
    return false;
  } else {
    return true;
  }
}

function show() {
  document.getElementById('employeeForm').style.display = 'none';
  document.getElementById("addbtn").style.display = 'block';
  document.getElementById("empTable").style.display = 'block';
}

function showForm(data = null, firstName = null, lastName = null, hireDate = null) {
  document.getElementById("addbtn").style.display = 'none';
  var empTable = document.getElementById('empTable');
  var empForm = document.getElementById('employeeForm');
  empTable.style.display = 'none';
  
  if(data == 'addButton') {
    document.getElementById("updateBtnDiv").style.display = 'none';
    if (empTable.style.display === 'none') {
      document.getElementById("emp_no").value = data;
      document.getElementById("firstName").value = firstName;
      document.getElementById("lastName").value = lastName;
      document.getElementById("hireDate").value = hireDate;
      document.getElementById("addBtnDiv").style.display = 'block';
      empForm.style.display = 'block';
    } else {
        empForm.style.display = 'none';
    }
  } else {
    document.getElementById("addBtnDiv").style.display = 'none';
    if (empTable.style.display === 'none') {
      document.getElementById("emp_no").value = data;
      document.getElementById("firstName").value = firstName;
      document.getElementById("lastName").value = lastName;
      document.getElementById("hireDate").value = hireDate;
      empForm.style.display = 'block';
      document.getElementById("updateBtnDiv").style.display = 'block';
      return false;
    } else {
        empForm.style.display = 'none';
    }
  }
}