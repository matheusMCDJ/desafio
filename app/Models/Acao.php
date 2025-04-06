<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acao extends Model
{
    protected $table = 'tb_acoes';
    protected $primaryKey = 'id_acao';
    public $timestamps = false;

    protected $fillable = [
        'acao'
    ];

    public function permissoes(): HasMany
    {
        return $this->hasMany(Permissao::class, 'fk_id_acao');
    }
}
