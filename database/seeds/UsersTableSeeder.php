<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Leandro dos Santos',
            'email'=>'lds.leosantos@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
    }
}
