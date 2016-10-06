<?php
$this->title = "文章列表";
?>
<div class="main">
	<div class="header">文章列表</div>
	<div class="oper">
		<a href="<?=ROOT_URL?>news/create" class='btn btn-primary'>添加文章</a>
	</div>
	<table class="mytable table table-bordered table-striped table-hover" id="title">
		<thead>
			<tr>
				<th class="col-sm-1">序号</th>
				<th>中文标题</th>
                <th>作者</th>
                <th>发布日期</th>
                <th>状态</th>
				<th>操作</th>
                <th>读取状态</th>
			</tr>
		</thead>
		<tbody>
			<?php
		 	//var_dump($users);
		 	foreach ($newsList as  $value) {
		 		echo "<tr>";
		 		echo "<td>".$value['id']."</td>";
		 		echo "<td>".$value['title_cn']."</td>";
                echo "<td>".$value['author']."</td>";
                echo "<td>".$value['publish_date']."</td>";
                echo "<td>".$value['publish_date']."</td>";
                echo "<td><a href='".ROOT_URL."news/detail?id=".$value['id']."'>查看</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='".ROOT_URL."news/update?id=".$value['id']."'>更改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:del('".$value['id']."','".$value['title_cn']."');\">删除</a></td>";
                echo "<td>".$value['read_status']."</td>";
		 		echo "</tr>";
		 	}
		 	?>
		</tbody>
	</table>
 	
    <script type="text/javascript">
    	$("#title").dataTable({
            //"lengthChange": false,
            "dom": 't<"col-sm-5"i>p',
            "ordering": false,
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sInfo": "共_TOTAL_条待阅读数据，展示_START_到_END_条数据",
                "sInfoEmpty": "无数据",
                "sInfoFiltered": "(从_MAX_条数据中的查询)",
                "sLengthMenu": "每页显示 _MENU_ 条数据",
                "sSearch":  "查找 _INPUT_ ",
                "sZeroRecords": " ",
                "oPaginate":{
                    "sPrevious":"上一页",
                    "sNext":"下一页",
                    "sLast":"尾页",
                    "sFirst":"首页"
                },
            },
            "iDisplayLength":10,
            // "aaSorting": [[3,'desc']]                  
        });

        function del(id,username)
        {
        	if(confirm("确定要删除文章 "+username+" 吗")){
        		$.post("<?=ROOT_URL?>news/delete",{id:id},function(){
        			window.location.reload();
        		});
        	}
        }
    </script>
</div>
