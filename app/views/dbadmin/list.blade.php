<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('_support.haed_style')
    <link href="{{ asset('styles/admin.css') }}" rel="stylesheet">

</head>
<body>
@include('_layouts.headnav');

<div class="container">
    <div class="container m_left">
        <div class="row mar_b">

            <h3></h3>
        </div>
        <div class="panel panel-default row mar_b">
            <div class="panel-heading">
                <h2 class="panel-title">类型列表</h2>

            </div>
            <table class="table" id="type_ta">
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>电话</th>
                    <th>手机</th>
                    <th>Email</th>
                    <th>QQ</th>
                    <th>微信</th>
                    <th>职位</th>
                    <th>最近一次登录</th>
                </tr>

                @for($i=0;$i<count($users);$i++)
                    <tr class="tyna">
                        <td name="idt"><input type="checkbox" name="vehicle"  id="cvc" value="Car">&nbsp;&nbsp;{{ $i+1 }}</td>
                        <td name="typet">{{ $users[$i]['username']  }}</td>
                        <td>{{ $users[$i]['name'] }}</td>
                        <td>{{ $users[$i]['sex'] }}</td>
                        <td>{{ $users[$i]['telephone'] }}</td>
                        <td>{{ $users[$i]['phone'] }}</td>
                        <td>{{ $users[$i]['email'] }}</td>
                        <td>{{ $users[$i]['qq'] }}</td>
                        <td>{{ $users[$i]['wechat'] }}</td>
                        <td>{{ $users[$i]['identity'] }}</td>
                        <td>{{ $users[$i]['lalt'] }}</td>
                        <td>
                            <a href="adminset?id={{ $users[$i]['id'] }}&do=edit">修改</a>
                            <a href="adminset?id={{ $users[$i]['id'] }}&do=delete">删除</a>
                        </td>
                    </tr>
                @endfor
            </table>

        </div>
        <div id="add_dta" class="panel panel-default row mar_b">

            <div class="panel-heading">
                <h4 class="panel-title">增加成员</h4>

            </div>
            <table class="table">
                <tr>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>初始密码</th>
                    <th>性别</th>
                    <th>手机号码</th>
                    <th>职位</th>

                </tr>
                <form  action="useradd"  method="post">
                <tr class="ttin">
                    <td><input type="text" name="username" id="username"></td>
                    <td><input type="text" name="name" id="name"></td>
                    <td><input type="text" name="password" id="password"></td>
                    <td>
                        <select id="sex" name="sex">
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
                    </td>
                    <td><input type="text" name="phone" id="phone"></td>
                    <td><input type="text" name="identity" id="identity"></td>
                </tr>
            </table>
            <button  class="btn btn-success btn-xs addType">确认添加</button>
            </form>

        </div>
        <div class="row r_but">

            <button id="sAdd">添加</button>
            <button id="sModify">修改</button>
            <button id="sDelete">删除</button>
        </div>
    </div>

</div>

@include('_support.foot_js')

</body>
</html>