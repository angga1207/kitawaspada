<?php

namespace App\Models\Data;

use App\Models\Data\NIB;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KBLI extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'data_kbli';

    protected $guarded = [];

    protected $searchable = [
        // 'id_proyek',
        'nib',
        'kbli',
        // 'judul_kbli',
        'nama',
        // 'resiko',
        // 'skala_usaha',
        // 'kecamatan',
        // 'kelurahan',
        // 'sektor_pembina',
        // 'nama_user',
        // 'ktp_user',
        'nib.nama',
        // 'nib.jenis_usaha',
    ];

    function NIB()
    {
        return $this->belongsTo(NIB::class, 'nib', 'nib')->orderBy('created_at', 'desc');
    }

    function IzinSektoral()
    {
        return $this->hasMany(IzinSektoral::class, 'id_proyek', 'id_proyek');
    }
}
