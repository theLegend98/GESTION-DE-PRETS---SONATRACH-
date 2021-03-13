<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'jamel',
               'email'=>'djamel@gmail.com',
                'type'=>'NORMAL',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User2',
               'email'=>'djamel2@gmail.com',
               'type'=>'ADMINISTRATEUR',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
