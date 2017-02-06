
      var i;
      var arr=[ ];
      var text=" ";
      document.getElementById("mybtn").onclick = displayInfo;
      
      function student(studentName, studentCollage, studentper) {
        this.studentName= studentName;
        this.studentCollage= studentCollage;
        this.studentper = studentper;
        
      }

      function displayInfo() {
        var studentName=document.getElementById("Name1").value;
        var studentCollage=document.getElementById("colg").value;
        var studentper=document.getElementById("per").value;
        var stud= new student(studentName,studentCollage,studentper);
        
        arr.push(stud);
        for (i = 0; i < arr.length; i++) {
          text += arr[i].studentName+" " + arr[i].studentCollage+" " + arr[i].studentper+"<br>";
        };
        console.log(arr);
        document.getElementById("demo").innerHTML=text;
        text=" ";
        
      }
