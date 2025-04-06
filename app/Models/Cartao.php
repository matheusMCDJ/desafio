<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Cartao extends Model
{
    protected $table = 'tb_cartoes';
    protected $primaryKey = 'id_cartao';
    public $timestamps = false;

    protected $fillable = [
        'fk_user_id', 
        'codigo', 
        'tipo', 
        'nome', 
        'limite'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function lancamentos(): HasMany
    {
        return $this->hasMany(Lancamento::class, 'fk_id_cartao');
    }
}
