<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AccountSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = Str::uuid();

        $user = [
            [
                '_id' => $user_id,
                'username' => 'Periksa Gula Darah Sewaktu',
                'description' => bcrypt('password'),
                'role' => 'admin',
            ],
        ];

        $userDetail = [
            [
                'user_id' => $user_id,
                'fullname' => 'Administrator',
                'division' => 'Bidang PMTM',
            ]
            ];
        User::insert($user);
        
    }
}
