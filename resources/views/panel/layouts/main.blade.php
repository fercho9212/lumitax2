<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('panel.layouts.partials.head')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    @include('panel.layouts.partials.header')

    @include('panel.layouts.partials.menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('panel.layouts.partials.content_header')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('panel.layouts.partials.aside_right')

    @include('panel.layouts.partials.footer')

</div><!-- ./wrapper -->

@section('scripts')
    @include('panel.layouts.partials.scripts')
@show

@yield('scripts_table')
@yield('code_script')
</body>
</html>
