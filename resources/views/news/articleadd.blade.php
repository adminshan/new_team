<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>添加管理员 - 管理员管理 </title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <div class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>导航栏名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  name="navName">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网页方法：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  name="navUrl">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  name="navSorce">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否展示：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="radio" name="is_show" value="1">是
                <input type="radio" name="is_show" value="2">否
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </div>
</article>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $("#form-admin-add").validate({
            rules:{
                navName:{
                    required:true,
                    minlength:4,
                    maxlength:16
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
        });
        $('.btn').click(function(){
            var nav_name = $("input[name='navName']").val();
            if(nav_name==''){
                alert('导航栏标题不能为空');
                return  false;
            }
            var nav_url = $("input[name='navUrl']").val();
            if(nav_url==''){
                alert('网页方法不能为空');
                return  false;
            }
            var nav_sorce = $("input[name='navSorce']").val();
            if(nav_sorce==''){
                alert('排序不能为空');
                return  false;
            }
            var is_show = $("input[name='is_show']:checked").val();
            $.ajax({
                url:"/articleadd/do",
                type:"post",
                data:{nav_name:nav_name,nav_url:nav_url,nav_sorce:nav_sorce,is_show:is_show},
                dataType:"json",
                success:function(data){
                    alert(data.msg);
                    if(data.code ==0){
                        location.href ="/articlelist";
                    }
                }
            })
        })
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>