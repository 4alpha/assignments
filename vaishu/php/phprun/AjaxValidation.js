$(document).ready(function() {
  employeeTable();
  
  $("#add").click(function() {
    alert("inside add");
    $("#addrecord").show();
    $("#AddForm").show();
    $("#AddValue").hide();
    $("#tableDisplay").hide();
  });
             
  $.ajax({
    type : "POST",
    url : "dept.php",
    success : function(result) {
      $("#departmentName").html(result)
    }
  });

  $('button').click(function() {
    $.action = $(this).val();
  });
        
  $("#AddForm").on("submit", function(event) {
    event.preventDefault();
    var emp_no = $("#emp_no").val();
    var emp_name = $("#emp_name").val();
    var departments = $("#departments").val();
    var matches = emp_name.match(/\d+/g);

    if(emp_name == '') {
    alert('please enter employee name it is empty');
        return false;
    }
    
    if (matches != null ) {
      alert('Enter charcters only.. Invalid String');
      return false;
    }
          
    $.ajax({
      url : "Controller.php",
      type : 'POST',
      data :
      { 
        View : 'Employee',
        emp_no : emp_no, 
        emp_name : emp_name,
        departments : departments,
        action : $.action
      },
      success : function(responce) {
        alert(responce);
        employeeTable();
        showTable();
      },
      error : function (responce) {
        alert(responce);
      }
    });
    return false;
  });
});

function employeeTable() {
  $.ajax({
    type : "POST",
    url : "employeeView.php",
    success : function(result) {
      $("#tableDisplay").html(result);
    }
                    
  });
}

function showUpdateForm(emp_no, emp_name) {
  alert("in update function");
  $("#AddForm").show();
  $("#updateValue").show();
  $("#AddValue").hide();
  $("#addrecord").hide();
  $("#tableDisplay").hide();
  $('#emp_no').val(emp_no);
  $('#emp_name').val(emp_name);
  return false;
}

function showTable() {
  $("#AddValue").show();
  $("#tableDisplay").show();
  $("#AddForm").hide();
  $("#emp_no").val('');
  $("#emp_name").val('');
}

function deleteEntryFromTable(emp_no) {
  var action = 'delete'; 
  alert(action);
  $.ajax({
    url : "Controller.php",
    type : 'POST',
    data :
      { 
        View : 'Employee',
        emp_no : emp_no, 
        action : action
      },
      success : function(responce){
        employeeTable();
        showTable();
      },
      error : function (responce) {
        alert(responce);
      }
  });
  return false;
}            
      
   



        
        