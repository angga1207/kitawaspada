<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

?>
<div>
    <div class="">

        <div class="d-flex justify-content-between align-items-center gap-y-3">
            <div class="text-xl font-semibold">
                Peta Usaha di {{ $kecamatan ? $kecamatan : 'Kabupaten Ogan Ilir' }}
            </div>

            <div class="mb-3">
                <button type="button" @click="Livewire.dispatch('resetCenter')" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-sync"></i>
                    Reset Map
                </button>

                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#modalFilter">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
            </div>
        </div>


        <div wire:ignore>
            <div class="rounded-5" style="height: calc(100vh - 200px)" x-init="
                const map = L.map($el);

                const info = L.control({
                    position: 'topleft'
                });

                info.onAdd = function(map) {
                    this._div = L.DomUtil.create('div', 'bg-white rounded');
                    this.update();
                    return this._div;
                };

                info.update = function(props) {
                    // const contents = props ? props : 'Geser mouse ke peta';
                    const contents = props ? props : '';
                    this._div.innerHTML = contents;
                };
                info.addTo(map);

                // Fullscreen control
                const fullscreen = L.control.fullscreen({
                    position: 'topright'
                }).addTo(map);

                // Tiles
                const googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                    attribution: '&copy; Diskominfo Kabupaten Ogan Ilir',
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                });
                const googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
                    attribution: '&copy; Diskominfo Kabupaten Ogan Ilir',
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                }).addTo(map);
                const googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                    attribution: '&copy; Diskominfo Kabupaten Ogan Ilir',
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                });
                const googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                });
                const baseLayers = {
                    'Google Street': googleStreets,
                    'Google Satelite': googleSat,
                    'Google Terrain': googleTerrain,
                    'Google Hybrid': googleHybrid,
                };
                const layerControl = L.control.layers(baseLayers, null, {
                    position: 'bottomleft',
                }).addTo(map);
                googleHybrid.addTo(map);
                // Tiles

                var markerIcon = L.icon({
                    iconUrl: '/plugins/leaflet/marker1.webp',
                    iconSize: [50, 50],
                    iconAnchor: [25, 40],
                    popupAnchor: [1, -34],
                });


                // remove marker
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });

                @foreach($datas as $data)
                @if($data->lat && $data->lng)
                @php
                    $popUpText = Str::squish($data->nama);
                @endphp

                L.marker([{{$data->lat}}, {{ $data->lng }}], {
                    icon: markerIcon,
                    kbliId: '{{$data->id}}',
                })
                .addTo(map)
                .on('click', onClick)
                .bindPopup(`{{ $data->NIB ? Str::squish($data->nama).' - ('.$data->NIB->nama.')' : Str::squish($data->nama) }}`)
                .on('mouseover', function(e){
                this.openPopup();
                });

                @endif
                @endforeach

                function highlightFeature(e) {
                    const layer = e.target;
                    layer.setStyle({
                        color: '#fff',
                        dashArray: 5,
                    });
                    layer.bringToFront();
                    info.update(layer.feature.properties.message);
                }

                function onEachFeature(feature, layer, message) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                        // click: zoomToFeature
                    });
                }

                function onClick(e) {
                    if (document.fullscreenElement) {
                        document.exitFullscreen();
                    }
                    map.setView(e.latlng, 17, { animation: true });
                    @this.dispatch('openModal','modalDetail')
                    setTimeout(function() {
                        @this.call('getDetail', e.target.options.kbliId)
                    }, 50);
                }

                L.geoJson(OganIlirBorder,{style : {
                    fillColor: 'blue',
                    weight: 2,
                    opacity: 1,
                    color: 'white',  //Outline color
                    fillOpacity: 0.7
                }}).addTo(map);

                @if($kecamatan)
                L.geoJson({{ Str::snake($kecamatan) }}, {style : {
                    'fillColor': '#fa9905',
                    'fillOpacity': 0.15,
                    'color': '#fff',
                    'opacity': 1,
                }}).addTo(map);
                @endif

                @if(!$kecamatan)
                map.setView({lat: -3.441054765924086, lng: 104.59459809095272}, 10);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.441054765924086, lng: 104.59459809095272}, 10, { animation: true });
                });
                @elseif($kecamatan == 'Indralaya')
                map.setView({lat: -3.242451, lng: 104.695433}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.242451, lng: 104.695433}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Indralaya Utara')
                map.setView({lat: -3.155717, lng: 104.605841}, 12);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.155717, lng: 104.605841}, 12, { animation: true });
                });
                @elseif($kecamatan == 'Indralaya Selatan')
                map.setView({lat: -3.304499, lng: 104.689443}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.304499, lng: 104.689443}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Pemulutan Barat')
                map.setView({lat: -3.174332, lng: 104.728681}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.174332, lng: 104.728681}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Pemulutan Selatan')
                map.setView({lat: -3.220349556686056, lng: 104.78351957295689}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.220349556686056, lng: 104.78351957295689}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Pemulutan')
                map.setView({lat: -3.1039044115420227, lng: 104.76474416905398}, 12);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.1039044115420227, lng: 104.76474416905398}, 12, { animation: true });
                });
                @elseif($kecamatan == 'Sungai Pinang')
                map.setView({lat: -3.3586139991200072, lng: 104.7973643355322}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.3586139991200072, lng: 104.7973643355322}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Rantau Panjang')
                map.setView({lat: -3.2846030462403952, lng: 104.76938716530921}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.2846030462403952, lng: 104.76938716530921}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Tanjung Raja')
                map.setView({lat: -3.3415535892836576, lng: 104.74453985531338}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.3415535892836576, lng: 104.74453985531338}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Kandis')
                map.setView({lat: -3.427910548081703, lng: 104.79746552640506}, 13);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.427910548081703, lng: 104.79746552640506}, 13, { animation: true });
                });
                @elseif($kecamatan == 'Rantau Alai')
                map.setView({lat: -3.439837897807329, lng: 104.73667176017162}, 12);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.439837897807329, lng: 104.73667176017162}, 12, { animation: true });
                });
                @elseif($kecamatan == 'Payaraman')
                map.setView({lat: -3.4275974818975428, lng: 104.52751454977418}, 12);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.4275974818975428, lng: 104.52751454977418}, 12, { animation: true });
                });
                @elseif($kecamatan == 'Tanjung Batu')
                map.setView({lat: -3.3261930015948633, lng: 104.6167775106138}, 12);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.3261930015948633, lng: 104.6167775106138}, 12, { animation: true });
                });
                @elseif($kecamatan == 'Lubuk Keliat')
                map.setView({lat: -3.4852244893087088, lng: 104.62461553902858}, 12);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.4852244893087088, lng: 104.62461553902858}, 12, { animation: true });
                });
                @elseif($kecamatan == 'Rambang Kuang')
                map.setView({lat: -3.619210497643617, lng: 104.42339096311173}, 11);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.619210497643617, lng: 104.42339096311173}, 11, { animation: true });
                });
                @elseif($kecamatan == 'Muara Kuang')
                map.setView({lat: -3.6713879636458633, lng: 104.57780608913231}, 11);
                Livewire.on('resetCenter', () => {
                    map.setView({lat: -3.6713879636458633, lng: 104.57780608913231}, 11, { animation: true });
                });
                @endif

            ">
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel">
                        @if($detail)
                        {{ $detail->NIB->nama }}
                        @endif
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#modalDetail"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($detail)
                    <table class="w-full">
                        <tbody>

                            <tr class="">
                                <td class="px-0 py-2 w-[150px] md:w-[200px]">
                                    Nama Perusahaan / Perorangan
                                </td>
                                <td class="px-1 py-2 w-[0px]">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    {{ $detail->NIB->nama }}
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    NIB
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    {{ $detail->NIB->nib }}
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    Jenis Usaha
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    {{ $detail->NIB->jenis_usaha }}
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    Tanggal Terbit OSS
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    @if($detail->NIB->tanggal_terbit_oss || $detail->NIB->tanggal_terbit_oss !=
                                    '0000-00-00')
                                    {{ Carbon::parse($detail->NIB->tanggal_terbit_oss)->isoFormat('DD MMMM Y') }}
                                    @endif
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    Alamat
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    <div class="">
                                        <p>
                                            {{ $detail->NIB->alamat }}
                                        </p>
                                        <p class="mt-1 font-normal">
                                            {{ $detail->NIB->kabupaten }}
                                        </p>
                                    </div>
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    Email
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    {{ $detail->NIB->email }}
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    Telepon
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    {{ $detail->NIB->telp }}
                                </th>
                            </tr>

                            <tr class="">
                                <td class="px-0 py-2">
                                    Status Penanaman Modal
                                </td>
                                <td class="px-1 py-2">
                                    :
                                </td>
                                <th class="px-3 py-2 text-start">
                                    {{ $detail->NIB->status_penanaman_modal }}
                                </th>
                            </tr>

                        </tbody>
                    </table>
                    @endif
                </div>
                @if($detail)
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        data-bs-target="#modalDetail" aria-label="Close">
                        Tutup
                    </button>
                    <a href="{{ route('data-usaha.detail', ['nib' => $detail->nib]) }}" target="_blank"
                        class="btn btn-primary">
                        Lihat Detail
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="modalFilterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalFilterLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('usaha-dalam-peta') }}">

                        <div class="">
                            <div class="mb-1.5">Pilih Kecamatan</div>
                            <select x-data x-init="new TomSelect($el, {
                                    create: false,
                                });" class="" name="kecamatan">
                                {{-- <option value="" hidden>Pilih Kecamatan</option> --}}
                                <option value="" {{ $kecamatan ? '' : 'selected' }}>Kabupaten Ogan Ilir</option>
                                @foreach($arrOptions as $key => $value)
                                <option {{ $kecamatan==$value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                                Cari
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('styles')
    <!-- leaflet -->
    <link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@latest/Control.FullScreen.css">

    <!-- leaflet js -->
    <script src="{{ asset('plugins/leaflet/leaflet.js') }}"></script>
    <script src="https://unpkg.com/leaflet.fullscreen@latest/Control.FullScreen.js"></script>

    <!-- leaflet geojson ogan ilir -->
    <script src="{{ asset('plugins/geojson/oganilir.json') }}"></script>
    <script src="{{ asset('plugins/geojson/kecamatan.json') }}"></script>
    <script src="{{ asset('plugins/geojson/desa.json') }}"></script>
    <script src="{{ asset('plugins/geojson/desa.geojson') }}"></script>

    <!-- Tom JS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.0/dist/css/tom-select.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <!-- Tom JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.0/dist/js/tom-select.complete.min.js">
    </script>
    @endpush
</div>
