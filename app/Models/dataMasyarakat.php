<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class dataMasyarakat extends Model
{
    use HasFactory, Uuids;
    protected $table = 'data_masyarakat';
    public $timestamps = true;
    protected $fillable = [
        'nama_lengakap',
        'jenis_kelamin',
        'alamat',
        'nomor_telepon',
        'pendidikan_terakhir',
        'pekerjaan',
        'usia'
    ];
}
