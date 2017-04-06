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