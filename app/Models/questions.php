<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class questions extends Model
{
    use HasFactory,Uuids;
    protected $table = 'survei_questions';
    public $timestamps = true;
    protected $fillable = [
        'survei_tag',
        'question_number',
        'question',
        'sq_instansi_id',
        'sq_user_id',
        'judul',
        'opsi_1',
        'opsi_2',
        'opsi_3',
        'opsi_4'
    ];
}
