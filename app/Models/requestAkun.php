<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class requestAkun extends Model
{
    use HasFactory, Uuids;
    protected $table = 'request_akun';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'ra_instansi_id',
        'ra_user_id',
        'email',
        'password',
        'status'
    ];
}
