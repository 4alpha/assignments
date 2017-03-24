function validateForm() {
  var deptname = document.getElementById('deptname').value;
    if (deptname.search(/^[a-zA-Z\s]+$/) == -1) {
        alert("Please enter valid name !!");
        return false;
    }
}

function addFormDisplay() {
    var x = document.getElementById('tablegetall');
    document.getElementById('record').style.display = 'none';
    x.style.display = 'none';
    var y = document.getElementById('addform');
    if (x.style.display === 'none') {
        y.style.display = 'block';
    } else {
        y.style.display = 'none';
    }
}

function updateFormDisplay(dept_no) {
    var x = document.getElementById('tablegetall');
    document.getElementById('record').style.display = 'none';
    x.style.display = 'none';
    var y = document.getElementById('updateform');
    if (x.style.display === 'none') {
        document.getElementById('dno').value = dept_no;
        y.style.display = 'block';
        return false;
    } else {
        y.style.display = 'none';
    }
}

function tableFormDisplay() {
    var add = document.getElementById('addform');
    var update = document.getElementById('updateform');
    document.getElementById('record').style.display = 'block';
    add.style.display = 'none';
    update.style.display = 'none';
    var y = document.getElementById('tablegetall');
    if (add.style.display === 'none' || update.style.display === 'none') {
        y.style.display = 'block';
    } else {
        y.style.display = 'none';
    }
}

function hideform() {
    document.getElementById('addform').style.display = 'none';
    document.getElementById('updateform').style.display = 'none';
}
