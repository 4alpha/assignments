$(document).ready(function() {
    $("#canceladdbtn").click(function() {
        $("#empaddupdateform").hide();
        $("#MainView").show();
    });
    
    $("button[name=submit]").click(function() {
        $.action = $(this).val();
        alert($.action);
    });
    
    $("#cancelupdatebtn").click(function() {
        $("#empaddupdateform").hide();
        $("#MainView").show();
    })
    
    $.ajax({
        type : "GET",
        url: "SetDepartment.php",
        success: function(data) {
            $("#result").html(data)
        },
    });

    $("#employeeViewForm").on("submit",function(event) {
        var emp_no = $("#emp_no").val();
        var firstname = $("#fname").val();
        if(firstname == '' || (firstname.search(/^[a-zA-Z\s]+$/) == -1)) {
            alert("Please enter valid First Name.!!");
            return false;
        }
        var lastname = $("#lname").val();
        if(lastname == '' || (lastname.search(/^[a-zA-Z\s]+$/) == -1)) {
            alert("Please enter valid Last Name.!!");
            return false;
        }
        var bdate = $("#bdate").val();
        if(bdate.value != '' && !bdate.match(/^\d{4}\-\d{1,2}\-\d{1,2}$/)) {
            alert("Please enter valid BirthDate.!!");
            return false;
        }
        var gender = $("input[name='gender']:checked").val();
        if(gender == undefined) {
            alert("Please select gender.!!");
            return false;
        }
       
        var selectDepartment = $("#departmentNames").val();
        $.ajax({
            url:"controller.php",
            type:'POST',
            data:{
                emp_no:emp_no,
                fname:firstname,
                lname:lastname,
                bdate:bdate,
                gender:gender,
                view:"EmployeeController",
                submit:$.action,
                departments:selectDepartment
            },
            success:function(data){
                alert(data);
            }
        });  
        return false;
    });
    return false;
});

$(document).ready(function(){
    $("#addnew").click(function() {
        $("#MainView").hide(1000);
        $("#empaddupdateform").show(1000);
        $("#updateBtnDivEmp").hide();
        $("#addBtnDivEmp").show();
        $("#emp_no").val(null);
        $("#fname").val(null);
        $("#lname").val(null);
        $("#bdate").val(null);
        // $("input[name=gender][value=" + gender + "]").prop('checked', false);
    });
    
    $.ajax({
        type:"GET",
        dataType:"json",
        url:"setEmployeeTable.php",
        contentType: "application/json; charset=utf-8",
        cache:false,
        success: function(data) {
            for(i in data) {
                $("#emptable").append("<tr><td>"+data[i].emp_no+"</td><td>"+data[i].first_name+"</td><td>"+data[i].last_name+"</td><td>"+data[i].birth_date+"</td><td>"+data[i].gender+"</td><td><a href='?submit=update&emp_no=" + data[i].emp_no + "&first_name=" + data[i].first_name + "&last_name=" + data[i].last_name + "&birth_date=" + data[i].birth_date + "&gender=" + data[i].gender +"' onclick='return updateFormRecord("+data[i].emp_no+", \""+data[i].first_name+"\", \""+data[i].last_name+"\", \""+data[i].birth_date+"\", \""+data[i].gender+"\")' id='updaterecord' style='margin-right:50px' type='button' class='btn btn-primary btn-sm'>Update</a><a href='?submit=delete&emp_no=" + data[i].emp_no + "' type='button' class='btn btn-danger btn-sm' name='submit' onclick='return deleteRecord("+data[i].emp_no+")' id='deleterecord' value='delete'>Delete</a></td></tr>")
            }
        },
    });
    return false;
});

function deleteRecord(emp_no) {
   $.ajax({
        url:"controller.php",
        type:'POST',
        data:{
            emp_no:emp_no,
            view:"EmployeeController",
            submit:"delete",
        },
        success:function(data){
            // $("#emptable").find('a[name=submit]').each(function() {
            //     if($(this).is(":clicked")) {
            //         $(this).parents("tr").remove();
            //     }
            // });
            alert(data);
        }
    });  
    return false;
}

function updateFormRecord(emp_no,first_name,last_name,birth_date,gender) {
    $(document).on('click',"#updaterecord", function(event) {
    $("#MainView").hide(1000);
    $("#empaddupdateform").show(1000);
    $("#updateBtnDivEmp").show();
    $("#addBtnDivEmp").hide();
    $("#emp_no").val(emp_no);
    $("#fname").val(first_name);
    $("#lname").val(last_name);
    $("#bdate").val(birth_date);
    $("input[name=gender][value=" + gender + "]").prop('checked', true);
    return false;
});
}