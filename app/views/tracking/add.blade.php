<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <Link Rel="SHORTCUT ICON" href="http://localhost:8000/logo.ico">
    <title></title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('_support.haed_style')
    <link href="{{ asset('styles/meeting.css') }}" rel="stylesheet" />
    <!--  加入jQuery-UI 及时间控件  -->
    <link href="{{ asset('scripts/timepicker-addon/jquery-ui-timepicker-addon.css') }}" rel="stylesheet" type="text/css" />
    <link type="text/css" href="{{ asset('scripts/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />


    <script type="text/javascript" src="{{ asset('scripts/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('scripts/timepicker-addon/jquery-ui-timepicker-addon.js') }}"></script>

    <script src="{{ asset('scripts/timepicker-addon/jquery.datepicker-zh-CN.js') }}"></script>
    <script src="{{ asset('scripts/timepicker-addon/i18n/jquery-ui-timepicker-zh-CN.js') }}"></script>
    <script type="text/javascript">
        jQuery(function () {
            // 时间设置
            jQuery('#stime,#ftime').datetimepicker({
                timeFormat: "HH:mm",
                dateFormat: "yy-mm-dd"
            });

        });
    </script>

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
                    <h2 class="panel-title">添加跟进 </h2>

                </div>
                <table class="table">

                    <tr>
                        <th>跟进项目</th>
                        <th>客户姓名</th>
                        <th>跟进人</th>
                        <th>跟单人员</th>
                        <th>合同报价</th>
                        <th>客户回访</th>
                        <th>总结</th>
                    </tr>
                    <tr>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                    </tr>


                </table>
                </div>
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h2 class="panel-title">添加拜访记录</h2>

                </div>
                <table class="table">
                    <tr>

                        <td>拜访主题：
                           <input type="text">
                        </td>
                        <td colspan="2">访问时间：<input id="bf_time" name="bf_time">-<input id="bf_time" name="bf_time"></td>
                        <td>拜访对象：<input type="text" name="" id=""></td>
                        <td>客户经理：<input type="text" name="" id=""></td>

                    </tr>
                    <tr>
                        <th>总结：</th>
                        <td colspan="4"><input id="remarks" name="remarks"></td>
                    </tr>
                    <tr>
                        <th>内容记录：</th>
                        <td colspan="4"><textarea  id="cont" name="cont" style="width: 954px; height: 120px;"></textarea></td>
                    </tr>
                </table>

            </div>
            <div class="panel panel-default ">

                <table class="table">

                    <tr>
                        <th>跟进情况</th>
                        <td>状态：
                            <select id="stat"  name="stat" >
                                <option value="">请选择</option>
                                @foreach($statar as $stat)
                                    <option value="{{ $stat['type'] }}">{{ $stat['type'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>情况描述：<input type="text"></td>

                    </tr>


                </table>
            </div>
            <div >
                <button  class="btn btn-success addType right" id="butadd">确认添加</button>
            </div>
        </form>
    </div>

</div>


<script src="{{ asset('scripts/city2.js') }}"></script>
<script src="{{ asset('scripts/meeting/meeinptx.js') }}"></script>
<script src="{{ asset('scripts/meeting/meeadd.js') }}"></script>
@include('_support.foot_js')

</body>
</html>