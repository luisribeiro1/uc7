<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convite extends Model
{
    protected $table = 'convites';

    protected $primaryKey = 'id_convite';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = ['id_evento', 'id_contato' ,'confirmacao'];

    public $timestamps = false;

    public function evento()
    {
        return $this->belongsTo(Evento::class, "id_evento", "id_evento"); // (chave estrangeira, chave primária)
    }
    public function contato()
    {
        return $this->belongsTo(Contatos::class, "id_contato", "id_contato"); // (chave estrangeira, chave primária)
    }
}
