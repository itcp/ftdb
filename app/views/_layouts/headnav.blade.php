<nav class="navbar navbar-inverse ">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="/home">客户通迅录</a></li>
            <li><a href="/meeting">会议活动</a></li>
            <li><a href="/custra">客户跟进</a></li>
            <li><a href="/adminset">成员管理</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">设置</a>
                <ul class="dropdown-menu navbar-inverse" >
                    <li><a style="color:#1c86ff;" href="/useris">我的信息</a></li>
                    @foreach($type as $typear)
                        <li><a style="color:#1C86EE;" href="/setup?meun={{ $typear['id'] }}">{{ $typear['name'] }}</a></li>
                    @endforeach

                </ul>
            </li>
        </ul>
        <div class="tu_ri">
            <div class="username" >{{ $yy }}</div>
            <button id="getLogout" >退出</button>
        </div>
    </div>
</nav>