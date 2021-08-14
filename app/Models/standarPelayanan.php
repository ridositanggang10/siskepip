<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class standarPelayanan extends Model
{
    use HasFactory, Uuids;
    protected $table = 'standar_layanan';
    public $timestamps = true;
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'file',
        'sl_instansi_id'
    ];
}
