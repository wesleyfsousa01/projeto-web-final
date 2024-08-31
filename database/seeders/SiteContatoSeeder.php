<?php

namespace Database\Seeders;
use App\Models\SiteContato;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Criando inserção de registro:
        // $contato = new SiteContato();
        // $contato->nome = 'Sitema SG';
        // $contato->telefone = '(61) 99999-8888';
        // $contato->email = 'contato@sg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        // $contato->save();
        SiteContato::factory()->count(100)->create();
    }
}
