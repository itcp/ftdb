<!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->

<!--
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>

<!--[if lt IE 9]>
<script src="{{ asset('scripts/es5-shim/es5-shim.js') }}"></script>
<script src="{{ asset('scripts/json3/lib/json3.min.js') }}"></script>
<![endif]-->

<!-- build:js(.) scripts/vendor.js -->
<!-- bower:js -->

<script src="{{ asset('scripts/angular/angular.js') }}"></script>
<script src="{{ asset('scripts/json3/lib/json3.js') }}"></script>

<script src="{{ asset('scripts/angular-resource/angular-resource.js') }}"></script>
<script src="{{ asset('scripts/angular-cookies/angular-cookies.js') }}"></script>
<script src="{{ asset('scripts/angular-sanitize/angular-sanitize.js') }}"></script>
<script src="{{ asset('scripts/angular-animate/angular-animate.js') }}"></script>
<script src="{{ asset('scripts/angular-touch/angular-touch.js') }}"></script>
<script src="{{ asset('scripts/angular-route/angular-route.js') }}"></script>

<script src="{{ asset('scripts/comgn.js') }}"></script>
<!-- endbower -->
<!-- endbuild -->

<!-- build:js({.tmp,app}) scripts/scripts.js -->
<script src="{{ asset('scripts/app.js') }}"></script>
<script src="{{ asset('scripts/controllers/main.js') }}"></script>
<script src="{{ asset('scripts/controllers/about.js') }}"></script>

<!-- endbuild -->