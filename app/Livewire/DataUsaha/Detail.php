<?php

namespace App\Livewire\DataUsaha;

use Livewire\Component;
use App\Models\Data\NIB;
use App\Models\Data\KBLI;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Detail extends Component
{
    use LivewireAlert;
    public $data;

    function mount($nib)
    {
        $data = NIB::where('nib', $nib)->firstOrFail();
        $this->data = $data;
    }

    public function render()
    {
        $title = null;
        if ($this->data) {
            $title = $this->data->nama;
        }
        return view('livewire.data-usaha.detail')
            ->layout('components.layouts.app', ['title' => $title]);
    }

    function validatingCoordinate($id)
    {
        DB::beginTransaction();
        try {
            $data = KBLI::find($id);
            $data->update([
                'is_valid_coordinate' => '1',
                'validation_date' => now(),
            ]);
            DB::commit();
            $this->alert('success', 'Koordinat berhasil divalidasi');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error', 'Terjadi kesalahan' . $e->getMessage());
        }
    }

    function cancelValidatingCoordinate($id)
    {
        DB::beginTransaction();
        try {
            $data = KBLI::find($id);
            $data->update([
                'is_valid_coordinate' => '0',
                'validation_date' => now(),
            ]);
            DB::commit();
            $this->alert('success', 'Validasi Koordinat berhasil dibatalkan');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error', 'Terjadi kesalahan' . $e->getMessage());
        }
    }

    function storeData()
    {
        $this->alert('info', 'Fitur ini belum tersedia', [
            'position' => 'center',
            'toast' => false,
            'timer' => null,
            'showCancelButton' => true,
            'cancelButtonText' => 'Tutup',
        ]);
    }
}
