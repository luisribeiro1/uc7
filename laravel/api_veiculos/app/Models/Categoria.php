<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    # nome da tabela no banco que esta classe representa = categorias
    protected $table = "categorias";

    # Nome da chave primária
    protected $primaryKey = "id_categoria";

    # Tipo da chave primária
    protected $keyType = "int";

    # Informa que a chave é auto-incrementada
    public $incrementing = true;

    # Campos que podem ser preenchidos em massa
    protected $fillable = ["nome_categoria","status"];

    # Desabilitar timestamps se a tabela não tiver created_at e updated_at
    public $timestamps = false;
}
