<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::insert([
            ['name' => 'Klient', 'is_active' => true],
            ['name' => 'Pracownik', 'is_active' => true],
            ['name' => 'Administrator', 'is_active' => true],
        ]);

        $admin = \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.pl',
            'password' => \Illuminate\Support\Facades\Hash::make('admin'),
            'pesel' => '00000000000'
        ]);

        $admin->created_by = $admin->id;
        $admin->updated_by = $admin->id;
        $admin->save();

        $admin->roles()->attach(3);

        $employee = \App\Models\User::create([
            'name' => 'Pracownik',
            'email' => 'pracownik@test.pl',
            'password' => \Illuminate\Support\Facades\Hash::make('pracownik'),
            'pesel' => '11111111111'
        ]);

        $employee->created_by = $admin->id; 
        $employee->updated_by = $admin->id;
        $employee->save();

        $employee->roles()->attach(2);
        
        $this->call([
            CarSeeder::class,
        ]);
    }
}
