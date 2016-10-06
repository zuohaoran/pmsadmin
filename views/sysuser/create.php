<?php
$this->title = "添加用户";
?>
<div class="main">
	<div class="header">添加用户</div>
	<div class="form-container">
		<form id="user-form" class="form-horizontal" action="<?=ROOT_URL?>sysuser/add" method="post">
			<div class="form-group">
				<label class="col-sm-4 control-label">用户登录名</label>
				<div class="col-sm-4">
					<input id="username" type="text" class="form-control required" name="username">
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">用户密码</label>
				<div class="col-sm-4">
					<input id="pass" type="password" class="form-control required" name="password">
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">确认密码</label>
				<div class="col-sm-4">
					<input id="passag" type="password" class="form-control required">
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">角色</label>
				<div class="col-sm-4">
					<select class="form-control" name="role">
						<option value="1">管理员</option>
						<option value="2">信息维护员</option>
					</select>
				</div>
			</div>
		 	<div class="form-group">
				<label class="col-sm-4 control-label"></label>
				<div class="col-sm-4">
					<input id="submitbtn" type="button" class="btn btn-primary col-sm-4" value="确定" style="margin-right:40px">
					<input id="goback" type="button" class="btn btn-danger col-sm-4" value="返回">
				</div>
			</div> 
		</form>
	</div>
</div>
<script type="text/javascript">
$("#submitbtn").click(function(){
	var required = $(".required");
	for(var i=0;i<required.length;i++){
		if($.trim($(required[i]).val()) == ""){
			$(".required").blur();
			return ;
		}
	}
	if(!usercheck($("#username").val())){
		return ;
	}
	if($("#pass").val() != $("#passag").val()){
		return ;
	}
	
	$("#user-form").submit();
});

$(".required").blur(function(){
	if($.trim($(this).val()) == "")
	{
		$(this).parent().siblings(".errormsg").text("不能为空");
	}
	else
	{
		$(this).parent().siblings(".errormsg").text("");
	}
});

$("#username").blur(function(){
	var username = $.trim($(this).val());
	if(username != "")
	{
		usercheck(username);
	}
});

$("#pass,#passag").blur(function(){
	var pass = $.trim($("#pass").val());
	var passag = $.trim($("#passag").val());
	if(pass != "" && passag != ""){
		//alert(1);
		if(pass == passag){
			$("#passag").parent().siblings(".errormsg").text("");
		}
		else
		{
			$("#passag").parent().siblings(".errormsg").text("两次输入密码不一致");
		}
	}
});

function usercheck(username){
	var flag = true;
	$.ajax({
		url:"<?=ROOT_URL?>sysuser/usercheck?username="+username,
		async:false,
		success:function(result){
			if(result == 1)
			{
				$("#username").parent().siblings(".errormsg").text("");
			}
			else{
				flag = false;
				$("#username").parent().siblings(".errormsg").text("用户名已存在");
			}
		}
	});
	return flag;
}

$("#goback").click(function(){
	if(confirm("确定返回吗")){
		window.location.href = "<?=ROOT_URL?>sysuser";
	}
});

</script>
