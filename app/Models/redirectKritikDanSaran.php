<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redirectKritikDanSaran extends Model
{
    use HasFactory,Uuids;
    protected $table = 'redirect_kritik_dan_saran';
    public $timestamps = true;

    protected $fillable = [
        'rkds_old_id',
        'rkds_masyarakat_id',
        'rkds_instansi_id ',
        'pesan',
        'foto',
        'status',
        'instansi_baru'
    ];
}
