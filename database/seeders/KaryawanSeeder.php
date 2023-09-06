<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
           [ 
            'nama' => 'Doni',
            'nip' => '1234',
            'jabatan' => 'Direktur',
            'password' => Hash::make("123456")
        ],
        [
            'nama' => 'Dono',
            'nip' => '1235',
            'jabatan' => 'Finance',
            'password' => Hash::make("123456")
        ],
        [
            'nama' => 'Dona',
            'nip' => '1236',
            'jabatan' => 'Staf',
            'password' => Hash::make("123456")
        ]
        ])->each(fn ($data) => User::create($data));
    }
}
