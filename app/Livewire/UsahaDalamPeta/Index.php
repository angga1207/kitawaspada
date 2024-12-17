<?php

namespace App\Livewire\UsahaDalamPeta;

use Livewire\Component;
use App\Models\Data\KBLI;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;
    public $search, $kecamatan;
    public $detail;
    public $newData = [], $newKoordinat = null;
    #[Title('Usaha dalam Peta')]

    protected function queryString()
    {
        return [
            'kecamatan' => ['except' => ''],
            'search' => ['except' => ''],
        ];
    }

    function mount()
    {
        // $data = asset('plugins/geojson/desa.json');
        // $fileJson = file_get_contents($data);
        // $fileJson = json_decode($fileJson, true);

        // dd($data, $fileJson);
    }

    public function render()
    {
        $datas = KBLI::search($this->search)
            ->when($this->kecamatan, function ($query) {
                $query->where('kecamatan', $this->kecamatan);
            })
            ->whereNotNull('lng')
            ->whereNotNull('lat')
            ->get();


        $arrOptions = DB::table('data_kbli')
            ->groupBy('kecamatan')
            ->pluck('kecamatan');

        return view('livewire.usaha-dalam-peta.index', [
            'datas' => $datas,
            'arrOptions' => $arrOptions,
        ]);
    }


    function getDetail($id)
    {
        try {
            $this->detail = KBLI::find($id);
            $this->dispatch('openModal', 'modalDetail');
        } catch (\Exception $e) {
            $this->alert('error', $e->getMessage());
        }

        // $data = KBLI::find($id);
        // redirect()->route('data-usaha.detail', $data->nib);
    }

    function closeDetail()
    {
        $this->dispatch('closeModal', 'modalDetail');
        $this->detail = null;
    }

    // function setNewData($data)
    // {
    //     $this->newData[] = $data;
    // }

    // function validatingCoordinate()
    // {
    //     try {
    //         $data = KBLI::find($this->detail->id);
    //         $data->is_valid_coordinate = '1';
    //         $data->validation_date = now();
    //         $data->save();

    //         $this->alert('success', 'Koordinat berhasil divalidasi');
    //         $this->getDetail($this->detail->id);
    //     } catch (\Exception $e) {
    //         $this->alert('error', $e->getMessage());
    //     }
    // }

    // function cancelValidatingCoordinate()
    // {
    //     try {
    //         $data = KBLI::find($this->detail->id);
    //         $data->is_valid_coordinate = '0';
    //         if (!$data->validation_lat && !$data->validation_lng) {
    //             $data->validation_date = null;
    //         }
    //         $data->save();

    //         $this->alert('success', 'Koordinat berhasil dibatalkan');
    //         $this->getDetail($this->detail->id);
    //     } catch (\Exception $e) {
    //         $this->alert('error', $e->getMessage());
    //     }
    // }

    // function saveNewCoordinate()
    // {
    //     $this->validate([
    //         'newKoordinat' => 'required|string'
    //     ], [], [
    //         'newKoordinat' => 'Koordinat'
    //     ]);
    //     try {
    //         $data = KBLI::find($this->detail->id);

    //         $lat = str()->of($this->newKoordinat)->explode(',')[0];
    //         $lng = str()->of($this->newKoordinat)->explode(',')[1];

    //         $data->validation_lat = $lat;
    //         $data->validation_lng = $lng;
    //         $data->validation_date = now();
    //         $data->save();

    //         $this->alert('success', 'Koordinat berhasil diubah');
    //         $this->getDetail($this->detail->id);
    //         $this->newKoordinat = null;
    //     } catch (\Exception $e) {
    //         $this->alert('error', 'Input koordinat tidak valid');
    //     }
    // }

    // function deleteCoordinate()
    // {
    //     try {
    //         $data = KBLI::find($this->detail->id);
    //         $data->validation_lat = null;
    //         $data->validation_lng = null;
    //         $data->validation_date = null;
    //         $data->save();

    //         $this->alert('success', 'Koordinat berhasil dihapus');
    //         $this->getDetail($this->detail->id);
    //     } catch (\Exception $e) {
    //         $this->alert('error', $e->getMessage());
    //     }
    // }
}
