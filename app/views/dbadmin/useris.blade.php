
<link href="{{ asset('styles/setup.css') }}" rel="stylesheet">
<div class="container">
    <div class="container useris">
        <div class="row mar_b">

            <h3></h3>
        </div>
        <div class="panel panel-default row mar_b">
            <div class="panel-heading">
                <h2 class="panel-title">我的资料</h2>

            </div>
            <form action="userup"  method="post">
            <table class="table">
                <tr>
                    <th></th>
                    <td></td>
                    <td>修改为</td>
                </tr>
                <tr>
                    <th style="width:100px;">用户名：</th>
                    <td>{{ $users['username'] }}</td>
                    <td><input name="username" ></td>
                </tr>
                <tr>
                    <th>姓名：</th>
                    <td>{{ $users['name'] }}</td>
                    <td><input name="name" ></td>
                </tr>
                <tr>
                    <th>性别：</th>
                    <td>{{ $users['sex'] }}</td>
                    <td>
                        <select id="sex" name="sex">
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>电话：</th>
                    <td>{{ $users['telephone'] }}</td>
                    <td><input name="telephone"  ></td>
                </tr>
                <tr>
                    <th>手机：</th>
                    <td>{{ $users['phone'] }}</td>
                    <td><input name="phone" ></td>
                </tr>
                <tr>
                    <th>Email：</th>
                    <td>{{ $users['email'] }}</td>
                    <td><input name="email" ></td>
                </tr>
                <tr>
                    <th>QQ：</th>
                    <td>{{ $users['qq'] }}</td>
                    <td><input name="qq"></td>
                </tr>
                <tr>
                    <th>微信：</th>
                    <td>{{ $users['wechat'] }}</td>
                    <td><input name="wechat" ></td>
                </tr>

            </table>
                <input type="hidden" name="id" value="{{ $users['id'] }}" />
                <button  class="btn btn-success btn-xs addType">编辑</button>
            </form>
        </div>


</div>
