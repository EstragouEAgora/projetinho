<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Acsa Silveira',
            'apelido' => 'Acsa',
            'email' => 'acsa.silveiras@gmail.com',
            'telefone' => '(35)98804-9236',
            'tipo' => 3,
            'avaliacao' => 6,
            'fotoPerfil' => 'imagens/J22QMgNvEOvsU72MX5yef7hOaPMkjnToc7tskxHH.jpg',
            'email_verified_at' => NULL,
            'password' => Hash::make('TCC_2023'),
            'remember_token' => NULL,
            'created_at' => '2023-08-15 19:31:17',
            'update_at' => '2023-09-25 15:55:30'            
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Felipe Rocha Alves',
            'apelido' => 'Felipe',
            'email' => 'feliperchalves@gmail.com',
            'telefone' => '(35)98438-8878',
            'tipo' => 3,
            'avaliacao' => 6,
            'fotoPerfil' => 'imagens/2IjfQ3vOB8g6MS1uoSNbAUc1BXHX284OaSfPZHgP.png',
            'email_verified_at' => NULL,
            'password' => Hash::make('TCC_2023'),
            'remember_token' => NULL,
            'created_at' => '2023-08-15 19:31:17',
            'update_at' => '2023-08-15 19:32:17'          
        ]);

    }
}
