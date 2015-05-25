// JavaScript Document

function glfun(){

    var yndo=confirm("你真的要退出！");
    if(yndo==true)
    {
       //alert(location.pathname);
        location.pathname='logout';
    }
}

document.getElementById('getLogout').addEventListener('click',glfun);