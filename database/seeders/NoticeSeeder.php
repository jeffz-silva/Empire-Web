<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Notice;

class NoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        NoticeSeeder::create("Abertura DDtank Empire", "Seja bem-vindo ao DDtank Empire!", "Jefferson Ataa", "Novidade");
    }

    public static function create(string $title, string $description, string $author, string $type){
        Notice::create([
            'title' => $title,
            'description' => $description,
            'author' => $author,
            'type' => $type
        ]);
    }
}
