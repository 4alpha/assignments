function timer() {
    var second = document.getElementById("iseconds").value;
    var id = setInterval(tcount,1000);
    function tcount() {
        if(second == 0) 
        clearInterval(id);
        else {
            document.getElementById("rseconds").value = second;
            second--;                       
        }
    }
}