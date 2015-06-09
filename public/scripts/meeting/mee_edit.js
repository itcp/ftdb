$(document).ready(function(){

    $("#butadd").click(function(){

        var id= $("#id").val();
        var act_name = $("#activity_name").val();
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

                ar[num] = [ssl, sss, ssv];
            }
        }

        // 由于 ar 这个数组的元素长度也是取 anu 最大限度循环得来的，当客户需求并不需要所有服务的时候，ar 中的成员就会有空值undefined，接下来这个for循环函数就是过滤掉空值的数组成员
        for(var i = num;i>=0;i--){
            if(ar[i]===undefined){
                ar.splice(i,1);
            }
        }

        var xpli = JSON.stringify(ar);

        var scale = $("#scale").val();
        var me_star = $("#me_star").val();
        var cycle = $("#cycle").val();
        var remarks = $("#remarks").val();

        $.post("/mee/edit",
            {
                id:id,
                act_name:act_name,
                company:company,
                meetype:meetype,
                channels:channels,
                source_ty:source_ty,

                customer:customer,
                act_head:act_head,
                stime:stime,
                ftime:ftime,
                thepr:thepr,
                province:province,
                city:city,
                address:address,

                xpli:xpli,

                scale:scale,
                me_star:me_star,
                cycle:cycle,
                remarks:remarks
            },

            function(data,status){
                alert(data);
                /*if(data == 1){
                 alert( "成功");
                 }else if(data == 2){
                 alert("未能添加通讯中，请重新提交！");
                 }*/

            });


    })


});