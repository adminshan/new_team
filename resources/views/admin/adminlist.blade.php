<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
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
    <title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <a href="/adminadd" class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
        </span>
        <span class="r">共有数据：<strong>54</strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="9">员工列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="40">ID</th>
            <th width="150">登录名</th>
            <th width="90">手机</th>
            <th width="150">邮箱</th>
            {{--<th>角色</th>--}}
            <th width="130">加入时间</th>
            <th width="130">最后登录时间</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($adminInfo as $k=>$v)
        <tr class="text-c">
            <td><input type="checkbox" value="1" name=""></td>
            <td>{{$v['uid']}}</td>
            <td>{{$v['uname']}}</td>
            <td>{{$v['tel']}}</td>
            <td>{{$v['email']}}</td>
            {{--<td>{{$v['role_name']}}</td>--}}
            <td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
            @if(!empty($v['last_login_time']))
                <td>{{date('Y-m-d H:i:s',$v['last_login_time'])}}</td>
            @else
                <td></td>
            @endif
            <td class="td-manage">
                <a title="编辑" href="/adminupdate/{{$v['uid']}}" >
                    <i class="Hui-iconfont">&#xe6df;</i>
                </a>
                <a title="删除" class="del" uid="{{$v['uid']}}"  href="javascript:;" >
                    <i class="Hui-iconfont">&#xe6e2;</i>
                </a>
                <a  href="/userrole/{{$v['uid']}}" >
                    角色
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    //删除
    $(document).on('click','.del',function(){
        var uid=$(this).attr('uid');
        //alert(role_id)
        $.ajax({
            url:"/adminDel",
            type:"post",
            data:{uid:uid},
            dataType:"json",
            success:function(data){
                alert(data.msg)
                if(data.code ==0){
                    location.href ="/adminlist";
                }
            }
        })
    })


</script>
</body>
</html>