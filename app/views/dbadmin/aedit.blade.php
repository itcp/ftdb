
<link href="{{ asset('styles/admin.css') }}" rel="stylesheet">
<div class="container">
    <div class="container m_left">
        <div class="row mar_b">

            <h3></h3>
        </div>

        <div id="add_dta" class="panel panel-default row mar_b">

            <div class="panel-heading">
                <h4 class="panel-title">编辑成员</h4>

            </div>
            <table class="table">
                <tr>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>手机号码</th>
                    <th>职位</th>

                </tr>
                <form action="usered" method="post">
                    <tr class="ttin">
                        <td><input type="text" name="username" value="{{ $urs['username'] }}" id="username"></td>
                        <td><input type="text" name="name" value="{{ $urs['name'] }}" id="name"></td>

                        <td>
                            <select id="sex" value="{{ $urs['sex'] }}" name="sex">
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </td>
                        <td><input type="text" name="phone" value="{{ $urs['phone'] }}" id="phone"></td>
                        <td><input type="text" name="identity" value="{{ $urs['identity'] }}" id="identity"></td>
                        <td>
                            <input type="hidden" name="id" value="{{ $urs['id'] }}" />
                            <button  class="btn btn-success btn-xs addType">确认修改</button>
                        </td>


                    </tr>
            </table>

            </form>

        </div>

    </div>

</div>
