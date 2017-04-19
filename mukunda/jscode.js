
      function check(){
           var name=document.getElementById("name").value;        
           var   pattern=/^[A-Za-z]+$/;              
           if(name.match(pattern)){
            document.getElementById("nameDiv").innerHTML="";
           } else{
             
             document.getElementById("nameDiv").innerHTML="Please enter valid name";
             document.getElementById("name").style.borderColor="red";
             }
       
           var cname=document.getElementById("cname").value;         
           var   pattern=/^[A-Za-z]+$/;;     
           if(cname.match(pattern)){
            document.getElementById("cnameDiv").innerHTML="";
           } else{
             document.getElementById("cnameDiv").innerHTML="Please enter valid college name";
             document.getElementById("cname").style.borderColor="red";
             }
      
           var mail=document.getElementById("mail").value;
           var   pattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;        
           if(mail.match(pattern)){
            document.getElementById("mailDiv").innerHTML="";
           } else{
             document.getElementById("mailDiv").innerHTML="Please enter valid mail id";
             document.getElementById("mail").style.borderColor="red";
             }
         
           var number=document.getElementById("number").value;
           console.log(number);
           var pattern=/^\d{10}$/;
                
           if(number.match(pattern)){
            document.getElementById("numberDiv").innerHTML="";
             
           } else{
             document.getElementById("numberDiv").innerHTML="Please enter valid number";
             document.getElementById("number").style.borderColor="red";
             } 
      }
      
    //