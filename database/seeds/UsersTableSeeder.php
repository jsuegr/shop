<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	User::create([
    		'name' => 'Josue Garcia',
            'email' => 'jsuegr@gmail.com',
            'password' => bcrypt('123123'),
            'userrol_id' => '1'
    	]);

        User::create([
            'name' => 'Aneglica Morales',
            'email' => 'angelica.m@gmail.com',
            'password' => bcrypt('123123'),
            'userrol_id' => '2'
        ]);

        User::create([
            'name' => 'Raul Dominguez',
            'email' => 'raul.d@gmail.com',
            'password' => bcrypt('123123'),
            'userrol_id' => '3'
        ]);
    }
}
