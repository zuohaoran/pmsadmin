<?php
$this->title = "登录";
?>
<div>
<style>
span.form-label{display:inline-block;width:70px;text-align:left;padding-right:5px;font-size: 16px;}
#sendvali{vertical-align: baseline;background-color: #f7f7f7;}
</style>
</div>
<div id="top" align="center"><img src="/pmsadmin/web/images/1.png" width=65% height=100%><div style="float:right;margin:5px 20px 0 0"></div></div>
<div class='' style="width:700px;height:300px;margin:50px auto;background-color:white;">
 <form action="<?=ROOT_URL?>site/dologin" method="post" onSubmit="return submitCheck();">
    <div style="padding:30px 0 0 200px ;">
        <div id="errmsg" style="margin-left:70px;height:25px;color:red;"><?=$msg?></div>
        <div class="form-group">
            <span class="form-label">用户名：</span><input  type="text" class="form-control" style="width:200px;display:inline;" id="username" name="username" placeholder="请输入用户名">
        </div>
        <div class="form-group">
            <span class="form-label">密码：</span><input  type="password" class="form-control" style="width:200px;display:inline;" id="password" name="password" placeholder="请输入密码"> <span ></span>
        </div>
        <br>
        <div style="width:100%;">
            <input id="submitdata" type='submit' class='btn btn-primary' style="width:270px;"  value='登录'>
        </div>
        <br>
    </div>
   </form>
</div>
<script type="text/javascript">
function submitCheck()
{
    if($.trim($("#username").val())=="" || $.trim($("#password").val())=="")
    {
        alert("请输入用户名和密码");
        return false;
    }
    return true;
}
</script>