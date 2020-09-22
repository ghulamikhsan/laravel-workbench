<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id','user_id', 'nama_tugas', 'nama_team'
     ];
}
