function button1() {
    document.getElementById("form1").style.display="block";
    document.getElementById("form2").style.display="none";
    document.getElementById("opt1").style.textDecoration="underline";
    document.getElementById("opt2").style.textDecoration="none";
}
function button2() {
    document.getElementById("form1").style.display="none";
    document.getElementById("form2").style.display="block";
    document.getElementById("opt1").style.textDecoration="none";
    document.getElementById("opt2").style.textDecoration="underline";
}
function button3() {
    var email=document.getElementById("email2").value;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        document.getElementById("button").value="Resend Otp";
    }
    else {
        alert("Invalid Email Id");
        return (false);
    }
    return(true);
}
function verify1() {
    var password=document.getElementById("password").value;
    var regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm)
    if(regex.test(password)==false) {
        alert("* Password should only have alpha numeric letters");
        return(false);
    }
    return(true);
}
function verify2() {
    var name=document.getElementById("name2").value;
    name=name.trim();
    var regex=new RegExp(/^[A-Za-z0-9 .]{1,}$/gm);
    if(regex.test(name)==false) {
        alert("* Full Name only have alpha numeric letters with spaces and .");
        return(false);
    }
    var tel=document.getElementById("tel").value;
    regex=new RegExp(/^[0-9]{10}$/gm)
    if(regex.test(tel)==false) {
        alert("* Invalid Mobile Number Format");
        return(false);
    }
    var password=document.getElementById("password2").value;
    regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm)
    if(regex.test(password)==false) {
        alert("* Password should only have alpha numeric letters");
        return(false);
    }
}
function resetPassword() {
    var password1=document.getElementById("password1").value;
    var regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm);
    if(regex.test(password1)==false) {
        alert("* Password Password should only have alpha numeric letters");
        return(false);
    }
    var password2=document.getElementById("password2").value;
    regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm);
    if(regex.test(password2)==false) {
        alert("* New Password should only have alpha numeric letters");
        return(false);
    }
    if(password1!=password2){
        alert("* Both Password Must Be Same ");
        return(false);
    }
    return (true);
}