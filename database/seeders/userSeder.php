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
        User::create(['name'=>'Daniel','email'=>'daniel@gmail.com','password'=>bcrypt('123456789') ])->assignRole('administrador');
        User::create(['name'=>'Cristian','email'=>'cristian@gmail.com','password'=>bcrypt('123456789') ])->assignRole('administrador');
        User::create(['name'=>'Orlando','email'=>'orlando@gmail.com','password'=>bcrypt('123456789') ])->assignRole('administrador');
        



        User::create(['name'=>'benito','email'=>'milton123@gmail.com','password'=>bcrypt('123456789') ])->assignRole('vendedor');
        User::create(['name'=>'alfredo','email'=>'orlandoxD@gmail.com','password'=>bcrypt('123456789') ])->assignRole('vendedor');

        user::factory(5)->create();
    }
}
