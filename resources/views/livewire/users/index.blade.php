<div>

    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Daftar Pengguna Aplikasi</h3>
                            <div class="nk-block-des text-soft">
                                <p>Total 25 pengguna terdaftar</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <a href="#" class="btn btn-white btn-outline-light" wire:click="create"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <em class="icon ni ni-plus"></em>
                                                <span>
                                                    Tambah Pengguna
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner position-relative card-tools-toggle">
                                <div class="card-title-group">
                                    <div class="card-tools">
                                        <div class="form-inline flex-nowrap gx-3">

                                        </div>
                                    </div>
                                    <div class="card-tools me-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search"
                                                    data-target="search">
                                                    <em class="icon ni ni-search"></em>
                                                </a>
                                            </li>
                                            <li class="btn-toolbar-sep"></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="card-search search-wrap" data-search="search" wire:ignore.self>
                                    <div class="card-body">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search"
                                                data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                            </a>
                                            <input type="search" class="form-control border-transparent form-focus-none"
                                                placeholder="Search by user or email" wire:model.live="search">
                                            <button class="search-submit btn btn-icon">
                                                <em class="icon ni ni-search"></em>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-tranx">
                                <thead class="bg-slate-700 text-white">
                                    <tr class="tb-tnx-head">
                                        <th class="px-4 py-3">
                                            Nama
                                        </th>
                                        <th class="px-4 py-3">
                                            Username
                                        </th>
                                        <th class="px-4 py-3 text-center">
                                            Status
                                        </th>
                                        <th class="px-4 py-3 text-center w-[100px]">
                                            Option
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($datas as $data)
                                    <tr wire:key="user-{{ $data->id }}" class="tb-tnx-item">
                                        <td class="">
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="{{ asset($data->avatar) }}" alt="Avatar {{ $data->name }}"
                                                    class="user-avatar sm">
                                                <div class="text-lg font-semibold">
                                                    {{ $data->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="">
                                            {{ '@'.$data->username }}
                                        </td>
                                        <td class="">
                                            <div class="text-center">
                                                @if($data->status == 'active')
                                                <div class="btn btn-success btn-sm">
                                                    Aktif
                                                </div>
                                                @elseif($data->status == 'inactive')
                                                <div class="btn btn-seconda btn-smry">
                                                    Tidak Aktif
                                                </div>
                                                @elseif($data->status == 'suspended')
                                                <div class="btn btn-warning btn-sm">
                                                    Suspend
                                                </div>
                                                @elseif($data->status == 'banned')
                                                <div class="btn btn-danger" btn-sm>
                                                    Banned
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="d-flex align-items-center justify-content-center gap-1">
                                                <button wire:click="edit({{ $data->id }})" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    class="btn btn-sm btn-icon btn-primary">
                                                    <em class="icon ni ni-edit-alt-fill"></em>
                                                </button>
                                                <button wire:click="confirmDelete({{ $data->id }})"
                                                    class="btn btn-sm btn-icon btn-danger">
                                                    <em class="icon ni ni-trash-fill"></em>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <div class="py-4">
                                                <div class="text-soft">
                                                    Tidak ada data
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                @if($datas->hasPages())
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="pt-4">
                                            {{ $datas->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        @if($inputMode == 'create')
                        Tambah Pengguna
                        @elseif($inputMode == 'edit')
                        Edit Pengguna
                        @endif
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="space-y-2">

                        <div class="mb-2">

                            <div>Nama Lengkap</div>
                            <div class="relative mt-1.5 flex">
                                <input class="form-control" placeholder="Nama Lengkap" type="text"
                                    wire:model="input.name">
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <i class="fa-regular fa-user text-base"></i>
                                </span>
                            </div>

                            @error('input.name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2">

                            <span>Username</span>
                            <span class="relative mt-1.5 flex">
                                <input class="form-control" placeholder="Username" type="text"
                                    wire:model.blur="input.username">
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <i class="fa-solid fa-user text-base"></i>
                                </span>
                            </span>

                            @error('input.username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2">

                            <span>Jenis Pengguna</span>
                            <span class="relative mt-1.5 flex" wire:ignore>
                                <select
                                    class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 pl-9 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                                    wire:model="input.role_id">
                                    <option value="" hidden>Pilih Jenis Pengguna</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <i class="fa-solid fa-user-cog text-base"></i>
                                </span>
                            </span>

                            @error('input.role_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <div x-data="{showPassword:false}">
                                <span>Password</span>
                                <span class="relative mt-1.5 flex">
                                    <input class="form-control" placeholder="Password"
                                        :type="showPassword ? 'text' : 'password'" wire:model="password">
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-solid fa-key text-base"></i>
                                    </span>
                                    <span @click.prevent="showPassword = !showPassword"
                                        class="cursor-pointer absolute right-0 flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-regular text-base"
                                            :class="showPassword ? 'fa-eye text-green-500' : 'fa-eye-slash'"></i>
                                    </span>
                                </span>

                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <div x-data="{showPassword:false}">
                                <span>Konfirmasi Password</span>
                                <span class="relative mt-1.5 flex">
                                    <input class="form-control" placeholder="Konfirmasi Password"
                                        :type="showPassword ? 'text' : 'password'" wire:model="password_confirmation">
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-solid fa-key text-base"></i>
                                    </span>
                                    <span @click.prevent="showPassword = !showPassword"
                                        class="cursor-pointer absolute right-0 flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-regular text-base"
                                            :class="showPassword ? 'fa-eye text-green-500' : 'fa-eye-slash'"></i>
                                    </span>
                                </span>

                                @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="save">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
