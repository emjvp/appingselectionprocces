<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::select('select * from users');

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'name' => 'cajero',
            'email' => 'cajero@cajero.com',
            'password' => bcrypt('cajero')
        ]);

        DB::table('users')->insert([
            'name' => 'vendedor',
            'email' => 'vendedor@vendedor.com',
            'password' => bcrypt('vendedor')
        ]);
    }
}
