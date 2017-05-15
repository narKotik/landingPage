<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::create([
            'caption' => 'Finance App',
            'filter' => 'GPS',
            'images' => 'portfolio_pic2.jpg',
        ]);
        Portfolio::create([
            'caption' => 'Concept',
            'filter' => 'design',
            'images' => 'portfolio_pic3.jpg',
        ]);
        Portfolio::create([
            'caption' => 'Shopping',
            'filter' => 'android',
            'images' => 'portfolio_pic4.jpg',
        ]);
        Portfolio::create([
            'caption' => 'Managment',
            'filter' => 'design',
            'images' => 'portfolio_pic5.jpg',
        ]);
        Portfolio::create([
            'caption' => 'iPhone',
            'filter' => 'web',
            'images' => 'portfolio_pic6.jpg',
        ]);
        Portfolio::create([
            'caption' => 'Nexus Phone',
            'filter' => 'web',
            'images' => 'portfolio_pic7.jpg',
        ]);
        Portfolio::create([
            'caption' => 'Android',
            'filter' => 'android',
            'images' => 'portfolio_pic8.jpg',
        ]);
    }
}
