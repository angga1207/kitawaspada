<?php

?>
<div>

    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Dashboard Kita Waspada</h3>
                            <div class="nk-block-des text-soft">
                                @if(auth()->check())
                                <p>Hi!, <strong>{{ auth()->user()->name }}</strong></p>
                                @endif
                            </div>
                        </div><!-- .nk-block-head-content -->

                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <a href="#" class="btn btn-white btn-dim btn-outline-primary">
                                                <em class="icon ni ni-download-cloud"></em>
                                                <span>Export</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-white btn-dim btn-outline-primary">
                                                <em class="icon ni ni-reports"></em>
                                                <span>Reports</span>
                                            </a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                                    data-bs-toggle="dropdown">
                                                    <em class="icon ni ni-plus"></em>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#">
                                                                <em class="icon ni ni-user-add-fill"></em>
                                                                <span>
                                                                    Menu
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- .toggle-expand-content -->
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="example-alert">
                    <div class="alert alert-primary alert-icon">
                        <em class="icon ni ni-alert-circle"></em> <strong>Selamat Datang </strong>
                        Aplikasi Kita Waspada | Kolaborasi dan Integrasi Data Pengawasan Perangkat Daerah
                        <br>
                        <p class="badge bg-outline-danger fs-6 p-2 mt-3">
                            Aplikasi ini digunakan untuk
                            mendukung, memudahkan dan mempercepat dalam melakukan
                            proses penilaian
                            <span class="mx-1 fw-bold">PBB P2</span>
                            dan
                            <span class="mx-1 fw-bold">
                                Verifikasi BPHTB
                            </span>
                        </p>
                    </div>
                </div>
                <div class="nk-block mt-3">
                    <div class="row g-gs">
                        <div class="col-12 col-md-4">
                            <div class="nk-wg-card bg-teal-dim card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">Jenis Usaha <em class="icon ni ni-info"></em>
                                            </h6>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount">
                                                {{ number_format($counts['jenis_usaha'], 0,'.','.') }}

                                                <span class="change up">
                                                    <dotlottie-player
                                                        src="https://lottie.host/6c052111-280f-4c18-ad82-45869778085a/a0sqxUd3QF.lottie"
                                                        background="transparent" speed="1"
                                                        style="width: 100px; height: 100px; position: absolute; right: 10%; top: 10%;"
                                                        loop autoplay>
                                                    </dotlottie-player>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->

                        </div><!-- .col -->
                        <div class="col-12 col-md-4">
                            <div class="nk-wg-card bg-warning-dim card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">
                                                KBLI
                                                <em class="icon ni ni-info"></em>
                                            </h6>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount">
                                                {{ number_format($counts['data_kbli'], 0,'.','.') }}
                                                <span class="change up">
                                                    <dotlottie-player
                                                        src="https://lottie.host/6c052111-280f-4c18-ad82-45869778085a/a0sqxUd3QF.lottie"
                                                        background="transparent" speed="1"
                                                        style="width: 100px; height: 100px; position: absolute; right: 10%; top: 10%;"
                                                        loop autoplay>
                                                    </dotlottie-player>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-12 col-md-4">
                            <div class="nk-wg-card bg-azure-dim card card-bordered">
                                <div class="card-inner">
                                    <div class="nk-iv-wg2">
                                        <div class="nk-iv-wg2-title">
                                            <h6 class="title">NIB <em class="icon ni ni-info"></em></h6>
                                        </div>
                                        <div class="nk-iv-wg2-text">
                                            <div class="nk-iv-wg2-amount">
                                                {{ number_format($counts['data_nib'], 0,'.','.') }}
                                                <span class="change up">
                                                    <dotlottie-player
                                                        src="https://lottie.host/6c052111-280f-4c18-ad82-45869778085a/a0sqxUd3QF.lottie"
                                                        background="transparent" speed="1"
                                                        style="width: 100px; height: 100px; position: absolute; right: 10%; top: 10%;"
                                                        loop autoplay>
                                                    </dotlottie-player>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-12">
                            <div class="card card-bordered card-full">
                                <div class="card-inner d-flex flex-column h-100">
                                    <div class="card-title-group mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Data Izin Usaha</h6>
                                        </div>
                                        {{-- <div class="card-tools mt-n4 me-n1">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                        <li><a href="#" class="active"><span>30
                                                                    Days</span></a></li>
                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="mt-auto">
                                        <div class="" style="width:100%; height:600px;">
                                            <livewire:livewire-column-chart key="{{ $dataChart->reactiveKey() }}"
                                                :column-chart-model="$dataChart" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .col -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
