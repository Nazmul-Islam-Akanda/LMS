<?php

namespace Database\Seeders;

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
        User::Create([
            //db feild name || form field name
            'id'=>'1',
            'name'=>'admin',
            'e_department'=>'Admin',
            'e_designation'=>'Admin',
            'dob'=>'2000-04-21',
            'contact'=>'01860447466',
            'address'=>'Uttara',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('admin')
        ]);
    }
}
