<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create(['name' => 'Chief Executive Officer']);
        Position::create(['name' => 'Chief Operating Officer']);
        Position::create(['name' => 'Chief Financial Officer']);
        Position::create(['name' => 'Chief Technology Officer']);
        Position::create(['name' => 'Marketing Manager']);
        Position::create(['name' => 'Sales Representative']);
        Position::create(['name' => 'Human Resources Manager']);
        Position::create(['name' => 'Product Manager']);
        Position::create(['name' => 'Project Manager']);
        Position::create(['name' => 'Software Engineer']);
        Position::create(['name' => 'Data Analyst']);
        Position::create(['name' => 'Customer Service Representative']);
        Position::create(['name' => 'Administrative Assistant']);
        Position::create(['name' => 'Accountant']);
        Position::create(['name' => 'Graphic Designer']);
    }
}
