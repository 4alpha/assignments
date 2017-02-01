var sample = new Array();

function myfunc() {
  window.history.forward();
  var name=document.getElementById('name').value;
  var col=document.getElementById('clg').value;
  var per=document.getElementById('per').value;

  var student = new Object();
  student.name = name;
  student.col = col;
  student.per = per;

  sample.push(student);
  var str="";
  var str1="";
  for(var i=0;i<sample.length;i++) {
    str=sample[i];
    str1 = str1 + str.name + " " + str.col + " " + str.per + "<br>";
  }
  document.getElementById('output').innerHTML=str1;
}
