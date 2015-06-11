
<div class="container">
    <div class="container m_left">
        <div class="row mar_b">

            <a href="custra/add" class="wu">添加跟进记录</a>
            <div class="mm_div ">
                每页显示

                <select class="mm_sel" value="">
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                </select>

            </div>
        </div>
        <div class="panel panel-default row mar_b">
            <div class="panel-heading">
                <h2 class="panel-title">客户跟进列表</h2>

            </div>
            <table class="table">
                <!-- <th>公司</th>-->
                <th>客户名称</th>
                <!-- <th>职位</th>-->
                <th>来源</th>

                <th>跟单人员</th>

                <th>最近报价情况</th>
                <th>最近拜访情况</th>
                <th>编辑人</th>
                <th>总结</th>
                <th></th>

                @foreach($tracr as $tracar)
                    <tr>

                        <td>{{ $tracar['customer'] }}</td>
                        <td>{{ $tracar['manager']}}</td>
                        <td>{{ $tracar['merchandiser'] }}</td>

                        <td>{{ $tracar['price'] }}</td>


                        <td>{{ $tracar['visit'] }}</td>


                        <td>{{ $tracar['editor'] }}</td>
                        <td>{{ $tracar['summary'] }}</td>
                        <td>
                            <a href="/trac/details?id={{ $tracar['id'] }}">查看详情</a>
                            <a href="/trac/edit?id={{ $tracar['id'] }}">编辑</a>
                        </td>
                    </tr>

                @endforeach

            </table>
        </div>
        <div class="row r_but">
            <a>当前第 2 页</a>
            <button>上一页</button>
            <button>下一页</button>
            共 5 页 &nbsp;&nbsp;<button class="btn-xs btn btn-success">跳转</button >&nbsp;&nbsp;到 第<input class="rb_tzy">页
        </div>
    </div>
    <div class="panel panel-default container m_right">
        <h3>条件筛选查看</h3>
        <form role="form">
            <div class="form-group">
                <label for="name">客户姓名</label>
                <input type="text" class="form-control" id="name" placeholder="请输入名称">
            </div>
            <div class="form-group">
                <label for="slte">合作状态</label>
                <select class="form-control" value="">
                    <option>开发中</option>
                    <option>活动进行中</option>
                    <option>合作成功</option>
                    <option>老客户维护</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">确定</button>
        </form>
    </div>
</div>
