String.prototype.slug = function () {
    var arr = this.split(" ");
    var output = arr.join("-");
    return output;
}
function slug() {
var str = document.getElementById("str").value;    
document.getElementById("para").innerHTML = str.slug();
}



