<?php

namespace Database\Seeders;

use App\Models\RechargeInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RechargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        //
        self::CreateRecharge('8', 1000);
        self::CreateRecharge('24', 3000);
        self::CreateRecharge('40', 5000);
        self::CreateRecharge('80', 10000);
        self::CreateRecharge('120', 20000);
        self::CreateRecharge('150', 30000);
        self::CreateRecharge('200', 45000);
    }

    private static function CreateRecharge(int $Price, int $Money){
        RechargeInfo::create([
            'Price' => $Price,
            'Money' => $Money
        ]);
    }
}
