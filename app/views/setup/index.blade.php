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
    <div class="container m_left">
        <div class="row mar_b">

            <h3>{{ $type_name }}</h3>
        </div>
        <div class="panel panel-default row mar_b">
            <div class="panel-heading">
                <h2 class="panel-title">类型列表</h2>

            </div>
            <table class="table" id="type_ta">
                <tr>
                    <th>ID</th>
                    <th>类型</th>
                    <th>编辑人</th>
                    <th>添加时间</th>
                </tr>

                @for($i=0;$i<count($type);$i++)
                <tr class="tyna">
                    <td name="idt"><input type="checkbox" name="vehicle"  id="cvc" value="Car">&nbsp;&nbsp;{{ $i+1 }}</td>
                    <td name="typet">{{ $type[$i]['type']  }}</td>
                    <td>{{ $type[$i]['editor'] }}</td>
                    <td>{{ $type[$i]['editor_time'] }}</td>
                    <td>
                        <a href="setup?meun={{ $_GET['meun'] }}&do=edit&id={{ $type[$i]['id'] }}">修改</a>
                        <a href="setup?meun={{ $_GET['meun'] }}&do=delete&id={{ $type[$i]['id'] }}">删除</a>
                    </td>
                </tr>
                @endfor
            </table>

        </div>
        <div id="add_dta" class="panel panel-default row mar_b">

            <table class="table">
                <tr>

                    <td>增加类型：<input type="text" id="addInput"></td>
                    <td>本人</td>
                    <td>此时</td>
                </tr>
            </table>
            <button id="addType" class="btn btn-success btn-xs addType">确认添加</button>


        </div>
        <div class="row r_but">

            <button id="sAdd">添加</button>
            <button id="sModify">修改</button>
            <button id="sDelete">删除</button>
        </div>
    </div>

</div>
<script src="{{ asset('scripts/setup.js') }}"></script>
@include('_support.foot_js')

</body>
</html>