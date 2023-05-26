<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('inc.head')
<body>
    <div id="app">
        @include('inc.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('inc.scripts')
</body>
</html>
