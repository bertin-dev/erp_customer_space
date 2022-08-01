@include('layouts.entete')
@if (isset($ViewType))
@include("pages.$ViewType.$View")
@include("layouts.specialFooter")
@else
    @include('layouts.header')

    @if (isset($views))
    <main class=" p-3 " style="min-height: 100vh;"">
        @include($views)
    </main>
    @else
        <main class=" py-3 " style="min-height: 100vh;"">
            hello
            <!--@yield('content')-->
        </main>
    @endif

    @include('layouts.footer')
@endif
