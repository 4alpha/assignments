function Abbr() {
    var str = document.getElementById("name").value;
    var arr = str.split(" ");
    var arr1 = arr[1].split("");
    var arr2 = arr[0].concat(" ",arr1[0]);
    var str1 = arr2.toString();
    console.log(str1);
    var abbr = document.createElement("abbr").title=str;
    var txt = document.createTextNode(str);
    //abbr.appendChild(txt);
    document.body.appendChild(abbr);
    //document.getElementById("abbrName").appendChild = abbr;
    /*for(var i = 0; i < arr3.length; i++) {
        var tmp += arr3[i];
    }*/
    //document.getSelection("lname").
    //document.getElementById("lname").innerHTML= str1;
}