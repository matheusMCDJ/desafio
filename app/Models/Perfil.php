<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perfil extends Model
{
    protected $table = 'tb_perfis';
    protected $primaryKey = 'id_perfil';
    public $timestamps = false;

    protected $fillable = [
        'nome'
    ];

    public function permissoes(): HasMany
    {
        return $this->hasMany(Permissao::class, 'fk_id_perfil');
    }
}

