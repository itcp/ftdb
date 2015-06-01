$(document).ready(function(){
    //  为勾选服务需求后添加文本框
    $("#xpli div input:checkbox").prop("checked", false);
    $("#xpli div input:checkbox").click(function(){
        var tph=$(this).parent().html();
        if($(this).is(':checked')){

            var txt=$(this).parent().text();
            $(this).next("spen").html('<input type="text" style="width:400px;" />');

        }else{

            $(this).next("spen").html('');
        }

    });

    $("#butadd").click(function(){

        var act_naem = $("#activity_name").val();
        var company = $("#company").val();
        var meetype = $("#meetype").val();
        var channels = $("#channels").val();
        var source_ty = $("#source_type").val();

        var customer = $("#customer").val();
        var act_head = $("#activity_head").val();
        var stime = $("#stime").val();
        var ftime = $("#ftime").val();
        var thepr = $("#thepr").val();
        var province = $("#province").val();
        var city = $("#city").val();
        var address = $("#address").val();

        var ar = Array();

        var anu = 4;//$("#xpli div").length
        var xpli =document.getElementById('xpli').getElementsByTagName('div');
        var anu = xpli.length;
        for(var num= 0;num<anu;num++){
            if(xpli[num].getElementsByTagName('input')[0].checked){

                var ssl = xpli[num].getElementsByTagName('input')[0].value;
                var sss = xpli[num].textContent;
                var ssv = xpli[num].getElementsByTagName('spen')[0].getElementsByTagName('input')[0].value;

                ar[num]=[ssl, sss, ssv];
            }
        }
        var xpli = JSON.stringify(ar);

        var scals = $("#scals").val();
        var me_star = $("#me_star").val();
        var cycle = $("#cycle").val();
        var remarks = $("#remarks").val();

        
        vardump(xpli);
        exit;

        $.post("/meeadd",
            {
                company:company_v,

                remarks:remarks_v

            },

            function(data,status){

                if(data == 1){
                    alert( "成功");
                }else if(data == 2){
                    alert("未能添加通讯中，请重新提交！");
                }

            });



    })


});