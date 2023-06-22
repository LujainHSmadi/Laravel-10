<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        Listing::factory(5)->create();
        // Listing::create([
        //     'title'=>'Laravel Senior Developer',
        //     'tag'=>'Laravel, Java Script',
        //     'company'=>'ACME Corp',
        //     'location'=>'Boston, MA',
        //     'email'=>'email@email.com',
        //     'website'=>'https://www.acme.com',
        //     'description'=>'Well help you navigate the corporate drivel to deliver down to earth honest advice for all things People & Culture.'
        // ]);

    }
}
