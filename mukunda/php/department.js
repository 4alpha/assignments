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
      
      function updateData(d_no, d_name, multiple) { 
        document.getElementById("d_no").value = d_no;
        document.getElementById("d_name").value = d_name;
        if(multiple == "t") {
           document.getElementById("multiple_departments").checked = true;
        } else {
           document.getElementById("not_multiple_departments").checked = true;
        }
        document.getElementById("addButton").style.display = 'none';
        document.getElementById("tableContainer").style.display = 'none';
        document.getElementById("form").style.display = 'block';
        document.getElementById("add").style.display = "none";
        return false;
      }
      
      function validate() {
        var regForName = /^[a-zA-Z ]{2,20}$/;
        var name = document.getElementById("d_name").value;
        var Yes = document.getElementById("multiple_departments");   
        var No = document.getElementById("not_multiple_departments");

        if(name == "") {
          alert("Please enter department name");
          return false;
        } else if(!regForName.test(name)) {
            alert("Please enter valid Name");
            return false;
        } else if(Yes.checked == false && No.checked == false) {
            alert("Please select Yes or No");
            return false;
        } else {
            return true;
        }
      }