function isChar() {
  var firstName = document.getElementById("firstName").value;
  if(firstName.search(/[^A-Za-z\s]/) != -1) {
    alert("Invalid name...Please enter name correct it should not contain number and special symbol");
    return false;
  }
}

function isEmptyValue() {
  var no = document.getElementById("emp_no").value;
  if(!no) {
    alert("Employee number should not be empty");
    return false;
  }
}

function show() {
  document.getElementById("emtTable").style.display = 'block';
}

function showAdd() {
  document.getElementById("addbtn").style.display = 'none';
  var empTable = document.getElementById('empTable');
  empTable.style.display = 'none';
  var empAddForm = document.getElementById('empAddForm');
  if (empTable.style.display === 'none') {
      empAddForm.style.display = 'block';
  } else {
      empAddForm.style.display = 'none';
  }
}

function showUpdate(emp_no) {
  console.log(emp_no);
  document.getElementById("addbtn").style.display = 'none';
  var empTable = document.getElementById('empTable');
  empTable.style.display = 'none';
  var empUpdateForm = document.getElementById('empUpdateForm');
  if (empTable.style.display === 'none') {
    document.getElementById("emp_no").value = emp_no;
    empUpdateForm.style.display = 'block';
    return false;
  } else {
      empUpdateForm.style.display = 'none';
  }
}
