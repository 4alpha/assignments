$(document).ready(function() {
  $.ajax({
    url:"demo.php",
    type:'GET',
    success:function(data){
      //alert("in demo");
      $("#employeeNameList").html(data);
    } 
  });  
});
