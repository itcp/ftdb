// JavaScript Document

//  设置类型添加功能
$(document).ready(function(){

    var url = location.search.substr(1);

        var ar = url.split(/[&=]/);
        var typeid = ar[1];

    var ta = document.getElementById('add_dta');

        ta.style.visibility='hidden';

    function tafun(){
        taft = true;
        ta.style.visibility='visible';

    }

    document.getElementById('sAdd').addEventListener('click',tafun);

    function addin(){

        var addInputVl=document.getElementById('addInput').value;

        $.post('http://localhost:8000/setupadd',
            {
                type:addInputVl,
                meun:typeid
            },
            function(data,status){
                $("#addInput").val("");
                alert(data);
                location.reload();

            });
    }
    document.getElementById('addType').addEventListener('click',addin);

    //  编辑修改类型
    //var bjty=function bjfun(){
    var tynale=document.getElementsByClassName("tyna").length;
    var i;
    for(i=0;i<tynale;i++) {
        var tynas = document.getElementsByClassName("tyna")[i].getElementsByTagName("td")[0].getElementsByTagName("input")[0];

    }

});
