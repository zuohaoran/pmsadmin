<?php
$this->title = "更改文章";
?>
<div class="main">
	<div class="header">更改文章</div>
	<div class="form-container">
		<form id="title-form" class="form-horizontal" action="modify" method="post">
			<input type="hidden" name="id" value="<?=$news['id']?>">
			<div class="form-group">
				<label class="col-sm-2 control-label">英文标题</label>
				<div class="col-sm-4">
					<input type="text" class="form-control required" name="title_en" value="<?=$news['title_en']?>">
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">中文标题</label>
				<div class="col-sm-4">
					<input type="text" class="form-control required" name="title_cn" value="<?=$news['title_cn']?>">
				</div>
				<div class="errormsg col-sm-3"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">作者</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="author" value="<?=$news['author']?>">
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">英文内容</label>
				<div class="col-sm-9">
					<script type="text/javascript" charset="utf-8" src="<?= Yii::getAlias('@web')?>/ueditor/ueditor.config.js"></script>
					<script type="text/javascript" charset="utf-8" src="<?= Yii::getAlias('@web')?>/ueditor/ueditor.all.min.js"> </script>
					<script id="content_en" name="content_en" type="text/plain" style="width:100%;height:300px;"></script>
				</div>
				<div class="errormsg col-sm-2"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">中文内容</label>
				<div class="col-sm-9">
					<script id="content_cn" name="content_cn" type="text/plain" style="width:100%;height:300px;"></script>
				</div>
				<div class="errormsg col-sm-2"></div>
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
var editor_content_en = UE.getEditor("content_en");
var editor_content_cn = UE.getEditor("content_cn");
editor_content_en.ready(function(){
    editor_content_en.setContent(<?=json_encode($news['content_en']) ?>);
});
editor_content_cn.ready(function(){
    editor_content_cn.setContent(<?=json_encode($news['content_cn']) ?>);
});
$("#submitbtn").click(function(){
	var required = $(".required");
	for(var i=0;i<required.length;i++){
		if($.trim($(required[i]).val()) == ""){
			$(".required").blur();
			return ;
		}
	}
	
	$("#title-form").submit();
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

$("#goback").click(function(){
	if(confirm("确定返回吗")){
		window.location.href = "index";
	}
});

</script>
