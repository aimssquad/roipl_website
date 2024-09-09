<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.head')
    <body>
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')


            <main id="main" class="main">
                {{-- @include('admin.partials.pagetitle') --}}

                @yield('content')
            </main>


        @include('admin.layouts.footer')

        @include('admin.layouts.script')
    </body>
</html>
