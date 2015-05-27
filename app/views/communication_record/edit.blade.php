<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('_support.haed_style')
    <link href="{{ asset('styles/setup.css') }}" rel="stylesheet">

</head>
<body>
@include('_layouts.headnav');

<div class="container">
    <div class="container useris">
        <div class="row mar_b">

            <h3></h3>
        </div>
        <div class="panel panel-default row mar_b" style="width:700px;">
            <div class="panel-heading">
                <h2 class="panel-title">我的资料</h2>

            </div>
            <form>
                <table class="table">
                    <tr>
                        <th></th>
                        <td></td>
                        <td>修改为</td>
                    </tr>
                    <tr id="company">
                        <th style="width:100px;">公司名称：</th>
                        <td>{{ $cus['company'] }}</td>
                        <td><input name="company" ></td>
                    </tr>
                    <tr id="contact">
                        <th>姓名：</th>
                        <td>{{ $cus['contact'] }}</td>
                        <td><input name="contact" ></td>
                    </tr>
                    <tr id="sex">
                        <th>性别：</th>
                        <td>{{ $cus['sex'] }}</td>
                        <td>
                            <select id="sex" name="sex">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="position">
                        <th >职位：</th>
                        <td>{{ $cus['position'] }}</td>
                        <td><input name="position"  ></td>
                    </tr>
                    <tr id="telephone">
                        <th >电话：</th>
                        <td>{{ $cus['telephone'] }}</td>
                        <td><input name="telephone"  ></td>
                    </tr>
                    <tr id="phone">
                        <th >手机：</th>
                        <td>{{ $cus['phone'] }}</td>
                        <td><input name="phone" ></td>
                    </tr>
                    <tr id="email">
                        <th>Email：</th>
                        <td>{{ $cus['email'] }}</td>
                        <td><input name="email" ></td>
                    </tr>
                    <tr id="address">
                        <th>地址：</th>
                        <td>{{ $cus['address'] }}</td>
                        <td>
                            <select id="province"  name="province" >
                                @foreach($province as $pr)
                                    <option value="{{ $pr['id'] }}">{{ $pr['pname'] }}</option>
                                @endforeach
                            </select>
                            <select id="city"  name="city">

                            </select>
                            <input  name="address" style="width:300px;">
                        </td>
                    </tr>
                    <tr id="reason">
                        <th>客户来源：</th>
                        <td>{{ $cus['reason'] }}</td>
                        <td>不可修改</td>
                    </tr>
                    <tr id="rbs">
                        <th>合作状态：</th>
                        <td>{{ $cus['relationship_between_state'] }}</td>
                        <td>
                            <select id="rbs"  name="rbs">

                                @foreach($sty as $st)
                                    <option value="{{ $st['id'] }}">{{ $st['type'] }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr id="remarks">
                        <th>备注：</th>
                        <td>{{ $cus['remarks'] }}</td>
                        <td><input name="remarks" ></td>
                    </tr>
                </table>
                <input type="hidden" id="id" name="id" value="{{ $cus['id'] }}" />
                <button id="cused"  class="btn btn-success btn-xs addType">编辑</button>
            </form>
        </div>


    </div>
    <script src="{{ asset('scripts/cus/comre.js') }}" ></script>
    <script src="{{ asset('scripts/cus/poed.js') }}" ></script>

    @include('_support.foot_js')

</body>
</html>