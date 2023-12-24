@include('admin.partials.header')
    
@include('admin.partials.topnavbar')

<div class="d-flex align-items-stretch">
        
    <!-- Sidebar Navigation-->
    
@include('admin.user.sidebar')

    <!-- Sidebar Navigation end-->
    <!-- main body -->

@yield('content')

    <!-- main body ends -->

@include('admin.partials.footer')