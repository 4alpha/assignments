String.prototype.mask = function() {    
    var pos = this.indexOf("@");
    var mask = this.slice(2,pos);
    var maskstr =mask.replace(/[A-za-z0-9]/g,"*");
    var output = [this.slice(0,2), maskstr, this.slice(pos)].join('');
    return output; 
}
function mask() {
     var str = document.getElementById("mail").value;
     document.getElementById("para").innerHTML = str.mask();
}
    
    

