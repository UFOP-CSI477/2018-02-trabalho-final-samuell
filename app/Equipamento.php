<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = ['nome','potencia','quantidade','tempo'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'equipamentos';
}
