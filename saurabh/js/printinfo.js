var StudentInfo = [];
var str = "";
var i = 0;
function printInfo() {
  var student = { name : "", college : " ", percentage : "" };
  var stud;
  var college;
  var percentage;
  stud = document.getElementById("studName").value;
  college = document.getElementById("collegeName").value;
  percentage = document.getElementById("studPer").value;
  student.name = stud;
  student.college = college;
  student.percentage = percentage;
  StudentInfo.push(student);
  console.log(StudentInfo);
  for(; i < StudentInfo.length; i++) {
    str += StudentInfo[i].name;
    str += " ";
    str += StudentInfo[i].college;
    str += " ";
    str += StudentInfo[i].percentage;
    str += " ";
    str += "<br>";
  }
  document.getElementById("info").innerHTML = str;
}