
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
                        <td >活动名称：{{ $meet['activity_name'] }}</td>


                        <td>举办公司：{{ $meet['customer'] }}</td>
                        <td>活动类型：{{ $meet['meeting_type'] }}</td>
                        <td>
                            项目来源：{{ $meet['channels'] }}-{{ $meet['source_type'] }}

                        </td>
                    </tr>
                    <tr class="jhep">
                        <th>计划安排</th>
                        <td colspan="4">

                            <li>
                                客户经理：{{ $meet['salesman'] }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                活动负责人：{{ $meet['activity_head'] }}
                            </li>
                            <li>
                                举办时间:
                                {{ $meet['activity_start_time'] }}&nbsp;&nbsp;至&nbsp;&nbsp;{{ $meet['activity_finish_time'] }}
                            </li>
                            <li>举办地点：
                                {{ $meet['place'] }}
                            </li>

                        </td>

                    </tr>
                    <tr>
                        <th>服务需求</th>

                        <td colspan="4" id="xpli">
                            @foreach($serdes as $serda)
                                <div><b>{{ $serda['service_name'] }}</b>{{ $serda['conent'] }}</div>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>其他信息</th>
                        <td>活动规模：
                            {{ $meet['scale'] }}
                        </td>
                        <td>活动状态：
                            {{ $meet['the_active_state'] }}
                        </td>
                        <td>举办周期：{{ $meet['meetings_cycle'] }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>备注：</th>
                        <td colspan="4">{{ $meet['remarks'] }}</td>
                    </tr>
                </table>

            </div>
            <div >
                <a href="/mee/editor?id={{ $meet['id'] }}" class="editor">编辑</a>
            </div>
        </form>
    </div>

</div>


<script src="{{ asset('scripts/city2.js') }}"></script>
<script src="{{ asset('scripts/meeting/meeinptx.js') }}"></script>
<script src="{{ asset('scripts/meeting/meeadd.js') }}"></script>
