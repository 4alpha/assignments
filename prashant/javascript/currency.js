String.prototype.currency = function() {
    var num = this;
    var p = num.split(".");
    var chars = p[0].split("").reverse();
    var newstr = '';
    var count = 0;
    for (x in chars) {
        count++; 
        if(count %3 == 1 && count != 1)  {
            newstr = chars[x] + ',' + newstr;
        } else {
            newstr = chars[x] + newstr;
        }
    }
    return "$" +newstr + "." + p[1];;
}
function Format() {
     var num = document.getElementById("num").value;
     document.getElementById("para").innerHTML = num.currency();
}