$(document).ready(function(){

   // $("#company td:eq(0)").text("fas");
    //$("#company td:eq(1) input").val("fas");

  /*  $("#cused").click(function() {
        //alert('');
        var id_v = $("#id").val();
        var comp_v = $("#company td:eq(1) input").val();
        var cont_v = $("#contact td:eq(1) input").val();
        var sex_v = $("#sex td:eq(1) input").val();
        var posi_v = $("#position td:eq(1) input").val();

        var tele_v = $("#telephone td:eq(1) input").val();


        var phone_v = $("#phone td:eq(1) input").val();
        var email_v = $("#email td:eq(1) input").val();

        var pro_v = $("#address td:eq(1) input:eq(0)").val();
        var city_v = $("#address td:eq(1) input:eq(1)").val();
        var addre_v = $("#address td:eq(1) input:eq(2)").val();

        //var reas_v=$("#reason td:eq(1) input").val();
        var rbs_v = $("#rbs td:eq(1) input").val();
        var rem_v = $("#remarks td:eq(1) input").val();

        $.post("/cus/poed",
            {
                id: id_v,
                company: comp_v,
                contact: cont_v,
                sex: sex_v,
                position: posi_v,
                telephone: tele_v,
                phone: phone_v,
                email: email_v,
                province: pro_v,
                city: city_v,
                address: addre_v,
                rbs: rbs_v,
                remarks: rem_v
            },
            function (data, status) {

                if (data == 1) {
                    comp_v = '';
                    cont_v = '';
                    posi_v = '';

                    tele_v = '';
                    phone_v = '';
                    email_v = '';

                    addre_v = '';

                    rem_v = '';

                    /*$("#company td:eq(0)").val();

                     $("#contact td:eq(0)").val();
                     $("#position td:eq(0)").val();
                     $("#sex td:eq(0)").val();
                     $("#telephone td:eq(0)").val();
                     $("#phone td:eq(0)").val();
                     $("#email td:eq(0)").val();
                     $("#address td:eq(0)").val();
                     $("#reason td:eq(0)").val();
                     $("#rbs td:eq(0)").val();

                     $("#remarks td:eq(0)").val(rem_v);*/
               /* } else if (data == 2) {
                    alert("未能添加通讯中，请重新提交！");
                }

            });

    });*/

    $("#cused").click(function(){
        var id_v = $("#id").val();
        var comp_v = $("#company td:eq(1) input").val();
        var cont_v = $("#contact td:eq(1) input").val();
        var sex_v = $("#sex td:eq(1) select").val();
        var posi_v = $("#position td:eq(1) input").val();

        var tele_v = $("#telephone td:eq(1) input").val();


        var phone_v = $("#phone td:eq(1) input").val();
        var email_v = $("#email td:eq(1) input").val();

        var pro_v = $("#address td:eq(1) select:eq(0)").val();
        var city_v = $("#address td:eq(1) select:eq(1)").val();
        var addre_v = $("#address td:eq(1) input").val();

        //var reas_v=$("#reason td:eq(1) input").val();
        var rbs_v = $("#rbs td:eq(1) select").val();
        var rem_v = $("#remarks td:eq(1) input").val();

        $.post("/cus/poed",
            {
                id: id_v,
                company: comp_v,
                contact: cont_v,
                sex: sex_v,
                position: posi_v,
                telephone: tele_v,
                phone: phone_v,
                email: email_v,
                province: pro_v,
                city: city_v,
                address: addre_v,
                rbs: rbs_v,
                remarks: rem_v
            },

            function(data,status){
               // alert(data);
                if(data.ft == 1){
                    alert('修改成功');
                    $("#company td:eq(0)").text(comp_v);

                    $("#contact td:eq(0)").text(cont_v);
                    $("#position td:eq(0)").text(posi_v);
                    $("#sex td:eq(0)").text(sex_v);
                    $("#telephone td:eq(0)").text(tele_v);
                    $("#phone td:eq(0)").text(phone_v);
                    $("#email td:eq(0)").text(email_v);
                    $("#address td:eq(0)").text(data.add);

                    $("#rbs td:eq(0)").text(rbs_v);

                    $("#remarks td:eq(0)").text(rem_v);
//
                    $("#company td:eq(1) input").val("");
                    $("#contact td:eq(1) input").val("");
                    $("#position td:eq(1) input").val("");
                    $("#telephone td:eq(1) input").val("");

                    $("#phone td:eq(1) input").val("");
                    $("#email td:eq(1) input").val("");

                    $("#address td:eq(1) input").val("");

                    $("#remarks td:eq(1) input").val("");


                }else if(data.ft == 2){
                    alert("未能添加通讯中，请重新提交！");
                }
            });
    });
});