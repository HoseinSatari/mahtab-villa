<?php

use Illuminate\Database\Seeder;

class VilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vilas')->insert([
            'title' => 'ویلا',
            'slug' => 'مهتاب',
            'short_descrip' => 'این یه توضیح کوتاه درباره ویلا',
            'descrip' => 'این یه توضیح طولانی درباره ویلا میباشد',
            'is_active' => '1',
            'price' => '2500000',
            'price2' => '2000000',
            'qty' => '8',
            'video' => 'test'

        ]);
    }
}
