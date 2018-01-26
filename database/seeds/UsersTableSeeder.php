<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Address;
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
            'username' => 'jsuegr',
            'userrol_id' => '3',
            'photo' => 'user3.jpg',
        ]);

        User::create([
            'name' => 'Aneglica Morales',
            'email' => 'angelica.m@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '5568979121',
            'username' => 'angelica.m',
            'userrol_id' => '2',
            'photo' => 'user2.jpg',
        ]);

        User::create([
            'name' => 'Raul Dominguez',
            'email' => 'raul.d@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '5578891345',
            'username' => 'raul.d',
            'userrol_id' => '1',
            'photo' => 'user1.jpg',
        ]);

        $users = factory(User::class, 13)->create()
        ->each(function ($user) {
            $addresses = factory(Address::class, 2)->make();
            $user->addresses()->saveMany($addresses);
        });


    }
}
