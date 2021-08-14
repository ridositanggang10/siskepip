<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class notifikasi extends Model
{
    use HasFactory,Uuids;
    protected $table = 'notifikasi';
    public $timestamps = true;

    protected $fillable = [
        'n_instansi_id',
        'n_jenis_notif_id',
        'isi_notifikasi',
        'status',
        'admin_status'
    ];

}
