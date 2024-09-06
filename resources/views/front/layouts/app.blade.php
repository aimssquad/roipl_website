<!DOCTYPE html>
<html lang="en">
    @include('front.layouts.head')
    <body class="index-page">
        @include('front.layouts.navbar')

        <main class="main">
            @yield('content')
        </main>

        @include('front.layouts.footer')
        @include('front.layouts.script')
    </body>
</html>
