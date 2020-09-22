<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'kegiatan', 'kendala', 'status_id', 'user_id'
    ];

    protected $casts = [
        'selesai' => 'integer',
        'ditunda' => 'integer',
        'batal'   => 'integer',  
    ];
}
