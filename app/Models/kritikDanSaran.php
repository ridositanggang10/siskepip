<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class kritikDanSaran extends Model
{
    use HasFactory, Uuids;
    protected $table = 'kirik_dan_saran';
    public $timestamps = true;

    protected $fillable = [
        'ks_instansi_id',
        'masyarakat_id',
        'pesan',
        'foto',
        'status'
    ];

}
