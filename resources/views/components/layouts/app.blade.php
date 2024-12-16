<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="diskominfo-oganilir">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kita Waspada">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/kita_waspada/fav.svg') }}">
    <!-- Page Title  -->
    <title>{{ isset($title) ? $title . ' | Kita Waspada Ogan Ilir' : 'Kita Waspada Ogan Ilir' }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.3') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.3') }}">
</head>

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">

            @livewire('components.header')

            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                {{ $slot }}
            </div>
            <!-- content @e -->
            @livewire('components.footer')
        </div>
        <!-- wrap @e -->
    </div>
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/charts/gd-invest.js?ver=3.1.3') }}"></script>
    <script src="{{ asset('assets/js/example-chart.js?ver=3.1.3') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
    @livewireChartsScripts
</body>

</html>
