$(document).ready(function(){

   // $("#company td:eq(0)").text("fas");
    //$("#company td:eq(1) input").val("fas");

    $("button").click(function(){
        var comp_v=$("#company td:eq(1) input").val();
        var posi_v=$("#position td:eq(1) input").val();

        var tele_v=$("#telephone td:eq(1) input").val();


        var phone_v=$("#phone td:eq(1) input").val();
        var email_v=$("#email td:eq(1) input").val();

        var pro_v=$("#address td:eq(1) input:eq(0)").val();
        var city_v=$("#address td:eq(1) input:eq(1)").val();
        var addre_v=$("#address td:eq(1) input:eq(2)").val();

        var reas_v=$("#reason td:eq(1) input").val();
        var rbs_v=$("#rbs td:eq(1) input").val();
        var rem_v=$("#remarks td:eq(1) input").val();

        $.post("/cus/poed",
            {

            },
            function(data,status){

                if(data == 1){
                     comp_v='';
                     posi_v='';

                     tele_v='';


                     phone_v='';
                     email_v=$("#email td:eq(1) input").val();

                     pro_v=$("#address td:eq(1) input:eq(0)").val();
                     city_v=$("#address td:eq(1) input:eq(1)").val();
                     addre_v=$("#address td:eq(1) input:eq(2)").val();

                    reas_v=$("#reason td:eq(1) input").val();
                     rbs_v=$("#rbs td:eq(1) input").val();
                     rem_v=$("#remarks td:eq(1) input").val();
                }else if(data == 2){
                    alert("未能添加通讯中，请重新提交！");
                }

            }
        )


    })
});