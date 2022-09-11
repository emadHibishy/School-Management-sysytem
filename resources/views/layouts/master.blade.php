@include('layouts.includes.head')
@include('layouts.includes.header')

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">
            @include('layouts.includes.sidebar')

            <!--=================================
           wrapper -->

            <div class="content-wrapper">

                @yield('content')

                @include('layouts.includes.footer')
            </div><!-- main content wrapper end-->
        </div>
    </div>
</div>

<!--=================================
 footer -->



@include('layouts.includes.scripts')
</body>
</html>
