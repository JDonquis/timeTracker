<?php

namespace Database\Seeders;

use App\Models\TypeHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeHour::create(['name' => 'Regular', 'type' => 1]);
        TypeHour::create(['name' => 'Overtime', 'type' => 1]);
        TypeHour::create(['name' => 'Vacation', 'type' => 2]);
        TypeHour::create(['name' => 'Sick Leave', 'type' => 2]);
        TypeHour::create(['name' => 'Bereavement Leave', 'type' => 2]);
        TypeHour::create(['name' => 'Jury Duty', 'type' => 2]);
        TypeHour::create(['name' => 'Office Closure', 'type' => 2]);


    }
}
