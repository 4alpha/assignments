      function showAddDataForm() {
        document.getElementById("form").style.display = "block"; 
        document.getElementById("tableContainer").style.display = "none";
        //document.getElementById("form").style.display = "block";     
        document.getElementById("addButton").style.display = "none";
        document.getElementById("update").style.display = "none"; 
        document.getElementById("cancle").style.display = "bolck";
      }
      
      function cancle() {
        document.getElementById("addButton").style.display = "block";
        document.getElementById("tableContainer").style.display = "block";
        document.getElementById("form").style.display = "none";   
      }
      
      function updateData(emp_no, name, gender) { 
        document.getElementById('emp_no').value = emp_no; 
        document.getElementById('name').value = name; 
        if(gender == 'M') {
          document.getElementById('male').checked = true; 
        } else {
          document.getElementById('female').checked = true;
        }
        
        document.getElementById('addButton').style.display = 'none';
        document.getElementById('tableContainer').style.display = 'none';
        document.getElementById("add").style.display = "none";
        document.getElementById('form').style.display = 'block';  
        return false;
      }
      
      function validate(){
        var regForName = /^[a-zA-Z ]{2,30}$/;
        var name = document.getElementById("name").value;
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

      