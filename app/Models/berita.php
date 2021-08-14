<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class berita extends Model
{
    use HasFactory, Uuids;
    protected $table = 'berita';
    public $timestamps = true;
    protected $fillable = [
        'berita_instansi_id',
        'judul',
        'link',
        'berita_description',
        'berita_foto'
    ];
}
