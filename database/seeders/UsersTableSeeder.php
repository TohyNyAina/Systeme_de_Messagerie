<?php

namespace Database\Seeders;

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
        for ($i=0; $i < 10; $i++) {
           \Illuminate\Support\Facades\DB::table('users')->insert([
                'name' => "Tohy$i",
                'email' => "tohy@gmail.com",
                'password' => bcrypt(value:'0000')
           ]); 
        }
    }
}
