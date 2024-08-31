<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Using ORM Eloquent
        $user = new User;
        $user->document = 75000001;
        $user->fullname = 'John Wick';
        $user->gender = 'Male';
        $user->birthdate = '1988-10-07';
        $user->phone = '3100000001';
        $user->email = 'jhonwick@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        $user = new User;
        $user->document = 75000002;
        $user->fullname = 'Dahiana Rave';
        $user->gender = 'Female';
        $user->birthdate = '1996-03-26';
        $user->phone = '3147348431';
        $user->email = 'dahianarave18@gmail.com';
        $user->password = bcrypt('admin');
        $user->role = 'Administrator';
        $user->save();

        // using DB Array
        DB::table('users')->insert([
            'document'   => 75000003,
            'fullname'   => 'Alanis Morrisete',
            'gender'     => 'Female',
            'birthdate'  =>  '1970-05-10',
            'phone'      => '3100000003',
            'email'      => 'alanism@gmail.com',
            'password'   => bcrypt('12345'),
            'role'       => 'Customer',
            'created_at' =>now(),
            'updated_at'  =>now()
        ]);

    }
}
