<?php
?>
<div>

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    Data Usaha
                                </h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            {{-- <li class="nk-block-tools-opt">
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-icon btn-primary d-md-none">
                                                    <em class="icon ni ni-plus"></em>
                                                </a>
                                                <a href="#" data-target="addProduct"
                                                    class="toggle btn btn-primary d-none d-md-inline-flex">
                                                    <em class="icon ni ni-plus"></em>
                                                    <span>
                                                        Tambah Data
                                                    </span>
                                                </a>
                                            </li> --}}
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="search" class="form-control" id="default-04"
                                                        placeholder="Cari NIB atau Nama Pemohon"
                                                        wire:model.live="search">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                        class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                        data-bs-toggle="dropdown">
                                                        <em class="d-none d-sm-inline icon ni ni-filter-alt"></em>
                                                        <span class="text-truncate" style="width: 100px">
                                                            {{ $jenisUsaha ?? 'Jenis Usaha' }}
                                                        </span>
                                                        <em class="dd-indc icon ni ni-chevron-right"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    wire:click.prevent="$set('jenisUsaha', null)"
                                                                    class="{{ !$jenisUsaha ? 'text-primary fw-bold' : '' }}">
                                                                    <span>Semua Jenis Usaha</span>
                                                                </a>
                                                            </li>
                                                            @foreach($arrJenisUsaha as $key => $ju)
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    wire:click.prevent="$set('jenisUsaha', '{{ $ju }}')"
                                                                    class="{{ $jenisUsaha == $ju ? 'text-primary fw-bold' : '' }}">
                                                                    <span>{{ $ju }}</span>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                        class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                        data-bs-toggle="dropdown">
                                                        <span class="text-truncate" style="width: 100px">
                                                            {{ $lokasiUsaha ?? 'Lokasi Usaha' }}
                                                        </span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    wire:click.prevent="$set('lokasiUsaha', null)"
                                                                    class="{{ !$lokasiUsaha ? 'text-primary fw-bold' : '' }}">
                                                                    <span>Semua Lokasi</span>
                                                                </a>
                                                            </li>
                                                            @foreach($arrLokasiUsaha as $key => $lu)
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    wire:click.prevent="$set('lokasiUsaha', '{{ $lu }}')"
                                                                    class="{{ $lokasiUsaha == $lu ? 'text-primary fw-bold' : '' }}">
                                                                    <span>{{ $lu }}</span>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <button class="btn btn-icon btn-trigger" wire:click="resetFilter">
                                                    <em class="icon ni ni-undo"></em>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->

                    <style>
                        .project-hover:hover {
                            background-color: rgb(224, 242, 255) !important;
                        }
                    </style>

                    <div class="nk-block">
                        <div class="row">

                            @forelse($datas as $data)
                            <div class="col-12 col-md-4 mb-3">
                                <div class="card card-bordered  project-hover">
                                    <a href="{{ route('data-usaha.detail', $data->nib) }}">
                                        <div class="card-inner-group">
                                            <div class="card-inner ">
                                                <div class="project">
                                                    <div class="project-head">
                                                        <div class="project-title">
                                                            <div class="user-avatar sq bg-purple">
                                                                <span>
                                                                    {{ substr($data->nama, 0, 1) }}
                                                                </span>
                                                            </div>
                                                            <div class="project-info">
                                                                <h6 class="title">
                                                                    {{ $data->nama }}
                                                                </h6>
                                                                <span class="sub-text">
                                                                    NIB :
                                                                    {{ $data->nib }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="project-details">
                                                        <span>
                                                            Jenis Usaha :
                                                            <span class="badge badge-dim bg-azure">
                                                                {{ $data->jenis_usaha }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="project-meta">
                                                        <ul class="project-users g-1">
                                                            <li>
                                                                <div>
                                                                    <span>
                                                                        Jumlah Proyek/Usaha :
                                                                        <span class="badge badge-dim bg-azure">
                                                                            {{ number_format($data->KBLI->count(),0,'.','.') }}
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <span>
                                                            Membutuhkan Izin :
                                                            <span class="badge badge-dim bg-danger">
                                                                {{ number_format($data->IzinSektoral->count(),0,'.','.') }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="alert alert-warning text-center fw-bold">
                                    Tidak ada data yang ditemukan
                                </div>
                            </div>
                            @endforelse

                            @if($datas->hasPages())
                            <div class="col-12">
                                <div class="justify-content-center text-center mt-4">
                                    {{ $datas->links() }}
                                </div>
                            </div>
                            @endif

                        </div>
                    </div><!-- .nk-block -->

                    <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct"
                        data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">New Product</h5>
                                <div class="nk-block-des">
                                    <p>Add information and add new product.</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="product-title">Product Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="product-title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="regular-price">Regular Price</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="regular-price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sale-price">Sale Price</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="sale-price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="stock">Stock</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="stock">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="SKU">SKU</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="SKU">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="category">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="tags">Tags</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="tags">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="upload-zone small bg-lighter my-2">
                                        <div class="dz-message">
                                            <span class="dz-message-text">Drag and drop file</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
                                            New</span></button>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .project-hover:hover {
            background-color: rgb(224, 242, 255) !important;
        }
    </style>
    @endpush
</div>
