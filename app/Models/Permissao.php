<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permissao extends Model
{
    protected $table = 'tb_permissoes';
    protected $primaryKey = 'id_permissao';
    public $timestamps = false;

    protected $fillable = [
        'fk_id_perfil', 
        'fk_id_acao'
    ];

    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'fk_id_perfil');
    }

    public function acao(): BelongsTo
    {
        return $this->belongsTo(Acao::class, 'fk_id_acao');
    }
}
