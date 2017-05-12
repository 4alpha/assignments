  $(document).ready(function() {
      employeeTable();
      $("#add").click(function(){
        alert("inside add");
      $("#addrecord").show();
      $("#AddForm").show();
      $("#AddValue").hide();
      $("#tableDisplay").hide();
            
  });
             
  $.ajax({
    type: "POST",
    url:"dept.php",
    success:function(result) {
      $("#departmentName").html(result)
    }
  });
  $('button').click(function() {
    $.action = $(this).val();
    alert($.action);
  });
        
$("#AddForm").on("submit",function(event){
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
    url:"Controller.php",
    type: 'POST',
    data:
    { View : 'Employee',
      emp_no : emp_no, 
      emp_name : emp_name,
      departments : departments,
      action : $.action
    },
    success:function(responce){
    alert(responce);
    employeeTable();
    showTable();
    },
    error: function (responce) {
      alert(responce);
    }
  });
    return false;
  });
  
});
function employeeTable(){
  $.ajax({
    Type: "GET",
    datatype: "json",
    url:"employeeView.php",
    contentType : "application/json; carset=utf-8",
    success:function(data) {
        alert(data);
        console.log(data);
      for(i in data){
        $("#table").append("<tr><td>"+data[i].emp_no+"</td><td>"+data[i].emp_name+"</td></tr>")
      }
    }                   
  });
}

function showUpdateForm(emp_no,emp_name) {
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
  alert("in show table");
  $("#AddValue").show();
  $("#tableDisplay").show();
  $("#AddForm").hide();
  $("#emp_no").val('');
  $("#emp_name").val('');
} 
 function deleteEntry(emp_no){
   var action = 'delete'; 
   alert(action);
   $.ajax({
    url:"Controller.php",
    type: 'POST',
    data:
    { View : 'Employee',
      emp_no : emp_no, 
      action : action
    },
    success:function(responce){
      alert(responce);
      employeeTable();
      showTable();
    },
    error: function (responce) {
      alert(responce);
    }
    });
    return false;
  
 }            
      
   

//   function validateFormOfEmployee(form) {
//     var name = document.getElementById('name').value;
//     if (name.search(/^[a-zA-Z\s]+$/) == -1) {
//         alert("Please enter valid name ");
//         return false;
//     } 
//     var date = document.getElementById('birthdate').value;
//     if(date.value != '' && !date.match(/^\d{4}\-\d{1,2}\-\d{1,2}$/)) {
//       alert("Please enter valid date " );
//       return false;   
//     }
//     if ((form.gender[0].checked == false ) && (form.gender[1].checked == false)) {
//       alert ( "please select your gender" );
//       return false;
//     }
// }

        
        