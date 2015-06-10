$(document).ready(function(){

    $("#butadd").click(function(){

		var mid = $("#mid").val();
        var act_name = $("#act_name").val();
        var cou_name = $("#cou_name").val();
		var salesman = $("#act_head").val();
		var act_head = $("#price").val();
		var visit = $("#visit").val();
		var summary = $("#summary").val();
		
		
		var acc_theme = $("#acc_theme").val();
		var bs_time = $("#bs_time").val();
		var bf_time = $("#bf_time").val();
		var cou_object = $("#cou_object").val();
		var manager = $("#manager").val();
		var summary = $("#summary").val();
		var content = $("#content").val();
		
		var stat = $("#stat").val();
		var situation = $("situation").val();
		
        $.post("/trac/poadd",
            {
				mid:mid,
                act_name:act_name,
                cou_name:cou_name,
				salesman:salesman,
				act_head:act_head,
				visit:visit,
				summary:summary,
				
				acc_theme:acc_theme,
				bs_time:bs_time,
				bf_time:bf_time,
				cou_object:cou_object,
				manager:manager,
				summary:summary,
				content:content,
				
				stat:stat,
				situation:situation
            },

		function(data,status){
			alert(data);

		});

    })


});