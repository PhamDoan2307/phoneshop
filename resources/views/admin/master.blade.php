@include('admin.blocks.header')
<body class="navbar-top">

<!-- Main navbar -->
@include('admin.blocks.main-navbar')
        <!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('admin.blocks.sidebar')
                <!-- /main sidebar -->


        <!-- Main content -->
        @yield('content')
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
