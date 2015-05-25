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

        </div>
        <form  >
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h2 class="panel-title">添加客户信息 </h2>

            </div>
            <table class="table">

                    <tr>
                        <th>基本信息</th>
                        <td >公司名称：<input id="company" name="company"> </td>
                        <td>姓名：<input id="contact" name="contact" ></td>

                        <td>职位：<input id="position" name="position"> </td>
                        <td>性别：<select id="sex"  name="sex">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th>联系方式</th>
                        <td>电话：<input id="telephone" name="telephone"></td>
                        <td>手机：<input id="phone" name="phone"></td>
                        <td>邮箱：<input id="email" name="email"></td>
                        <td></td>

                    </tr>
                    <tr>
                        <th>地址：</th>
                        <td colspan="4"><select id="province"  name="province" >

                                @foreach($province as $pr)
                                    <option value="{{ $pr['id'] }}">{{ $pr['pname'] }}</option>
                                @endforeach
                            </select>
                            <select id="city"  name="city">

                            </select>
                            <input id="address" name="address" style="width:300px;">
                        </td>
                    </tr>
                    <tr>
                        <th>其他信息</th>
                        <td></td>
                        <td>客户来源：<input id="reason" name="reason" ></td>
                        <td>合作状态：<select id="rbs"  name="rbs">

                                @foreach($sty as $st)
                                    <option value="{{ $st['id'] }}">{{ $st['type'] }}</option>
                                @endforeach
                            </select></td>
                        <td>备注：<input id="remarks" name="remarks"></td>
                    </tr>

            </table>

        </div>
        <div >
            <button  class="btn btn-success addType right" id="butadd">确认添加</button>
        </div>
        </form>
    </div>

</div>
<script src="{{ asset('scripts/cus/comre.js') }}"></script>
<script src="{{ asset('scripts/cus/add.js') }}"></script>
@include('_support.foot_js')

</body>
</html>