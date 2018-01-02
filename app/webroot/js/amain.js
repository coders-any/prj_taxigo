// process form
$('#search-button').click(function(e){
    $('.glyphicon-collapse').toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
})
function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
        .removeAttr('checked').removeAttr('selected');
}
$("#reset").click(function() {
    resetForm($('#form_site'));
    return false;
});

$('.sendcode').on('click',function(){
	if($('input[name=message_type]').is(':checked')) { 
		var message_type = $('input[name=message_type]:checked').val();
		var phone_id_call = $( "#phone_id_call option:selected" ).val();
		$.ajax({
			url: '/ajax/bookingsms',
			type: 'POST',
			data:{message_type:message_type,phone_id_call:phone_id_call}
		}).done(function(response){
			var item = $.parseJSON(response);
			if(item.status == 'Success'){
				$('.smscode').show();
				$('.choosetype').hide();
				$('.ses').append('<input type="hidden" value="'+item.response+'" id="sescode" >');
			}else{
				alert('Cant send code sms');
				$('.choosetype').show();
			}
		})
	}else{
		alert('pls choose type send code');
	}
});

$('.addcode').on('click', function(){
	var ses = $('#sescode').val();
	var ask_pin = $('#smscode').val();

	if(ask_pin == ''){
		alert('pls add code sms');
	}else{
		$.ajax({
			url: '/ajax/confirmphone',
			type: 'POST',
			data: {ses:ses,ask_pin:ask_pin}
		}).done(function(response){
			var item = $.parseJSON(response);
			if(item.status == 'Success'){
				alert('Success!!');
			}else{
				alert('Fail');
			}
		})
	}
	//console.log(ses);
})

$('.verifysend').on('click', function(){
	var verificationCode = $('#verifycode').val();

	if(verificationCode == ''){
		alert('pls add verify code');
	}else{
		$.ajax({
			url: '/ajax/ExpediaVerifyEmail',
			type: 'POST',
			data: {verificationCode:verificationCode}
		}).done(function(response){
			var item = $.parseJSON(response);
			if(item.status == 'Success'){
				alert('Success!!');
			}else{
				alert('Fail');
			}
		})
	}
})

$(".messbtn").on("click",function(){
	var comment = $("textarea#comment").val();
	comment=comment.replace(/(<([^>]+)>)/ig,"");
	if(comment != ''){
		$.ajax({
			type: 'POST',
			url: '/ajax/postcomment',
			data: {comment:comment,user:userid,thread_id:thread_id,inbox_id:inbox_id}
		}).done(function(response){
			var item = $.parseJSON(response);
			if(item.status == 'Success'){
				location.reload();
			}else{
				alert('Fail');
			}
		})
	}else{
		alert('pls add comment!');
	}
})

$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
})


//$(document).ready(function() {
	$(".searchajax input").on("click", function(){
	//var room_id =$(".searchajax input").data("id");
	$(this).tokenInput('/ajax/connectairjson', {
        theme: "facebook",
        preventDuplicates: true,
		crossDomain: true,
		onAdd: function (item) {
			var x = $( this ).parent().parent().find("input.form-control").data("id");
			var plan = $( this ).parent().parent().find("input.form-control").data("plan");
			var cost = $( this ).parent().parent().find("input.form-control").data("cost");
			//console.log($( this ).parent().parent().parent().get(0));
			$.ajax({
				type: 'POST',
				url: '/ajax/updated_cn_rooms',
				data:{type:'added',val:item.id,room:x,plan_id:plan,cost_id:cost}
			}).done(function(response){
				//alert("Added " + x);
			})
         },
         onDelete: function (item) {
         	var x = $( this ).parent().parent().find("input.form-control").data("id");
         	var plan = $( this ).parent().parent().find("input.form-control").data("plan");
         	var cost = $( this ).parent().parent().find("input.form-control").data("cost");
            $.ajax({
				type: 'POST',
				url: '/ajax/updated_cn_rooms',
				data:{type:'delete',val:item.id,room:x,plan_id:plan,cost_id:cost}
			}).done(function(response){
				//alert("Delete " + item.id);
			})
        },
        /*onResult:function(data){ 
		    var exists={};
		    $($(this).val().split(",")).each(function(i,val){
		        exists[val]=true;
		    });                 
		    return $.grep(data,function(val){
		        return !(exists[val.id]);
		    });
		}*/
    });

    /*$("#search").tokenInput('/ajax/connectairjson', {
    	theme: "facebook",
    	preventDuplicates: true,
    	crossDomain: true,
    	prePopulate: [
            {id: 123, name: "Slurms MacKenzie"},
            {id: 555, name: "Bob Hoskins"},
            {id: 9000, name: "Kriss Akabusi"}
        ]
    });*/

})

/*$(".searchajax input").on("change",function(){
	var val = $(this).val()
	var room = $(this).data("id");
	$.ajax({
		type: 'POST',
		url: '/ajax/updated_cn_rooms',
		data:{room:room,val:val}
	}).done(function(response){

	})
})*/

$(".connnectlogin").on("click",function(){
	var accid = $(this).data("id");
	var siteid = $(this).data("site");
	//console.log(siteid);
	//$("#myModal").modal();
	$.ajax({
		type: 'POST',
		url: '/ajax/checklogin',
		data: {siteid:siteid,accid:accid}
	}).done(function(response){
		var item = $.parseJSON(response);
		if(item.status == 'ok'){
			$("#key").val(item.key);
			$("#id").val(item.id);
			$("#user_id").val(item.user_id);
			$("#csrfTokenArr").val(item.csrfTokenArr);
			$("#myModal").modal();
		}if(item.status == 'okied'){
			location.reload();
		}else{
			alrt('Can\'t connecting to account!!!');
			location.reload();
		}
	})
})

$(".inportrooms").on("click",function(){
	var accid = $(this).data("id");
	var siteid = $(this).data("site");
	$.ajax({
		type: 'POST',
		url: '/ajax/inportrooms',
		data: {accid:accid,siteid:siteid}
	}).done(function(response){
		var item = $.parseJSON(response);
		if(item.status == 'ok'){
			location.reload();
		}else{
			alrt('Inport rooms fail!!!');
		}
	})
})

$(".verified").on("click", function(){
	var ecode = $("#codeverify").val();
	var accid = $(".connnectlogin").data("id");
	var siteid = $(".connnectlogin").data("site");
	var key = $("#key").val();
	var id = $("#id").val();
	var user_id = $("#user_id").val();
	var csrfTokenArr = $("#csrfTokenArr").val();
	if(ecode == ''){
		console.log($("#user_id").val());
		alert('pls add code verify')
	}else{
		$.ajax({
			type: 'POST',
			url: '/ajax/ecodeairbnb',
			data:{ecode:ecode,accid:accid,key:key,id:id,user_id:user_id,csrfTokenArr:csrfTokenArr,siteid:siteid}
		}).done(function(res){
			var item = $.parseJSON(res);
			if(item.status == 'ok'){
				$("#myModal").modal("hide");
				location.reload();
			}else{
				$("#message").text(item.message)
				//alert('The code you provided is incorrect. Please try again.');
			}
		})
	}
})

//reload page inbox
$(".reloadpage").on("click", function(){
	location.reload();
})