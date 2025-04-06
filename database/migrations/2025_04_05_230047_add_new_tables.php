<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_perfis', function (Blueprint $table) {
            $table->id('id_perfil');
            $table->string('nome');
        });
        
        Schema::create('tb_permissoes', function (Blueprint $table) {
            $table->id('id_permissao');
            $table->unsignedBigInteger('fk_id_perfil');
            $table->unsignedBigInteger('fk_id_acao');

            $table->foreign('fk_id_perfil')->references('id_perfil')->on('tb_perfis');
            $table->foreign('fk_id_acao')->references('id_acao')->on('tb_acoes');
        });

        Schema::create('tb_acoes', function (Blueprint $table) {
            $table->id('id_acao');
            $table->string('acao');
        });

        Schema::create('tb_cartoes', function (Blueprint $table) {
            $table->id('id_cartao');
            $table->unsignedBigInteger('fk_user_id');
            $table->integer('codigo')->nullable();
            $table->tinyInteger('tipo');
            $table->string('nome');
            $table->decimal('limite', 15, 2);

            $table->foreign('fk_user_id')->references('id')->on('users');
        });

        Schema::create('tb_lancamentos', function (Blueprint $table) {
            $table->id('id_lancamento');
            $table->unsignedBigInteger('fk_id_cartao');
            $table->unsignedBigInteger('fk_user_id');
            $table->string('nome');
            $table->decimal('valor', 15, 2);
            $table->dateTime('dt_lancamento');

            $table->foreign('fk_id_cartao')->references('id_cartao')->on('tb_cartoes');
            $table->foreign('fk_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_perfis');
        Schema::dropIfExists('tb_permissoes');
        Schema::dropIfExists('tb_acoes');
        Schema::dropIfExists('tb_cartoes');
        Schema::dropIfExists('tb_lancamentos');
    }
};
