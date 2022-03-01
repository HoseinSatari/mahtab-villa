<?php

use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'sitename' => 'خانه مهتاب',
            'description' => 'این یه توضیح درباره خانه مهتاب میباشد',
            'keyword' => 'مهتاب, خانه مهتاب,',
            'image' => '/images/photos/shares/logo/logo.png',
            'phone' => '09305257455',
            'phoneadmin' => '09305257455',
            'location' => "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3810.8605567833133!2d55.471798597200056!3d37.11738308602267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA3JzAwLjkiTiA1NcKwMjgnMjMuNiJF!5e0!3m2!1sen!2s!4v1630502024039!5m2!1sen!2s",
            'email' => 'support@mahtab.ir',
            'address' => 'ایران ، خانه مهتاب',
            'instagram' => 'https://www.instagram.com/khane.mosafer.mahtab/',
            'whatsup' => 'empty',
            'telegram' => "empty",
            'about' => 'این متن توضیح درباره ما خانه مهتاب است',
        ]);
    }
}
