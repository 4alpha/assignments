//FOR department
function validateForm(id) {
  var deptname = document.getElementById('deptnameadd').value;
  if (deptname.search(/^[a-zA-Z\s]+$/) == -1 ) {
      alert("Please enter valid name !!");
      return false;
  }
  if ((id.status[0].checked == false) && (id.status[1].checked == false)) {
    alert ( "Please select status: Yes or No" );
    return false;
  }
}

function validateEmpForm(form) {
  var fname = document.getElementById('fname').value;
  if (fname.search(/^[a-zA-Z\s]+$/) == -1) {
      alert("Please enter valid first name !!");
      return false;
  } 
  var lname = document.getElementById('lname').value;
  if (lname.search(/^[a-zA-Z\s]+$/) == -1) {
      alert("Please enter valid last name !!");
      return false;
  }
  var bdate = document.getElementById('bdate').value;
  if(bdate.value != '' && !bdate.match(/^\d{4}\-\d{1,2}\-\d{1,2}$/)) {
    alert("Invalid date format: " + bdate);
    return false;   
  }
  if ((form.gender[0].checked == false ) && (form.gender[1].checked == false)) {
    alert ( "Please choose your Gender: Male or Female" );
    return false;
  }
}

function deptaddFormDisplay(deptno,deptname,assignstatus) {
    var allForm = document.getElementById('tablegetall');
    allForm.style.display = 'none';
    document.getElementById('record').style.display = 'none';
    var updateDiv = document.getElementById('updateBtnDiv');
    var addDiv = document.getElementById('addBtnDiv');
    var deptForm = document.getElementById('addform');
    document.getElementById('dno').style.display = 'none';
    if(deptno == 'addnew') {
        updateDiv.style.display = 'none';
        if (allForm.style.display === 'none') { 
            document.getElementById('dno').value = deptno;
            addDiv.style.display = 'block';
            deptForm.style.display = 'block';
            return false;
        } else {
            deptForm.style.display = 'none';
        }
    } else {
        addDiv.style.display = 'none';
        if (allForm.style.display === 'none') {
            updateDiv.style.display = 'block';
            document.getElementById('dno').value = deptno;
            document.getElementById('deptnameadd').value = deptname;
            if(assignstatus == 't') {
                document.getElementById('statustrue').checked = true;
            } else {
                 document.getElementById('statusfalse').checked = true;
            }
            deptForm.style.display = 'block';
            return false;
        } else {
            deptForm.style.display = 'none';
        }
    }
}

function empaddFormDisplay(eno,fname,lname,bdate,gender) {
    alert(gender);
    var allForm = document.getElementById('getDisplayAll');
    allForm.style.display = 'none';
    document.getElementById('emptable').style.display = 'none';
    var updateDiv = document.getElementById('updateBtnDivEmp');
    var addDiv = document.getElementById('addBtnDivEmp');
    var deptForm = document.getElementById('empform');
    document.getElementById('empno').style.display = 'none';
    if(eno == 'addnew') { 
        updateDiv.style.display = 'none';
        if (allForm.style.display === 'none') {
            document.getElementById('empno').value = eno;
            addDiv.style.display = 'block';
            deptForm.style.display = 'block';
            return false;
        } else {
            deptForm.style.display = 'none';
        }
    } else {
        addDiv.style.display = 'none';
        if (allForm.style.display === 'none') {
            updateDiv.style.display = 'block';
            document.getElementById('empno').value = eno;
            document.getElementById('fname').value = fname;
            document.getElementById('lname').value = lname;
            document.getElementById('bdate').value = bdate;
            if(gender == 'Male') {
                document.getElementById('m').checked = true;
            } else {
                 document.getElementById('f').checked = true;
            }
            deptForm.style.display = 'block';
            return false;
        } else {
            deptForm.style.display = 'none';
        }
    }
}

function deptFormDisplay() {
    var add = document.getElementById('addform');
    document.getElementById('record').style.display = 'block';
    add.style.display = 'none';
    var y = document.getElementById('tablegetall');
    if (add.style.display === 'none') {
        y.style.display = 'block';
    } else {
        y.style.display = 'none';
    }
}

function empFormDisplay() {
    var add = document.getElementById('empform');
    document.getElementById('emptable').style.display = 'block';
    add.style.display = 'none';
    var y = document.getElementById('getDisplayAll');
    if (add.style.display === 'none') {
        y.style.display = 'block';
    } else {
        y.style.display = 'none';
    }
}

function hideform() {
    document.getElementById('addform').style.display = 'none';
    document.getElementById('empform').style.display = 'none';
}
