<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <Link Rel="SHORTCUT ICON" href="http://localhost:8000/logo.ico">
    <title>凤腾数据库</title>
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
                        <td >活动名称：<input id="company" name="company"> </td>
                        <td>活动类型：
                            <select name="mety">
                                @foreach($metyar as $ar)
                                    <option value="{{ $ar['id'] }}">{{ $ar['pname'] }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>举办公司：<input id="position" name="position"> </td>
                        <td>项目来源：
                            <select id=""  name="channels">
                                <option value="线上">线上</option>
                                <option value="线下">线下</option>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <th>计划安排</th>
                        <td>客户经理：<input id="telephone" name="telephone"></td>
                        <td>活动负责人：<input id="phone" name="phone"></td>
                        <td>
                            举办地点：
                            <select name="prft">
                                <option value="广东省">省内</option>
                                <option value="外省">外省</option>
                            </select>
                            <select id="province"  name="province" >

                                @foreach($proar as $pr)
                                    <option value="{{ $pr['id'] }}">{{ $pr['pname'] }}</option>
                                @endforeach
                            </select>
                            <select id="city"  name="city">

                            </select>
                            <input id="address" name="address" style="width:300px;">

                        </td>
                        <td>举办时间:
                            <input id="" name="start_time" > - <input id="" name="finish_time">
                        </td>

                    </tr>
                    <tr>
                        <th>服务需求：</th>
                        <td colspan="4">fjAJFASJF<br />fafaf<br />fafaf<br />s</td>
                    </tr>
                    <tr>
                        <th>其他信息</th>
                        <td>活动规模：
                            <input id="" name="scale">
                        </td>
                        <td>活动状态：
                            <select id="mestar"  name="mestar">

                                @foreach($mestar as $st)
                                    <option value="{{ $st['type'] }}">{{ $st['type'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>举办周期：<input id="remarks" name="cycle"></td>
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