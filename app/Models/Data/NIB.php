<?php

namespace App\Models\Data;

use App\Models\Data\KBLI;
use App\Traits\Searchable;
use App\Models\Data\IzinSektoral;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NIB extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'data_nib';

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

    protected $searchable = [
        'nib',
        'nama',
        // 'jenis_usaha',
        // 'status_penanaman_modal',
    ];

    function KBLI()
    {
        return $this->hasMany(KBLI::class, 'nib', 'nib');
    }

    function IzinSektoral()
    {
        return $this->hasMany(IzinSektoral::class, 'nib', 'nib');
    }
}
