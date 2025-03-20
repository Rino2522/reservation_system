<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use DateTime;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // テスト用予約データ
        DB::table('reservations')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'number_of_guests' => 4,
            'date' => '2025-03-01',
            'time' => '18:00',
            'meal_type' => 'コース', // 固定値
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('reservations')->insert([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '0987654321',
            'number_of_guests' => 2,
            'date' => '2025-03-02',
            'time' => '19:00',
            'meal_type' => 'アラカルト', // 固定値
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        // 適当な予約データを追加
        for ($i = 0; $i < 8; $i++) {
            DB::table('reservations')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone' => mt_rand(1000000000, 9999999999), // 10桁の数値
                'number_of_guests' => rand(1, 8), // 1〜8名に制限
                'date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // 未来の日付
                'time' => $faker->time('H:i'), // `H:i` フォーマット
                'meal_type' => $faker->randomElement(['コース', 'アラカルト']), // ランダムに選択
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
