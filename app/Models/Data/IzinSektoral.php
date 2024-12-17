<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IzinSektoral extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'data_izin_sektoral';

    protected $fillable = [
        'id_permohonan_izin',
        'nib',
        'id_proyek',
        'kbli',
        'tanggal_izin',
        'jenis_izin',
        'nama_dokumen',
        'uraian_kewenangan',
        'kewenangan',
        'status_respon',
        'sektor',
    ];

    function NIB()
    {
        return $this->belongsTo(NIB::class, 'nib', 'nib');
    }
}
