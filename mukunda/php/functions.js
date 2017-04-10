     function showAddDataForm() {
        document.getElementById("tableContainer").style.display = "none";
        document.getElementById("form").style.display = "block";     
        document.getElementById("addButton").style.display = "none";
       document.getElementById("update").style.display = "none"; 
      }
      
      function cancle() {
        document.getElementById("addButton").style.display = "block";
        document.getElementById("tableContainer").style.display = "block";
        document.getElementById("form").style.display = "none";   
      }
      
      function updateData(emp_no) { 
        document.getElementById('emp_no').value = emp_no; 
        
        document.getElementById('addButton').style.display = 'none';
        document.getElementById('tableContainer').style.display = 'none';
        document.getElementById('form').style.display = 'block';  
        document.getElementById("add").style.display = "none";
        return false;
      }
      
      function validate(){
        var regForName = /^[a-zA-Z ]{2,30}$/;
        var name = document.getElementById("emp_name").value;
        var male = document.getElementById("male");
        var female = document.getElementById("female");
        var selectDepartment = document.getElementById("select");
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
            return true;
        }
      }

      // function validateUpdate() {
      //   var regForName = /^[a-zA-Z ]{2,30}$/;
      //   var name = document.getElementById("emp_name_update").value;
      //   var male = document.getElementById("updateMale");
      //   var female = document.getElementById("updateFemale");
      //   var selectDepartment = document.getElementById("selectUpdate");
      //   var maxAllowed = 2;
      //   var min = 0;
      //   var countUp = 0;
      //   for(var i = 0; i < selectDepartment.options.length; i++) {
      //     if(selectDepartment.options[i].selected) {
      //       countUp++;
      //     }
      //   }
      //   if(name == "") {
      //     alert("Please enter name");
      //     return false;
      //   } else if(!regForName.test(name)) {
      //       alert("please enter valid name ");
      //       return false;
      //   } else if(male.checked == false && female.checked == false) {
      //      alert("please select gender");
      //       return false;
      //   } else if(countUp == min) {
      //       alert("Please select department");
      //       return false;               
      //   } else if(countUp > maxAllowed) {
      //       alert(" You can not select more than 2 dept");    
      //       return false;
      //   } else {        
      //       return true;
      //   }
      // }
     
  