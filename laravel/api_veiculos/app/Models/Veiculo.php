<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    # nome da tabela no banco que esta classe representa = veiculos
    protected $table = 'veiculos';

    # nome da chave primária
    protected $primaryKey = "id_veiculo";

    # tipo da chave primária
    protected $keyType = "int";

    # Informa que a chave é auto-incrementada
    public $incrementing = true;

    # Campos que podem ser preenchidos em massa
    protected $fillable = [
        'marca',
        'modelo',
        'ano',
        'cor',
        'combustivel',
        'quilometragem',
        'preco',
        'foto',
        'id_categoria'
    ];

    # Desabilitar timestamps se a tabela não tiver created_at e updated_at
    public $timestamps = false;

    # Relacionamento com o objeto categorias
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, "id_categoria", "id_categoria"); // (chave estrangeira, chave primária)
    }
}
