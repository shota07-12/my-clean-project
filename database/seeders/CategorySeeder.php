<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // 外部キー制約を一時的に無効化
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 初期データを再挿入
        DB::table('categories')->insert([
            ['id' => 1, 'name' => '商品のお届けについて'],
            ['id' => 2, 'name' => '商品の交換について'],
            ['id' => 3, 'name' => '商品トラブル'],
            ['id' => 4, 'name' => 'ショップへのお問い合わせ'],
            ['id' => 5, 'name' => 'その他'],
        ]);
    }
}
