$(document).ready(function() {
    $('#butadd').click(function(){

        var company_v = $("#company").val();
        var contact_v = $("#contact").val();
        var position_v = $("#position").val();
        var sex_v = $("#sex").val();
        var telephone_v = $("#telephone").val();
        var phone_v = $("#phone").val();

        var email_v = $("#email").val();
       // var contact_v = $('#qq').val();

        var rbs_v = $("#rbs").val();

        var province_v = $("#province").val();
        var city_v = $("#city").val();
        var address_v = $("#address").val();
        var reason_v = $("#reason").val();
        var remarks_v = $("#remarks").val();

        //alert(company_v/n+contact_v);

        $.post("/cusadd",
            {
                company:company_v,
                contact:contact_v,
                position:position_v,
                sex:sex_v,
                telephone:telephone_v,
                phone:phone_v,
                email:email_v,
                rbs:rbs_v,
                province:province_v,
                city:city_v,
                address:address_v,
                reason:reason_v,
                remarks:remarks_v

            },

            function(data,status){

               if(data == 1){
                   alert( "成功");
               }else if(data == 2){
                   alert("未能添加通讯中，请重新提交！");
               }

            });
    });
    //sups);
});