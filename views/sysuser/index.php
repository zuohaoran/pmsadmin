<?php
$this->title = "系统用户列表";
?>
<div class="main">
	<div class="header">系统用户列表</div>
	<div class="oper">
		<a href="<?=ROOT_URL?>sysuser/create" class='btn btn-primary'>添加用户</a>
	</div>
	<table class="mytable table table-bordered table-striped table-hover" id="user">
		<thead>
			<tr>
				<th class="col-sm-1">序号</th>
				<th>用户名</th>
				<th>角色</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
		 	//var_dump($users);
		 	foreach ($userList as  $value) {
		 		echo "<tr>";
		 		echo "<td>".$value['id']."</td>";
		 		echo "<td>".$value['username']."</td>";
		 		switch ($value['role']) {
		 			case '1':
		 				echo "<td>管理员</td>";
		 				break;
		 			case '2':
					    echo "<td>信息维护员</td>";
						break;
		 			default:
		 				echo "<td></td>";
		 				break;
		 		}
		 		echo "<td><a href='".ROOT_URL."sysuser/update?id=".$value['id']."'>更改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"javascript:del('".$value['id']."','".$value['username']."');\">删除</a></td>";
		 		echo "</tr>";
		 	}
		 	?>
		</tbody>
	</table>
 	
    <script type="text/javascript">
    	$("#user").dataTable({
            //"lengthChange": false,
            "dom": 't<"col-sm-5"i>p',
            "ordering": false,
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sInfo": "共_TOTAL_条数据，展示_START_到_END_条数据",
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
        	if(confirm("确定要删除用户 "+username+" 吗")){
        		$.post("<?=ROOT_URL?>sysuser/delete",{id:id},function(){
        			window.location.reload();
        		});
        	}
        }
    </script>
</div>
