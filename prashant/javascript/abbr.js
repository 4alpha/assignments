String.prototype.abbr = function() {    
    var arr = this.split(" ");
    var arr1 = arr[1].split("");
    var arr2 = arr[0].concat(" ",arr1[0]);    
    return arr2;
}
function Abbr() {
     var str = document.getElementById("name").value;
     document.getElementById("lname").title = str;
     document.getElementById("lname").innerHTML = str.abbr();
}
