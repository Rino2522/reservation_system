<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テスト用user
        DB::table('users')->insert([
                'name' => 'test',
                'email' => 'test@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('testtest'),
                'remember_token' => Str::random(10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);

        DB::table('users')->insert([
                'name' => 'test2',
                'email' => 'test2@mail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('testtest2'),
                'remember_token' => Str::random(10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);


        // 適当なuser
        User::factory()->count(8)->create();
    }
}
