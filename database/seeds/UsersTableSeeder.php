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
            'phone' => '5568625718',
            'address' => 'direccion 1',
            'username' => 'jsuegr',
            'userrol_id' => '1'

        ]);

        User::create([
            'name' => 'Aneglica Morales',
            'email' => 'angelica.m@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '5568979121',
            'address' => 'direccion 2',
            'username' => 'angelica.m',
            'userrol_id' => '2'
        ]);

        User::create([
            'name' => 'Raul Dominguez',
            'email' => 'raul.d@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '5578891345',
            'address' => 'direccion 3',
            'username' => 'raul.d',
            'userrol_id' => '3'
        ]);
    }
}
