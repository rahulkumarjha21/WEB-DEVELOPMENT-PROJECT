function validateImage() {
    var a=document.getElementById("file");
    if(a.files.length!=0) {
        var b=document.getElementById('label1');
        b.innerHTML=a.files.item(0).name;
    }
}
function verify4() {
    var text=document.getElementById("question").value;
    text=text.trim();
    if(text.length===0) {
        alert("Invalid Text Format");
        return(false);
    }
    return(true);
}