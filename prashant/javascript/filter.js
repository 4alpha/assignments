function CreateElement() {
    var input = document.getElementById("eleName").value;
    var str = input.concat("  X")onclick ;
    var btn = document.createElement("BUTTON");
    var txt = document.createTextNode(str);
    btn.appendChild(txt);
    
    document.body.appendChild(btn);
  
}
function DeleteElement() {
    
}