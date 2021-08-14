<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisNotifikasi extends Model
{
    use HasFactory,Uuids;
    protected $table = 'jenis_notifikasi';
    public $timestamps = true;
    protected $fillable = [
        'nama_notifikasi'
    ];
}
