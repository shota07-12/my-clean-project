<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['content' => 'お問い合わせ']);
        Category::create(['content' => '資料請求']);
        Category::create(['content' => 'その他']);
    }
}
