<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table= 'eventos';

    protected $primaryKey = 'id_evento';

    protected $keyType = 'int';

    public $incrementing= true;

    protected $fillable = ['data', 'nome', 'local'];

    public $timestamps = false;
}
