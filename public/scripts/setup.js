// JavaScript Document

//  设置类型添加功能
$(document).ready(function(){

    var url = location.search.substr(1);

        var ar = url.split(/[&=]/);
        var typeid = ar[1];

    var ta = document.getElementById('add_dta');
    ta.style.visibility='hidden';
    function tafun(){

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
                alert(data);
            });
    }
    document.getElementById('addType').addEventListener('click',addin);

    //  编辑修改类型
    //var bjty=function bjfun(){
    var tynale=document.getElementsByClassName("tyna").length;
    var i;
    for(i=0;i<tynale;i++) {
        var tynas = document.getElementsByClassName("tyna")[i].getElementsByTagName("td")[0].getElementsByTagName("input")[0];
       // if(tynas.prop("")=="checked"){
        //    document.getElementsByClassName("tyna")[i].css({"color":"#888"});
            //document.getElementsByClassName("tyna")[i].style.color = 'red';
       // }
        //tynas.prop("checked")=

    }


               // document.getElementById('sModify').onclick=btc;

          //  }
        //}
    //}
   // sMbj = new bjty();
    //sMbj.tehicle();

})
