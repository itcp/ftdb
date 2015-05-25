<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('_support.haed_style')
    <link href="{{ asset('styles/communication.css') }}" rel="stylesheet">

</head>
<body>

@include('_layouts.headnav')
<div class="container">
    <div class="container">
        <div class="row mar_b">


            <div class="mm_div ">
                每页显示

                <select class="mm_sel" value="">
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                </select>

            </div>
        </div>
        <form action="cusadd" method="post">
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h2 class="panel-title">添加客户信息 </h2>

            </div>
            <table class="table">
             <!--   <th>公司</th>
                <th>联系人</th>
                <th>职位</th>
                <th>电话</th>
                <th>手机</th>
                <th>邮箱</th>

                <th>地址</th>
                <th>合作状态</th>
                <th>客户来源</th>
                <th>增加时间</th>
                <th>编辑人</th>
                <th>备注</th>-->

                    <tr>
                        <th>基本信息</th>
                        <td >公司名称：<input name="company"> </td>
                        <td>姓名：<input name="contact" ></td>

                        <td>职位：<input name="position"> </td>
                        <td>性别：<select id="sex"  name="sex">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th>联系方式</th>
                        <td>电话：<input name="telephone"></td>
                        <td>手机：<input name="phone"></td>
                        <td>邮箱：<input name="email"></td>
                        <td>地址：<select id="province"  name="province">

                                @foreach($province as $pr)
                                    <option value="{{ $pr['id'] }}">{{ $pr['pname'] }}</option>
                                @endforeach
                            </select>
                            <select id="city"  name="city">

                                @foreach($city as $ciy)
                                    <option value="{{ $ciy['id'] }}">{{ $ciy['city_name'] }}</option>
                                @endforeach
                            </select>
                            <input name="address"></td>

                    </tr>
                    <tr>
                        <th>其他信息</th>
                        <td>QQ：<input name="qq" ></td>
                        <td>微信：<input name="wecaht" ></td>
                        <td>合作状态：<select id="sex"  name="rbs">

                                @foreach($sty as $st)
                                    <option value="{{ $st['id'] }}">{{ $st['type'] }}</option>
                                @endforeach
                            </select></td>
                        <td>备注：<input name="remarks"></td>
                    </tr>

            </table>

        </div>
        <div >
            <button  class="btn btn-success addType right">确认添加</button>
        </div>
        </form>
    </div>

</div>

@include('_support.foot_js')

</body>
</html>