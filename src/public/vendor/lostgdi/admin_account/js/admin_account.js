
function button_remove(id)
{
	var answer = confirm("确认删除吗？")
	if (!answer) return;
	
	$.ajax({
		type: "DELETE",
		url:"/admin_account/"+id,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
		data:{
		},
		success: function(msg){
			//alert(msg);
			self.location.reload();
		},
		error:function(XmlHttpRequest,textStatus, errorThrown){
			//alert("fail:"+XmlHttpRequest.responseText);
		}
	});
}

function button_modify_show(obj,id)
{
	//
	$.ajax({
		type: "GET",
		url:"/admin_account/"+id,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
		data:{
		},
		success: function(msg){
			//alert(msg);
			dataObj = eval("("+msg+")");
			$("#myModal_modify").find("input[name='username']").val(dataObj["username"]);
			$("#myModal_modify").find("input[name='real_name']").val(dataObj["real_name"]);
			$("#myModal_modify").find("input[name='real_name']").val(dataObj["real_name"]);
			$("#myModal_modify").find("input[name='password']").val("");
			$("#myModal_modify").find("input[name='id']").val(dataObj["id"]);
			$('#myModal_modify').modal('show');
		},
		error:function(XmlHttpRequest,textStatus, errorThrown){
			//alert("fail:"+XmlHttpRequest.responseText);
		}
	});
}

function button_modify()
{
	if( $("#myModal_modify").find("input[name='password']").val()!=$("#myModal_modify").find("input[name='password2']").val() )
	{
		alert("密码和确认密码不一致!");
		return;
	}

	var id = $("#myModal_modify").find("input[name='id']").val();
	$.ajax({
		type: "PUT",
		url:"/admin_account/"+id,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
		data:{
			"username":$("#myModal_modify").find("input[name='username']").val(),
			"password":$("#myModal_modify").find("input[name='password']").val(),
			"real_name":$("#myModal_modify").find("input[name='real_name']").val(),
		},
		success: function(msg){
			//alert(msg);
			//dataObj = eval("("+msg+")");
			self.location.reload();
		},
		error:function(XmlHttpRequest,textStatus, errorThrown){
			//alert("fail:"+XmlHttpRequest.responseText);
		}
	});
}

function button_add_show()
{
	$('#myModal_add').modal('show');
}

function button_add()
{
	if( $("#myModal_add").find("input[name='username']").val()=="" )
	{
		alert("用户名不能为空!");
		$("#myModal_add").find("input[name='username']").focus();
		return;
	}

	if( $("#myModal_add").find("input[name='password']").val()=="" )
	{
		alert("密码不能为空!");
		$("#myModal_add").find("input[name='password']").focus();
		return;
	}

	if( $("#myModal_add").find("input[name='password2']").val()=="" )
	{
		alert("确认密码不能为空!");
		$("#myModal_add").find("input[name='password2']").focus();
		return;
	}

	if( $("#myModal_add").find("input[name='password']").val()!=$("#myModal_add").find("input[name='password2']").val() )
	{
		alert("密码和确认密码不一致!");
		return;
	}

	$.ajax({
		type: "POST",
		url:"/admin_account?random="+(new Date()).getTime(),
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
		data:{
			"username":$("#myModal_add").find("input[name='username']").val(),
			"password":$("#myModal_add").find("input[name='password']").val(),
			"real_name":$("#myModal_add").find("input[name='real_name']").val(),
		},
		success: function(msg){
			//alert(msg);
			dataObj = eval("("+msg+")");
			if( dataObj["message"]=="success" )
			{
				alert("Added!");
				self.location.reload();
			}
			else
			{
				for( var key in dataObj["message_array"] )
				{
					alert(dataObj["message_array"][key]);
				}

			}
		},
		error:function(XmlHttpRequest,textStatus, errorThrown){
			//alert("fail:"+XmlHttpRequest.responseText);
		}
	});
}


