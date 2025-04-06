<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Lancamento extends Model
{
    protected $table = 'tb_lancamentos';
    protected $primaryKey = 'id_lancamento';
    public $timestamps = false;

    protected $fillable = [
        'fk_id_cartao', 
        'fk_user_id', 
        'nome', 
        'valor', 
        'dt_lancamento'
    ];

    public function cartao(): BelongsTo
    {
        return $this->belongsTo(Cartao::class, 'fk_id_cartao');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }
}

