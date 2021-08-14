<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instansi extends Model
{
    use HasFactory, Uuids;
    protected $table = 'instansi';
    public $timestamps = true;
    protected $fillable = [
        'instansi_name',
        'instansi_address',
        'instansi_website_link',
        'instansi_descriptions'
    ];
}
