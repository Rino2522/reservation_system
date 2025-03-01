<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テスト用予約データ
        DB::table('reservations')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'number_of_guests' => 4,
            'date' => '2025-03-01',
            'time' => '18:00:00',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('reservations')->insert([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '0987654321',
            'number_of_guests' => 2,
            'date' => '2025-03-02',
            'time' => '19:00:00',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        // 適当な予約データを追加
        for ($i = 0; $i < 8; $i++) {
            DB::table('reservations')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'phone' => Str::random(10),
                'number_of_guests' => rand(1, 10),
                'date' => '2025-03-' . rand(1, 30),
                'time' => rand(17, 21) . ':00:00',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
