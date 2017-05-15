function showAddForm(checkid,empno = null,empname = null) {
           var formAdd = document.getElementById('formAddDisplay');
           var table = document.getElementById('tableRecord');
           var add = document.getElementById('add');
           add.style.display = 'none';
           table.style.display = 'none';
           formAdd.style.display = 'block';
           if(checkid == 'add') {
              formAdd.style.display = 'block';
              document.getElementById('no').value = null;
              document.getElementById('addData').value = "add";
           } 
           if(checkid == 'update'){
             document.getElementById('addData').value = "update";
             document.getElementById('no').value = empno;
             document.getElementById('empname').value = empname;
             formAdd.style.display = 'block';
             return false;
           }
        }

        function nameValidation(check_id) {
          if(check_id == 'AddForm') {
          var addValue =   document.getElementById('empname').value;
          } else {
            var addValue =   document.getElementById('name').value;
          }
          var matches = addValue.match(/\d+/g);
          if(addValue == '') {
            alert('please enter employee name it is empty');
              return false;
          }
          if (matches != null ) {
              alert('Enter charcters only Invalid String');
              return false;
          }
        }

        function showTable() {
          var formAdd = document.getElementById('formAddDisplay');
          var table = document.getElementById('tableRecord');
          var add = document.getElementById('add');
          formAdd.style.display = 'none';
            if (table.style.display === 'none') {
              table.style.display = 'block';
              add.style.display = 'block';
              
            } 
        }