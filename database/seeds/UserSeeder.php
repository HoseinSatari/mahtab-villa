<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'حسین ستاری',
            'phone' => '09305257455',
            'is_superuser' => '1',

        ]);
    }
}
