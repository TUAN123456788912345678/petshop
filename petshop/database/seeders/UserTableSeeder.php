<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') ->insert([

        'username'=>'tuan',
        'email'=>'tuan123@gmail.com',
        'password'=>Hash::make('123456789'),
        'role'=>'admin'
        ]);
    }
}
