
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
                    <h2 class="panel-title">编辑信息 </h2>

                </div>
                <table class="table">

                    <tr>
                        <th>基本信息</th>
                        <td >活动名称：<input id="activity_name" name="activity_name" value="{{ $meetar['activity_name'] }}" onfocus="if (value ==''){value =''}"></td>


                        <td>举办公司：<input id="company" name="company"  value="{{ $meetar['customer'] }}"></td>
                        <td>活动类型：
                            <select name="mety" id="meetype" value="{{ $meetar['meeting_type'] }}">
                                @foreach($metyar as $ar)
                                    <option value="{{ $ar['pname'] }}">{{ $ar['pname'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>

                            项目来源：
                            <select id="channels"  name="channels"  value="{{ $meetar['channels'] }}">
                                <option value="线上">线上</option>
                                <option value="线下">线下</option>
                            </select>
                            <select id="source_type" name="source_type"  value="{{ $meetar['source_type'] }}">
                                @foreach($optyar as $opty)
                                    <option value="{{ $opty['type'] }}">{{ $opty['type'] }}</option>
                                @endforeach
                            </select>

                        </td>
                    </tr>
                    <tr class="jhep">
                        <th>计划安排</th>
                        <td colspan="4">

                            <li>
                                客户经理：<input id="customer" name="customer"  value="{{ $meetar['customer'] }}">
                                活动负责人：<input id="activity_head" name="activity_head">
                            </li>
                            <li>
                                举办时间:
                                <input id="stime" name="start_time"  value="{{ $meetar['activity_start_time'] }}" class="time" type="text"> - <input id="ftime"  value="{{ $meetar['activity_finish_time'] }}" name="finish_time" class="time" type="text">
                            </li>
                            <li>举办地点：{{ $meetar['place'] }}<br />
                                <select name="prft" id="thepr">
                                    <option value="广东省">省内</option>
                                    <option value="外省">外省</option>
                                </select>

                                <select id="province"  name="province" >

                                    @foreach($proar as $pr)
                                        <option value="{{ $pr['pname'] }}">{{ $pr['pname'] }}</option>
                                    @endforeach
                                </select>
                                <select id="city"  name="city">

                                </select>
                                <input id="address" name="address" style="width:300px;">
                            </li>

                        </td>

                    </tr>
                    <tr>
                        <th>服务需求</th>
                        <td colspan="4" id="xpli">
                            @foreach($xpar as $xp)
                                <div ><input type="checkbox" value="{{ $xp['id'] }}" />{{ $xp['type'] }}<spen></spen></div>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>其他信息</th>
                        <td>活动规模：
                            <input id="scale" name="scale"  value="{{ $meetar['scale'] }}">
                        </td>
                        <td>
                        </td>
                        <td>举办周期：<input id="cycle" name="cycle"  value="{{ $meetar['meetings_cycle'] }}"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>备注：</th>
                        <td colspan="4"><input id="remarks" name="remarks"  value="{{ $meetar['remarks'] }}"></td>
                    </tr>
                    <input type="hidden" value="{{ $meetar['id'] }}" id="id">
                </table>

            </div>
            <div >
                <a href="/custra/add?id={{ $meetar['id'] }}" class="btn btn-success addType right">跟进</a>
                <button  class="btn btn-success addType right" id="butadd">确认修改</button>
            </div>
        </form>
    </div>

</div>

<script src="{{ asset('scripts/city2.js') }}"></script>
<script src="{{ asset('scripts/meeting/meeinptx.js') }}"></script>
<script src="{{ asset('scripts/meeting/mee_edit.js') }}"></script>
