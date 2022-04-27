<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class userSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name'=>'Milton','email'=>'jomilro23@gmail.com','password'=>bcrypt('123456789') ])->assignRole('administrador');
        
        User::create(['name'=>'Cristian','email'=>'milton123@gmail.com','password'=>bcrypt('123456789') ])->assignRole('vendedor');
        User::create(['name'=>'orlando','email'=>'orlando@gmail.com','password'=>bcrypt('123456789') ])->assignRole('vendedor');

        user::factory(5)->create();
    }
}
