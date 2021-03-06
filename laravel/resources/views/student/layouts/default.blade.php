<!DOCTYPE html>
<html lang="en">
<head>
    @include('global.includes.head')
</head>
<body>
    <div id="wrapper">
        @include('student.includes.navigation')
        <!-- Page Content -->
        <div id="page-wrapper" style="margin:0px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@if (isset($__env->getSections()['page_title']))@yield('page_title')@else @yield('title')@endif</h1>
                        @yield('content')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    @include('global.includes.foot')
</body>
</html>