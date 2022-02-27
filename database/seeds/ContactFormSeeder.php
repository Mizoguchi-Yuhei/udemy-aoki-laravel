<?php

use Illuminate\Database\Seeder;
use App\Models\ContactForm;

class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fakerで作ったダミーデータを呼び出す
        factory(ContactForm::class, 200)->create(); // 200個のダミーデータ生成
    }
}
