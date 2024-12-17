<?php

namespace App\Livewire\DataUsaha;

use Livewire\Component;
use App\Models\Data\NIB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert, WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public $search, $jenisUsaha, $lokasiUsaha;

    public function render()
    {
        $datas = NIB::search($this->search)
            ->when($this->jenisUsaha, function ($q) {
                $q->where('jenis_usaha', $this->jenisUsaha);
            })
            ->when($this->lokasiUsaha, function ($q) {
                $q->whereHas('KBLI', function ($query) {
                    $query->where('kecamatan', $this->lokasiUsaha);
                });
            })
            ->paginate(9);

        $arrJenisUsaha = DB::table('data_nib')->groupBy('jenis_usaha')->pluck('jenis_usaha');
        $arrLokasiUsaha = DB::table('data_kbli')->groupBy('kecamatan')->pluck('kecamatan');

        return view('livewire.data-usaha.index', [
            'datas' => $datas,
            'arrJenisUsaha' => $arrJenisUsaha,
            'arrLokasiUsaha' => $arrLokasiUsaha,
        ])
            ->layout('components.layouts.app', ['title' => 'Data Usaha']);
    }

    function resetFilter()
    {
        $this->search = null;
        $this->jenisUsaha = null;
        $this->lokasiUsaha = null;
        $this->resetPage();
    }
}
