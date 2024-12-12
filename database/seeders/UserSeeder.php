<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'full_name' => "Alex Pereira",
            'DNI' => "3084",
            'photo' => "3084_profile_image.png",
            'password' => Hash::make("admin"),
            'status' => 1,
        ]);

        $user1->assignRole('admin');

    }
}
