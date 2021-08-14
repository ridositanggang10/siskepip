<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = User::create([
        //     'name' => 'admin',
        //     'instansiID' => '87e8ac24-c5bd-44ed-8ddd-543bc869ec04',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('admin2020'),
        //     'status' => 'active'
        // ]);
        // $admin->attachRole('admin');
        // event(new Registered($admin));

        // $diskominfo = User::create([
        //     'name' => 'DISKOMINFO',
        //     'instansiID' => '87e8ac24-c5bd-44ed-8ddd-543bc869ec04',
        //     'email' => 'admin@diskominfo.com',
        //     'password' => Hash::make('diskominfo2020'),
        //     'status' => 'active'
        // ]);
        // $diskominfo->attachRole('user');
        // event(new Registered($diskominfo));

        // $dispen = User::create([
        //     'name' => 'DSIPEN',
        //     'instansiID' => 'ffd43553-90f5-4f48-b1fa-4cef112ba968',
        //     'email' => 'admin@dispen.com',
        //     'password' => Hash::make('dispen2020'),
        //     'status' => 'active'
        // ]);
        // $dispen->attachRole('user');
        // event(new Registered($dispen));

        // $dinkes = User::create([
        //     'name' => 'DINKES',
        //     'instansiID' => '8bbe0759-3903-4912-b947-9d65deb0f777',
        //     'email' => 'admin@dinkes.com',
        //     'password' => Hash::make('dinkes2020'),
        //     'status' => 'active'
        // ]);
        // $dinkes->attachRole('user');
        // event(new Registered($dinkes));

        $dinsos = User::create([
            'name' => 'DINSOS II',
            'instansiID' => '33fed598-b6a4-43a2-9262-679e798119fe',
            'email' => 'admin@dinsos2.com',
            'password' => Hash::make('dinsos2020'),
            'status' => 'active'
        ]);
        $dinsos->attachRole('admin');
        event(new Registered($dinsos));
    }
}
