<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials._head')
</head>

<body>
    <div id="app">
        @include('layouts.partials._navigation')
        <div class="contianer">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8"> <!-- Limits alert width -->
                    @include('layouts.partials._alerts')
                </div>
            </div>

            <main class="py-2">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>