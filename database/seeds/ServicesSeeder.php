<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Service::create([
            'caption' => 'Android',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
            'icon' => 'fa-android',
        ]);
        Service::create([
            'caption' => 'Apple IOS',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
            'icon' => 'fa-apple',
        ]);
        Service::create([
            'caption' => 'Design',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
            'icon' => 'fa-dropbox',
        ]);
        Service::create([
            'caption' => 'Concept',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
            'icon' => 'fa-html5',
        ]);
        Service::create([
            'caption' => 'User Research',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
            'icon' => 'fa-slack',
        ]);
        Service::create([
            'caption' => 'User Experience',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text',
            'icon' => 'fa-users',
        ]);
    }
}
