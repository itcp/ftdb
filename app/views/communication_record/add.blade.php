
<link href="{{ asset('styles/communication.css') }}" rel="stylesheet">
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
                        <td colspan="4">
                        	<select id="province"  name="province" >

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
                        <td>客户来源：
                            <select id="reason"  name="reason">


                                @foreach($rear as $rears)
                                    <option value="{{ $rears['type'] }}">{{ $rears['type'] }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>合作状态：
                        	<select id="rbs"  name="rbs">

                                @foreach($sty as $st)
                                    <option value="{{ $st['type'] }}">{{ $st['type'] }}</option>
                                @endforeach
                            </select>
                        </td>
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
<script src="{{ asset('scripts/city.js') }}"></script>
<script src="{{ asset('scripts/cus/add.js') }}"></script>
