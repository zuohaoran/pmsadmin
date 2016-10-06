<?php
$this->title = "更改用户";
?>
<div class="main">
	<div class="header">更改用户</div>
	<div class="form-container">
		<form id="user-form" class="form-horizontal" action="<?=ROOT_URL?>sysuser/modify" method="post">
			<input type="hidden" name="id" value="<?=$user['id']?>">
			<div class="form-group">
				<label class="col-sm-4 control-label">用户登录名</label>
				<div class="col-sm-4">
					<input id="username" type="text" class="form-control" value="<?=$user['username']?>" disabled>
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">用户密码</label>
				<div class="col-sm-4">
					<input id="pass" type="password" class="form-control" name="password">
				</div>
				<div class="errormsg col-sm-3" style="color:black">(如果不修改密码，请将此项留空)</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">确认密码</label>
				<div class="col-sm-4">
					<input id="passag" type="password" class="form-control">
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">角色</label>
				<div class="col-sm-4">
					<select class="form-control" name="role">
						<option value="1" <?php if($user['role'] == '1') echo "selected";?>>管理员</option>
						<option value="2" <?php if($user['role'] == '2') echo "selected";?>>信息维护员</option>
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

	if($("#pass").val() != $("#passag").val()){
		return ;
	}
	
	$("#user-form").submit();
});

$("#pass,#passag").blur(function(){
	var pass = $.trim($("#pass").val());
	var passag = $.trim($("#passag").val());
	
	if(pass == passag){
		$("#passag").parent().siblings(".errormsg").text("");
	}
	else
	{
		$("#passag").parent().siblings(".errormsg").text("两次输入密码不一致");
	}

});

$("#goback").click(function(){
	if(confirm("确定返回吗")){
		window.location.href = "<?=ROOT_URL?>sysuser";
	}
});

</script>
