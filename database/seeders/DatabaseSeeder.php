<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // カテゴリーを先に入れる
        $this->call(CategorySeeder::class);

        // テストユーザーを作成
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 35件のダミーお問い合わせを作成
        Contact::factory()->count(35)->create();
    }
}
