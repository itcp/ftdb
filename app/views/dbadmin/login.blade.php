<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    @include('_support.haed_style')

</head>
<div class="container">

    {{ Form::open(array('url'=>'admin/login')) }}

    @if ($errors->has('login'))

        <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>

    @endif

    <div class="control-group">

        {{ Form::label('username', '用户名：') }}

        <div class="controls">

            {{ Form::text('username') }}

        </div>
    </div>

    <div class="control-group">

        {{ Form::label('password', '密码：') }}

        <div class="controls">

            {{ Form::password('password') }}

        </div>
    </div>

    <div class="form-actions">

        {{ Form::submit('登录', array('class' => 'btn btn-inverse btn-login')) }}

    </div>

    {{ Form::close() }}

</div>

    @include('_support.foot_js')

</body>
</html>
