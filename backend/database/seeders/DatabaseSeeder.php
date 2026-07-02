<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Ноутбук Lenovo IdeaPad', 'description' => 'Компактный ноутбук для работы и учебы.', 'price' => 52990],
            ['name' => 'Смартфон Samsung Galaxy', 'description' => 'Смартфон с AMOLED-экраном и быстрой зарядкой.', 'price' => 39990],
            ['name' => 'Беспроводные наушники Sony', 'description' => 'Наушники с шумоподавлением и автономностью до 30 часов.', 'price' => 18990],
            ['name' => 'Монитор LG UltraWide', 'description' => 'Широкоформатный монитор для работы с несколькими окнами.', 'price' => 29990],
            ['name' => 'Клавиатура Logitech MX Keys', 'description' => 'Тихая беспроводная клавиатура с подсветкой.', 'price' => 11990],
            ['name' => 'Мышь Logitech MX Master', 'description' => 'Эргономичная мышь для продуктивной работы.', 'price' => 9990],
            ['name' => 'Планшет Apple iPad', 'description' => 'Планшет для заметок, чтения и мультимедиа.', 'price' => 44990],
            ['name' => 'Умные часы Huawei Watch', 'description' => 'Часы с мониторингом активности и уведомлениями.', 'price' => 14990],
            ['name' => 'Внешний SSD Samsung T7', 'description' => 'Быстрый переносной SSD на 1 ТБ.', 'price' => 12990],
            ['name' => 'Wi-Fi роутер TP-Link Archer', 'description' => 'Двухдиапазонный роутер для квартиры и офиса.', 'price' => 6990],
            ['name' => 'Игровая приставка PlayStation', 'description' => 'Консоль для игр и мультимедиа.', 'price' => 59990],
            ['name' => 'Электронная книга PocketBook', 'description' => 'Ридер с экраном E Ink и подсветкой.', 'price' => 16990],
            ['name' => 'Портативная колонка JBL', 'description' => 'Влагозащищенная колонка с насыщенным звуком.', 'price' => 8990],
            ['name' => 'Веб-камера Logitech C920', 'description' => 'Full HD веб-камера для звонков и стримов.', 'price' => 7990],
            ['name' => 'Микрофон HyperX SoloCast', 'description' => 'USB-микрофон для созвонов и записи голоса.', 'price' => 6490],
            ['name' => 'Графический планшет Wacom', 'description' => 'Планшет для рисования и ретуши.', 'price' => 10990],
            ['name' => 'Power Bank Xiaomi', 'description' => 'Внешний аккумулятор емкостью 20000 мАч.', 'price' => 3490],
            ['name' => 'Зарядное устройство Baseus', 'description' => 'Компактное GaN-зарядное устройство на 65 Вт.', 'price' => 3990],
            ['name' => 'USB-C хаб Anker', 'description' => 'Хаб с HDMI, USB и кардридером.', 'price' => 5990],
            ['name' => 'Рюкзак для ноутбука Thule', 'description' => 'Городской рюкзак с защищенным отделением для ноутбука.', 'price' => 13990],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
