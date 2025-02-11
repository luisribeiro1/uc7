<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Nome da tabela no bancode dados que esta classe representa
    protected $table = 'categorias';

    // Nome da chave primária
    protected $primaryKey = 'id_categoria';

    // Tipo da chave primária
    protected $keyType ='int';

    // Informa que a chave primária é auto incremento
    protected $increment = true;

    // Lista dos campos que podem ser preenchidos por fomulário
    protected $fillTable = ['nome_categoria', 'status'];
}
