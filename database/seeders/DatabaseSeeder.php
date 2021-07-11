<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->truncteTables([
            'users',
            'products'
        ]);

        $this->call(UsersSeeder::class);
        $this->call(ProductsSeeder::class);

    }

    public function truncteTables(array $tables){

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach($tables as $tbl){
            DB::table($tbl)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
