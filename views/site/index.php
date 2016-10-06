<?php
$this->title = "首页";
?>
<div id="top" align="center"><img src="/pmsadmin/web/images/1.png" width=65% height=100%><div style="float:right;margin:5px 20px 0 0"></div></div>
<div id="left">
	<div id="userbox">
		<div  class="title" >欢迎您，<?=$_SESSION['username']?></div>
		<div class="logout"><a href="<?=ROOT_URL?>site/logout">退出登录</a></div>
	</div>
	<div id="slidebar">
		<a  class="title" >用户管理</a>
	    <ul id="" class="memu nav nav-pills nav-stacked  in" >
            <li class="acive"><a href="<?=ROOT_URL?>sysuser" target="rightframe">系统用户管理</a></li>
	    </ul>
		
	    <a  class="title"  >系统管理</a>
	    <ul id="" class="memu nav nav-pills nav-stacked  in" >

            <li class=""><a href="<?=ROOT_URL?>news" target="rightframe">文章管理管理</a></li>

    </ul>
	    	    
	</div>
</div>
<div id="right">
	<iframe src="<?=ROOT_URL?>people" name="rightframe" style="border:0;height:100%;width:100%"></iframe>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		resize();
		$(window).resize(function(){
			resize();
		});

		$("#slidebar li").click(function(){
			$("#slidebar li").removeClass("active");
			$(this).addClass("active");
		});
	});

	function resize(){
		var height = ($(window).height()-143)>$("#left").height()?($(window).height()-143):$("#left").height();
		//alert(height);
		$("#left").css("height",height+"px");
		$("#right").css("height",height+"px");
		$("#right").css("width",($(window).width()-270)+"px");
	}

</script>
