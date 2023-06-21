<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       /*$user =  DB::table('users')->insert([
            
            [
                'name' => 'cheikh',
                'email' => 'gaye95cheikh@gmail.com',
                'password' => Hash::make('gaye'),
                'roles' =>'admin',
                'email_verified' => 1,
            ]
        ]);*/

        $user = new User();
        $user->name ='cheikh';
        $user->email ='gaye95cheikh@gmail.com';
        $user->password =Hash::make('gaye');
        $user->roles = 'admin';
        $user->email_verified=1;
        $user->save();

    }
}
