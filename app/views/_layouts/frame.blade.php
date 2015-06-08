<!doctype html>
<html class="no-js" ng-app>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('_support.haed_style')
    <link href="{{ asset('styles/communication.css') }}" rel="stylesheet">

</head>
<body>

{{ $nav }}
{{ $content }}

@include('_support.foot_js')

</body>
</html>