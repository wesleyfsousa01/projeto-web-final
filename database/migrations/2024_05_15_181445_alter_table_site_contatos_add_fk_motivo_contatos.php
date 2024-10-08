<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Adicionando a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //Atribuindo os valores da coluna motivo_contato -> motivo_contatos_id
        //Remove a coluna motivo_contato
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //Adicionando a integridade referêncial através da FK
        Schema::table('site_contatos', function (Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Recriando a coluna motivo_contato
        //Removendo a FK
        Schema::table('site_contatos', function (Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //Revertendo os valores da coluna motivo_contatos_id -> motivo_contato
        //Adicionando a coluna motivo_contato novamente
        DB::statement('update site_contatos set motivo_contatos = motivo_contato_id');

        //Removendo a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
