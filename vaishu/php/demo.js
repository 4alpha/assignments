function validateFormOfEmployee(form) {
    var name = document.getElementById('name').value;
    if (name.search(/^[a-zA-Z\s]+$/) == -1) {
        alert("Please enter valid name ");
        return false;
    } 
    var date = document.getElementById('birthdate').value;
    if(date.value != '' && !date.match(/^\d{4}\-\d{1,2}\-\d{1,2}$/)) {
      alert("Please enter valid date " );
      return false;   
    }
    if ((form.gender[0].checked == false ) && (form.gender[1].checked == false)) {
      alert ( "please select your gender" );
      return false;
    }
}