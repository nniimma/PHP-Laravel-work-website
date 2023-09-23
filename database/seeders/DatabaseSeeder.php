<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //this make fake users and the library that is used you can see from database>factories>userfactory.php
        //to make the users after uncomment and saving this page
        //we need to write this code: 'php artisan db:seed' 
        // \App\Models\User::factory(5)->create();

        //make a single user:
        $user = User::factory()->create([
            'name' => 'nima',
            'email' => 'nima@mail.com',
            'password' => '123456'
        ]);

        //define the listings to one user
        listing::factory(6)->create([
            'user_id' => $user->id
        ]);


        //--creat table in databse with factory, it comes from database>factories>listingFactory:
        // listing::factory(6)->create();

        //--creat table in database without factory:
        // listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'Laravel JavaScript',
        //     'company' => 'ACME CORP',
        //     'location' => 'Boston, MA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum sunt voluptas minus, necessitatibus corporis in molestias, mollitia dolorum voluptate tempore est tenetur amet culpa deserunt magni porro ullam. Quia, dignissimos.'
        // ]);

        // listing::create([
        //     'title' => 'Laravel Senior 2',
        //     'tags' => 'Laravel Java2',
        //     'company' => 'hello',
        //     'location' => 'new york',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.hello.com',
        //     'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum sunt voluptas minus, necessitatibus corporis in molestias, mollitia dolorum voluptate tempore est tenetur amet culpa deserunt magni porro ullam. Quia, dignissimos.'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
