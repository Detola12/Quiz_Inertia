<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'user',
            'description' => 'user',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        User::factory()->create([
            'name' => 'Adegboye Emmanuel',
            'email' => 'emma@test.com',
            'password' => Hash::make('12345678'),
        ]);

        $this->call(SectionSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
