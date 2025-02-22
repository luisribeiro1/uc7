<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $table = "contatos";

    protected $primaryKey = "id_contato";

    protected $keyType = "int";

    public $incrementing = true;

    protected $fillable = ["nome","whatsapp","email","sexo"];

    public $timestamps = false;
}
