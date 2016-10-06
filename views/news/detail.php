<?php
$this->title = "查看新闻";
?>
<div class="main">
	<div class="header">查看文章</div>
	
	<div class="detail-container" style="">
		<table class="table table-bordered table-striped">
			<tbody>
				<tr><th class="col-sm-2">英文标题</th><td><?= $news['title_en']?></td></tr>
				<tr><th>中文标题</th><td><?= $news['title_cn']?></td></tr>
				<tr><th>作者</th><td><?= $news['author']?></td></tr>
				<tr><th>发布时间</th><td><?= $news['publish_date']?></td></tr>
				<tr><th>英文内容</th><td><?= $news['content_en']?></td></tr>
				<tr><th>中文内容</th><td><?= $news['content_cn']?></td></tr>
				
			</tbody>
		</table>
	</div>
	<div class="oper" style="margin-left:200px;">
		<a class="btn btn-primary" href="<?=ROOT_URL?>news/update?id=<?=$_GET['id']?>">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index" class="btn btn-danger">返回</a>
	</div>
</div>
