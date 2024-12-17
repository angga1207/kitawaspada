<?php

use Carbon\Carbon;

?>
<div>

    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Detail Data Usaha</h3>
                        </div>
                    </div>

                    {{-- <div class="alert alert-icon alert-danger mt-4" role="alert">
                        <em class="icon ni ni-alert-circle"></em>
                        <strong>Alert ini untuk informasi</strong> bedakan warna nya sesuai dengan informasi
                        yang ingin di sampaikan
                    </div> --}}
                </div>

                <div class="card card-bordered card-preview">
                    <div class="card-aside-wrap" wire:ignore.self>
                        <div class="card-inner card-inner-lg">
                            <div class="tab-content">

                                <div wire:ignore.self class="tab-pane active" id="tabItem1">
                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">
                                                    Profil Pemohon
                                                </h6>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal"
                                                data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        Nama Perusahaan / Perorangan
                                                    </span>
                                                    <span class="data-value">
                                                        {{ $data->nama }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal"
                                                data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        NIB
                                                    </span>
                                                    <span class="data-value">
                                                        {{ $data->nib }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        Jenis Usaha
                                                    </span>
                                                    <span class="data-value">
                                                        {{ $data->jenis_usaha }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more disable">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal"
                                                data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        Alamat
                                                    </span>
                                                    <span class="data-value text-soft">
                                                        {{ $data->alamat }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal"
                                                data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        Email
                                                    </span>
                                                    <span class="data-value">
                                                        {{ $data->email }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                                                data-tab-target="#address">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        Telepon
                                                    </span>
                                                    <span class="data-value">
                                                        {{ $data->telepon }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                                                data-tab-target="#address">
                                                <div class="data-col">
                                                    <span class="data-label">
                                                        Status Penanaman Modal
                                                    </span>
                                                    <span class="data-value">
                                                        {{ $data->status_penanaman_modal }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end">
                                                    <span class="data-more">
                                                        <em class="icon ni ni-forward-ios"></em>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nk-data data-list d-none">
                                            <div class="data-head">
                                                <h6 class="overline-title">Preferences</h6>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Language</span>
                                                    <span class="data-value">English (United
                                                        State)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#"
                                                        class="link link-primary">Change Language</a>
                                                </div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Date Format</span>
                                                    <span class="data-value">M d, YYYY</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#"
                                                        class="link link-primary">Change</a></div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Timezone</span>
                                                    <span class="data-value">Bangladesh (GMT +6)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#"
                                                        class="link link-primary">Change</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div wire:ignore.self class="tab-pane" id="tabItem2">
                                    <table class="table table-tranx">
                                        <thead>
                                            <tr class="tb-tnx-head">
                                                <th class="tb-tnx-id">
                                                    <span class="">#</span>
                                                </th>
                                                <th class="tb-tnx-info">
                                                    Informasi
                                                </th>
                                                <th class="tb-tnx-info">
                                                    <div class="text-center" style="white-space: nowrap">
                                                        Proyek / Usaha
                                                    </div>
                                                </th>
                                                <th class="tb-tnx-info">
                                                    <div class="text-center" style="white-space: nowrap">
                                                        Tanggal Terbit
                                                    </div>
                                                </th>
                                        </thead>
                                        <tbody>

                                            @forelse($data->KBLI as $kbli)
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#">
                                                        <span>
                                                            {{ $loop->iteration }}
                                                        </span>
                                                    </a>
                                                </td>
                                                <td class="tb-tnx-info">

                                                    <div class="">
                                                        <small style="text-decoration: underline;">
                                                            Nomor KBLI :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $kbli->kbli }}
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <small style="text-decoration: underline;">
                                                            Judul KBLI :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $kbli->judul_kbli }}
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <small style="text-decoration: underline;">
                                                            ID Proyek :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $kbli->id_proyek }}
                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="">
                                                    <div class="">
                                                        <small style="text-decoration: underline;">
                                                            Nama Proyek/Usaha :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $kbli->nama }}
                                                        </div>
                                                    </div>
                                                    <div class="text-xs">
                                                        <small style="text-decoration: underline;">
                                                            Alamat :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $kbli->alamat }}
                                                        </div>
                                                        <div class="text-md">
                                                            {{ $kbli->kelurahan }}{{ $kbli->kecamatan ? ',
                                                            '.$kbli->kecamatan :
                                                            '' }}
                                                        </div>
                                                    </div>
                                                    <div class="text-xs">
                                                        @if($kbli->lat && $kbli->lng)
                                                        <a target="_blank"
                                                            href="https://www.google.com/maps/?q={{ $kbli->lat }},{{ $kbli->lng }}"
                                                            class="text-blue-500 hover:text-blue-600 hover:underline">
                                                            <em class="icon ni ni-map-pin-fill"></em>
                                                            Lihat Peta
                                                        </a>

                                                        <div class="">
                                                            <small class="text-xs mt-1">
                                                                Status Koordinat :
                                                            </small>
                                                            <div
                                                                class="text-md font-semibold @if($kbli->is_valid_coordinate == null) text-primary @elseif($kbli->is_valid_coordinate == 1) text-success @elseif($kbli->is_valid_coordinate == 0) text-danger @endif }}">
                                                                {{-- {{ $kbli->lat }}, {{ $kbli->lng }} --}}
                                                                <div class="">
                                                                    @if($kbli->is_valid_coordinate == null)
                                                                    <i class="fas fa-question-circle text-primary"></i>
                                                                    (Menunggu Divalidasi)
                                                                    @elseif($kbli->is_valid_coordinate == 1)
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                    (Valid)
                                                                    @elseif($kbli->is_valid_coordinate == 0)
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                    (Tidak Valid)
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr class="">
                                                        <div class="d-flex gap-2 items-center justify-center">
                                                            <div wire:click.prevent="validatingCoordinate('{{ $kbli->id }}')"
                                                                class="btn btn-success btn-dim btn-outline-success"
                                                                style="white-space: nowrap">
                                                                Validasi Koordinat
                                                            </div>
                                                            <div wire:click.prevent="cancelValidatingCoordinate('{{ $kbli->id }}')"
                                                                class="btn btn-danger btn-dim btn-outline-danger"
                                                                style="white-space: nowrap">
                                                                Tidak Valid
                                                            </div>
                                                        </div>
                                                        @else
                                                        <small class="text-xs text-danger">
                                                            Tidak Ada Koordinat Map
                                                        </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount">
                                                    <div class="text-center" style="white-space: nowrap">
                                                        @if($kbli->tanggal_terbit || $kbli->tanggal_terbit !=
                                                        '0000-00-00')
                                                        {{ Carbon::parse($kbli->tanggal_terbit)->isoFormat('dddd, DD
                                                        MMMM Y')
                                                        }}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr class="tb-tnx-item">
                                                <td colspan="100" class="text-center">
                                                    Tidak ada data proyek / usaha
                                                </td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                <div wire:ignore.self class="tab-pane" id="tabItem3">
                                    {{-- <table class="table table-tranx">
                                        <thead>
                                            <tr class="tb-tnx-head">
                                                <th class="tb-tnx-id"><span class="">#</span></th>
                                                <th class="tb-tnx-info">
                                                    <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                        <span>Bill For</span>
                                                    </span>
                                                    <span class="tb-tnx-date d-md-inline-block d-none">
                                                        <span class="d-md-none">Date</span>
                                                        <span class="d-none d-md-block">
                                                            <span>Issue Date</span>
                                                            <span>Due Date</span>
                                                        </span>
                                                    </span>
                                                </th>
                                                <th class="tb-tnx-amount">
                                                    <span class="tb-tnx-total">Total</span>
                                                    <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                                </th>
                                        </thead>
                                        <tbody>
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>4947</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title">Enterprize Year
                                                            Subscription</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">10-05-2019</span>
                                                        <span class="date">10-13-2019</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount">$599.00</span>
                                                    </div>
                                                    <div class="tb-tnx-status">
                                                        <span class="badge badge-dot bg-warning">Due</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>4904</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title">Maintenance Year
                                                            Subscription</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">06-19-2019</span>
                                                        <span class="date">06-26-2019</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount">$99.00</span>
                                                    </div>
                                                    <div class="tb-tnx-status"><span
                                                            class="badge badge-dot bg-success">Paid</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>4829</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title">Enterprize Year
                                                            Subscription</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">10-04-2018</span>
                                                        <span class="date">10-12-2018</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount">$599.00</span>
                                                    </div>
                                                    <div class="tb-tnx-status"><span
                                                            class="badge badge-dot bg-success">Paid</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>4830</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title">Enterprize Anniversary
                                                            Subscription</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">12-04-2018</span>
                                                        <span class="date">14-12-2018</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount">$399.00</span>
                                                    </div>
                                                    <div class="tb-tnx-status"><span
                                                            class="badge badge-dot bg-success">Paid</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="tb-tnx-item">
                                                <td class="tb-tnx-id">
                                                    <a href="#"><span>4840</span></a>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-desc">
                                                        <span class="title">Enterprize Coverage
                                                            Subscription</span>
                                                    </div>
                                                    <div class="tb-tnx-date">
                                                        <span class="date">12-08-2018</span>
                                                        <span class="date">13-22-2018</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-amount">
                                                    <div class="tb-tnx-total">
                                                        <span class="amount">$99.00</span>
                                                    </div>
                                                    <div class="tb-tnx-status"><span
                                                            class="badge badge-dot bg-danger">Cancel</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> --}}

                                    <table class="table table-tranx">
                                        <thead class="">
                                            <tr class="tb-tnx-head">
                                                <th class="tb-tnx-id text-center">
                                                    Jenis Izin
                                                </th>
                                                <th class="tb-tnx-id text-center">
                                                    Perizinan
                                                </th>
                                                <th class="tb-tnx-id text-center">
                                                    KBLI
                                                </th>
                                                <th class="tb-tnx-id text-center">
                                                    Status
                                                </th>
                                                <th class="tb-tnx-id text-center">
                                                    Tanggal Izin
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data->IzinSektoral->sortByDesc('tanggal_izin') as $izin)
                                            <tr class="tb-tnx-item">
                                                <td class="">
                                                    @if($izin->jenis_izin)
                                                    {{ $izin->jenis_izin }}
                                                    @else
                                                    <small class="text-xs text-danger">
                                                        Tidak Ditemukan
                                                    </small>
                                                    @endif
                                                </td>
                                                <td class="">
                                                    <div class="">
                                                        <small class="">
                                                            ID Permohonan :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $izin->id_permohonan_izin }}
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <small class="">
                                                            Nama Dokumen :
                                                        </small>
                                                        <div class="fw-semibold">
                                                            {{ $izin->nama_dokumen }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    <div class="whitespace-nowrap fw-semibold text-center">
                                                        {{ $izin->kbli }}
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $izin->status_respon }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="whitespace-nowrap">
                                                        @if($izin->tanggal_izin || $izin->tanggal_izin !=
                                                        '0000-00-00')
                                                        {{ Carbon::parse($izin->tanggal_izin)->isoFormat('DD MMM Y')
                                                        }}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="10" class="p-4 border">
                                                    <div class="text-center">
                                                        Tidak ada data proyek / usaha
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div wire:ignore.self class="tab-pane" id="tabItem4">
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="preview-title-lg overline-title">Tambah
                                                        Komponen Data Usaha</span>
                                                    <form wire:submit.prevent="storeData">
                                                        <div class="row gy-4">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="default-01">
                                                                        Input text
                                                                    </label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="default-01"
                                                                            placeholder="Input placeholder">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="text-end mt-4">
                                                            <a href="#" class="btn btn-outline-secondary">
                                                                Batal
                                                            </a>
                                                            <button type="submit" class="btn btn-primary">
                                                                Simpan Data
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                            data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                            data-toggle-overlay="true">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div class="user-avatar bg-primary">
                                            <span>
                                                {{ substr($data->nama, 0, 1) }}
                                            </span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">
                                                {{ $data->nama }}
                                            </span>
                                            <span class="sub-text">
                                                {{ $data->nib }}
                                            </span>
                                        </div>
                                        {{-- <div class="user-action">
                                            <div class="dropdown">
                                                <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown"
                                                    href="#">
                                                    <em class="icon ni ni-more-v"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-camera-fill"></em>
                                                                <span>
                                                                    Change Photo
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-edit-fill"></em><span>Update
                                                                    Profile</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="user-account-info py-0">
                                        <h6 class="overline-title-alt">
                                            Nomor Izin Berusaha (NIB)
                                        </h6>
                                        <div class="user-balance">
                                            {{ $data->nib }}
                                        </div>
                                        <div class="user-balance-sub">
                                            <p class="mb-0">Tanggal Terbit OSS</p>
                                            <div class="fw-bold fs-6">
                                                {{ Carbon::parse($data->tanggal_terbit_oss)->isoFormat('D MMMM Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <ul class="nav link-list-menu m-0" wire:ignore>
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tabItem1">
                                                <em class="icon ni ni-user-fill-c"></em>
                                                <span>
                                                    Profil Pemohon
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tabItem2">
                                                <em class="icon ni ni-activity-round-fill"></em>
                                                <span>
                                                    Data Proyek / Usaha
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tabItem3">
                                                <em class="icon ni ni-bell"></em>
                                                <span>
                                                    Informasi
                                                    Izin
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tabItem4">
                                                <em class="icon ni ni-plus"></em>
                                                <span>
                                                    Tambah
                                                    Data
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </div><!-- .card-inner -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
