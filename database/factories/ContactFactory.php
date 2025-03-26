<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement([1, 2, 3]),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify('0##########'),
            'address' => $this->faker->address,
            'building' => $this->faker->secondaryAddress,
            'category_id' => $this->faker->numberBetween(1, 5), // 1~5のカテゴリID
            'detail' => $this->faker->randomElement([
                '注文した商品が届かないのですが、いつ届きますか？',
                'サイズを間違えて注文してしまいました。交換できますか？',
                '支払い完了メールが届きません。',
                '返品方法について詳しく教えてください。',
                '領収書の発行は可能ですか？',
                '発送先の住所を変更したいのですが、可能でしょうか？',
                '不良品が届いたため、交換を希望します。',
            ]),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
