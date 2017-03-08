    
    var studarr = [];
    function studentfun() {
        
    var sname = document.getElementById("sname").value;
    var sclass = document.getElementById("sclass").value;
    var percentage = document.getElementById("per").value;
    
    var student = new Object();
    student.sname = sname;
    student.sclass = sclass;
    student.percentage = percentage;
    studarr.push(student);
    var tmp="";
    for(var i=0; i < studarr.length; i++) {
        
       tmp+= studarr[i].sname +" "+ studarr[i].sclass +" "+studarr[i].percentage +"<br />";
       console.log(tmp); 
 }
 document.getElementById("demo").innerHTML = tmp;

    }
