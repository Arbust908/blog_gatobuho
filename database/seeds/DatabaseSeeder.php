<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'codvi-adm',
            'email' => 'admin@codvi.com',
            'password' => password_hash('codvipass',PASSWORD_DEFAULT),
        ]);
        DB::table('roles')->insert([
            'name' => 'editor',
            'description' => 'La idea es que pueda escribir posts',
        ]);
        DB::table('tags')->insert([
            'name' => 'Role playing Games',
            'slug' => str_slug('rol', '-'),
            'color' => '#9b59b6',
            'description' => 'Cosas sobre rol, sin sistema especifico',

            'status' => '1',
        ]);
        DB::table('tags')->insert([
            'name' => 'Dungeons and Dragons',
            'slug' => str_slug('dnd', '-'),
            'color' => '#e74c3c',
            'description' => 'Cosas de rol especificas de dyd',

            'status' => '1',
        ]);
    }
}
