<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('points')->insert([
            'name' => 'Витязево_1',
        ]);
        DB::table('points')->insert([
            'name' => 'Витязево_2',
        ]);
        DB::table('roles')->insert([
            'name' => 'Админ',
        ]);
        DB::table('users')->insert([
            'name' => 'Александр',
            'surname' => 'Васильченко',
            'patronymic' => 'Олегович',
            'login' => 'StZD',
            'password' => '$2y$12$HcxMeazgAr6k3edZ0DOAeOkQgfGf5NczR0KuaukNTg.KDqiS2GWx2',
            'point_id' => '1',
            'role_id' => '1',
        ]);
    }
}
