$(document).ready(function() {
  getDepartmentNamesList();
  getEmployeeInformation();
});

$("#empForm").on("submit", function() {    
  var regForName = /^[a-zA-Z ]{2,30}$/;  
  var emp_no = document.getElementById("emp_no").value;
  var name = document.getElementById("name").value;
  var male = document.getElementById("male");
  var female = document.getElementById("female"); 
  if(male.checked == true){
    gender = male.value;
  } else {
      gender = female.value;     
  } 
  var dept = $("#departmentNames").val();
  var selectDepartment = document.getElementById("departmentNames"); 
  var maxAllowed = 2;
  var min = 0;
  var count = 0;
  for(var i = 0; i < selectDepartment.options.length; i++) {
    if(selectDepartment.options[i].selected) {
      count++;
    }
  }  
  if(name == "") {
    alert("Please enter name");
    return false;  
  } else if(!regForName.test(name)) {
      alert("please enter valid name ");
      return false;
  } else if(male.checked == false && female.checked == false) {
      alert("please select gender");
      return false;
  } else if(count == min) {
      alert("Please select department");
      return false;               
  } else if(count > maxAllowed) {
      alert(" You can not select more than 2 dept");    
      return false;
  } else {
      $.ajax({
        url : "Controller.php",
        type : 'GET',
        data :{
          emp_no : emp_no,
          name : name,   
          gender : gender,
          View : "Employee",
          operation : $.action,
          department : dept
        },
        success:function(data){
          alert(data);
          getEmployeeInformation();
          $("#employeeInfo").show();
          $("#table").show();
          $("#addButton").show();  
          $("#showForm").hide();
          $("#add").hide();
        }
      });                
      return false;
  }
});

$("button[name=operation]").click(function() {
  $.action = $(this).val();           
});

$("#Add").click(function(){ 
  $("#showForm").show();
  $("#update").hide(); 
  $("#emp_no").val("");   
  $("#name").val("");
  $('input:radio[name="gender"]').filter('[value="M"]').attr('checked', false);
  $('input:radio[name="gender"]').filter('[value="F"]').attr('checked', false);
  $("#employeeInfo").hide();
  $("#table").hide();
  $("#addButton").hide();  
               
});
         
$("#cancel").click(function(){      
  $("#addButton").show();
  $("#employeeInfo").show();
//$("#table").show(); 
  $("#showForm").hide();  
});
         
function updateData(emp_no, name, gender){ 
  $("#showForm").show();
  $("#table").hide();
  $("#employeeInfo").hide();
  $("#addButton").hide();  
  $("#add").hide();   
  $("#emp_no").val(emp_no);
  $("#name").val(name);
  if(gender == "M"){
    $('input:radio[name="gender"]').filter('[value="M"]').attr('checked', true);
  } else {
      $('input:radio[name="gender"]').filter('[value="F"]').attr('checked', true);
  }
  return false;                       
}

function deleteData(emp_no) {
  $("#deleteConformation").on("click", function(){
  $.ajax({
    url : "Controller.php",
    type : 'GET',
    data :{
      emp_no : emp_no,
      View : "Employee",
      operation : "delete",
    },
    success:function(data){
      alert(data);
      getEmployeeInformation();
      $("#employeeInfo").show();
      $("#table").show();
      $("#addButton").show();  
      $("#showForm").hide();
      $("#add").hide();
      $("#deleteModal").modal('hide');      
    }
  });    
  });
}

function getEmployeeInformation(){
  $.ajax({
    url:"employeeAjax.php",
    type:'GET',
    success:function(data){
      $("#employeeInfo").html(data);
    }
  });
  $.ajax({  
    url:"employeeInformation.php",
    type:'GET',
    dataType:"json",
    success:function(data){
      $.each(data, function(i,item){
        $("#table").append("<tr><td>" + data[i].emp_no + "</td><td>"+ data[i].name + "</td><td>"+ data[i].gender + "</td><td><a href='?operation=update&emp_no=" + data[i].emp_no + "&name=" + data[i].name + "&gender=" + data[i].gender + "' onclick='return updateData(" + data[i].emp_no + ", \"" + data[i].name + "\", \"" + data[i].gender + "\")' class='btn btn-info btn-sm' type='button'><i class='fa fa-pencil'></i> Edit </a></td><td><button href='#' type='button' name='operation' value='delete' id='delete' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal'  onclick='return deleteData(" + data[i].emp_no + ")'><i class='fa fa-trash'></i>Delete</td></tr>");    
      });
    }  
  });
}
         
function getDepartmentNamesList(){ 
  $.ajax({
    url:"demo.php",
    type:'GET',      
    success:function(data){
      $("#departmentNameList").html(data);
    }
  }); 
}
            

  