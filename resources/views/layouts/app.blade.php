<!DOCTYPE html>
<html lang="pt-br">

    @include('components.head', ['seo' => $seo])

    <body>
        @include('components.header')
        {{-- @include('components.Menu') --}}

        <main id="top">
            @yield('content')
        </main>

        @include('components.footer')

        @include('components.scripts')

    </body>
</html>