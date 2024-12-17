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
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.4') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.4') }}">

    @stack('styles')
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
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('openModal', (el) => {
                if (el.length > 0) {
                    const myModal = new bootstrap.Modal(document.getElementById(el), {
                        backdrop: false,
                    })
                    myModal.show()
                    return false;
                }
            })

            Livewire.on('closeModal', (el) => {
                if (el.length > 0) {
                    $(el).modal('hide');
                    // $('.modal').modal('hide');
                    return false;
                }else{
                    $('.modal').modal('hide');
                    return false;
                }
            })

            Livewire.on('storeLocalStorage', (data) => {
                Alpine.store('data', data)
            });
        })
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
    @livewireChartsScripts
    @stack('scripts')
</body>

</html>
