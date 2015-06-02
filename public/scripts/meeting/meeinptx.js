$(document).ready(function() {
    //  为勾选服务需求后添加文本框
    $("#xpli div input:checkbox").prop("checked", false);
    $("#xpli div input:checkbox").click(function () {
        var tph = $(this).parent().html();
        if ($(this).is(':checked')) {

            var txt = $(this).parent().text();
            $(this).next("spen").html('<input type="text" style="width:400px;" />');

        } else {

            $(this).next("spen").html('');
        }

    });

    $("#activity_name").blur(function(){
        var act_name = $("#activity_name").val();
        if(act_name="请将填写的会议加上届数"){
            alert("请填写好会议名称");
        }
        $.post("/mee/dateyz",
            {
                act_name:act_name
            },
            function(data,status){
                if(data==2){
                    alert("此会议名称已有记录！请确认是否已经在数据中或更换会议名称");
                }
            }

        )
    })

});
