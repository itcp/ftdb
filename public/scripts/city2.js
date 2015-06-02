$(document).ready(function(){

    var pr = '';
    var ptwc = function(){
        pr = $("#province").val();

        $.post("/cityn",
            {
                proname:pr
            },

            function(data,status){
                var cjj=new Array();
                var cob = eval(data);
                // var ri =false;
                var  ri = cob.length;
                for(var i= 0;i<ri;i++){
                    // 使用 append() 函数循环遍历并串连起来，不能用html()函数，用html()函数只会输入最后一个
                    $("#city").append('<option value="'+cob[i].city_name+'">'+cob[i].city_name+'</option>');

                }

            });
    }
    $('#province').click(function(){
        $("#city").html('<OPTION VALUE="0">请选择所在城市 </OPTION>');
    });

    $("#province").blur(ptwc);

});