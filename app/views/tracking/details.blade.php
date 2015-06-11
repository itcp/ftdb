<div class="container">
    <div class="container">
        <div class="row mar_b">

        </div>
        <form  >
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <h2 class="panel-title">添加跟进 <input type="hidden" id="mid" value=""></h2>

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
                        <td>{{ $tracar['meeting_name'] }}</td>
                        <td>{{ $tracar['customer_name'] }}</td>
                        <td>{{ $tracar['customer_manager'] }}</td>
                        <td>{{ $tracar['merchandiser'] }}</td>
                        <td>{{ $tracar['contract_price'] }}</td>
                        <td>{{ $tracar['visit'] }}</td>
                        <td>{{ $tracar['summary_reason'] }}</td>
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
                        <th>跟进情况</th>
                        <td>状态：
                            <select id="stat"  name="stat" >
                                <option value="">请选择</option>

                            </select>
                        </td>
                        <td>情况描述：<input type="text" id="situation_in"></td>

                    </tr>


                </table>
            </div>
            <div >
                <button  class="btn btn-success addType right" id="butadd"></button>
            </div>
        </form>
    </div>

</div>