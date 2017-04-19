      $(document).ready(function(){
         $.ajax({
                 url:"demo.php",
                 type:'POST',
                 
                 data:$(this).serialize(),
  
                 success:function(data){
                   $("#departmentNameList").html(data);
                 }
             });

       $("#empform").on("submit", function(event){
        event.preventDefault();
        var regForName = /^[a-zA-Z ]{2,30}$/;
        var name = $("#name").val();
        var male = document.getElementById("male");
        var female = document.getElementById("female");       
        if(male.checked == true){
          gender = male.value;
        } else {
          gender = female.value;
        }
        var action = document.getElementById("add").value;
        
        var dept = $("#selectDept").val();
  
        var selectDepartment = document.getElementById("selectDept");
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
                    url:"Controller.php",
                    type:'POST',
                    data:{
                      name:name,   
                      gender:gender,
                      View:"Employee",
                      operation:action,
                      department:dept
                    },
                    success:function(data){
                        //$("#resultMessage").text(data);
                     alert(data);
                    }
                  });                
        //    });
        //     return false;
        // });
          return false;
        }
       });
      }); 
      