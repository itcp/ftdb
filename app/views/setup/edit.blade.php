
<link href="{{ asset('styles/setup.css') }}" rel="stylesheet">
<div class="container">
    <div class="container m_left">
        <div class="row mar_b">


        </div>
        <div class="panel panel-default row mar_b">
            <div class="panel-heading">
                <h2 class="panel-title">{{ $type_name }} &nbsp;&nbsp;&nbsp;类型修改</h2>

            </div>
            <table class="table" id="type_ta">
                <tr>

                    <th>类型</th>
                    <th>编辑人</th>
                    <th>添加时间</th>
                </tr>

               <form action="setuped"  method="post">
                    <tr class="tyna">

                        <td><input type="text" name="type" value="{{ $type['type']  }}"></td>
                        <td>{{ $type['editor'] }}</td>
                        <td>{{ $type['editor_time'] }}</td>
                        <td>
                            <input type="hidden" name="id" value="{{ $type['id'] }}" />
                            <input type="hidden" name="meun" value="{{ $_GET['meun'] }}" />
                            <button >确定修改</button>

                        </td>
                    </tr>
               </form>
            </table>

        </div>

    </div>

</div>
