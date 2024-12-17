<?php

namespace App\Models\Temp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempNIB extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'temp_data_nib';

    protected $fillable = [
        'nib',
        'nama',
        'jenis_usaha',
        'alamat',
        'kabupaten',
        'email',
        'telp',
        'status_penanaman_modal',
        'tanggal_terbit_oss',
    ];

    protected $casts = [
        'tanggal_terbit_oss' => 'date',
    ];
}
