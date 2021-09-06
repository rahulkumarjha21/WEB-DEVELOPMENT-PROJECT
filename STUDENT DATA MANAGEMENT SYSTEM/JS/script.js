function validateFun1()
{
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    var regex=new RegExp(/^[0-9]{10,}$/gm);
    if(regex.test(username)==false)
    {
        alert("INVALID USERNAME: ALL CHARACTER MUST BE IN NUMERIC");
        return(false);
    }
    regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm)
    if(regex.test(password)==false)
    {
        alert("INVALID PASSWORD: ALL CHARACTER MUST BE IN EITHER NUMERIC OR ALPHABET");
        return(false);
    }
    return(true);
}
function validateFun2()
{
    var username=document.getElementById("username").value;
    var regex=new RegExp(/^[0-9]{10,}$/gm);
    if(regex.test(username)==false)
    {
        alert("INVALID USERNAME: ALL CHARACTER MUST BE IN NUMERIC");
        return(false);
    }
    return(true);
}
function validateFun3()
{
    var name=document.getElementById("name").value;
    name=name.trim();
    var password=document.getElementById("password").value;
    var regex=new RegExp(/^[A-Za-z0-9 .]{1,}$/gm);
    if(regex.test(name)==false)
    {
        alert("INVALID FULL NAME: ALL CHARACTER MUST BE IN NUMERIC OR ALPHABET WITH EITHER INCLUDING BLANK SPACE");
        return(false);
    }
    regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm)
    if(regex.test(password)==false)
    {
        alert("INVALID PASSWORD: ALL CHARACTER MUST BE IN EITHER NUMERIC OR ALPHABET");
        return(false);
    }
    return(true);
}
function validateFun4()
{
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    var regex=new RegExp(/^[0-9]{10,}$/gm);
    if(regex.test(username)==false)
    {
        alert("INVALID USERNAME: ALL CHARACTER MUST BE IN NUMERIC");
        return(false);
    }
    var name=document.getElementById("name").value;
    name=name.trim();
    regex=new RegExp(/^[A-Za-z0-9 .]{1,}$/gm);
    if(regex.test(name)==false)
    {
        alert("INVALID FULL NAME: ALL CHARACTER MUST BE IN NUMERIC OR ALPHABET WITH EITHER INCLUDING BLANK SPACE");
        return(false);
    }
    regex=new RegExp(/^[0-9A-Za-z]{5,}$/gm)
    if(regex.test(password)==false)
    {
        alert("INVALID PASSWORD: ALL CHARACTER MUST BE IN EITHER NUMERIC OR ALPHABET");
        return(false);
    }
    return(true); 
}
function validateFun5()
{
    var name=document.getElementById('name').value;
    name=name.trim();
    regex=new RegExp(/^[A-Za-z0-9 .]{1,}$/gm);
    if(regex.test(name)==false)
    {
        alert("INVALID FULL NAME: ALL CHARACTER MUST BE IN NUMERIC AND ALPHABET WITH EITHER INCLUDING BLANK SPACE");
        return(false);
    }
    return(true);
}
function validateImage()
{
    var a=document.getElementById("profilephoto");
    if(a.files.length!=0)
    {
        var b=document.getElementById('label1');
        b.innerHTML=a.files.item(0).name;
    }
    
}
function printDiv() 
{
    var div = document.getElementById("div2").innerHTML;
    var a = window.open('', '', 'height=800, width=600');
    a.document.write('<html>');
    a.document.write('<body > <h1>STUDENT DATABASE DETAILS</h1><br>');
    a.document.write(div);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}