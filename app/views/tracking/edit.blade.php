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
        jQuery('#bs_time,#bf_time').datetimepicker({
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
                    <h2 class="panel-title">添加跟进 <input type="hidden" id="mid" value="{{ $trid }}"></h2>

                </div>
                <table class="table">

                    <tr>
                        <th>跟进项目</th>
                        <th>客户姓名</th>
                        <th>跟进人</th>
                        <th>跟单人员</th>
                        <th>合同报价</th>

                        <th>总结</th>
                    </tr>
                    <tr>
                        <td><input type="text" value="{{ $tracar['meeting_name'] }}" id="act_name"></td>
                        <td><input type="text" value="{{ $tracar['customer_name'] }}" id="cou_name"></td>
                        <td><input type="text" value="{{ $tracar['customer_manager'] }}" id="salesman"></td>
                        <td><input type="text" value="{{ $tracar['merchandiser'] }}" id="act_head"></td>
                        <td><input type="text" value="{{ $tracar['contract_price'] }}" id="price"></td>

                        <td><input type="text" value="{{ $tracar['summary_reason'] }}" id="summary"></td>
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
                            <input type="text" id="acc_theme">
                        </td>
                        <td colspan="2">访问时间：<input id="bs_time" name="bf_time">-<input id="bf_time" name="bf_time"></td>
                        <td>拜访对象：<input type="text" name="" id="cou_object"></td>
                        <td>客户经理：<input type="text" name="" id="manager" ></td>

                    </tr>
                    <tr>
                        <th>总结：</th>
                        <td colspan="4"><input id="vr_summary" name="remarks"></td>
                    </tr>
                    <tr>
                        <th>内容记录：</th>
                        <td colspan="4"><textarea  id="content" name="cont" style="width: 954px; height: 120px;"></textarea></td>
                    </tr>
                </table>

            </div>
            <div class="panel panel-default ">

                <table class="table">

                    <tr>
                        <th>添加跟进情况</th>
                        <td>状态：
                            <select id="stat"  name="stat" >
                                <option value="">请选择</option>
                                @foreach($statar as $stat)
                                    <option value="{{ $stat['type'] }}">{{ $stat['type'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>情况描述：<input type="text" id="situation_in"></td>

                    </tr>


                </table>
            </div>
            <div >
                <button  class="btn btn-success addType right" id="butadd">确认添加</button>
            </div>
        </form>
    </div>

</div>
<script src="{{ asset('scripts/tracking/edit.js') }}"></script>