<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed com instância de Objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 01';
        $fornecedor->site = 'fornecedor01.com.br';
        $fornecedor->uf = 'GO';
        $fornecedor->email = 'fornecedor01@com.br';
        $fornecedor->save();

        //Seed a partir do método estático create([]);
        Fornecedor::create([
            'nome' => 'Fornecedor 02',
            'site' => 'fornecedor02.app.com',
            'uf' => 'DF',
            'email' => 'fornec02@gmail.com'
        ]);

        //Seed com DB e insert();
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 03',
            'site' => 'fornecedor02.site.com',
            'uf' => 'SP',
            'email' => 'contatofornec03@gmail.com'
        ]);

    }
}
