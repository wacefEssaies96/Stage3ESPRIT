<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'wacef.essaies@esprit.tn',
            'gender' => 'Male',
            'type' => 'Super admin',
            'state' => 'Zarzouna',
            'password' => bcrypt('12345678'),
            'phoneNbr' => 13245678,
            'image' => ' '
        ]);

        factory(App\User::class, 30)->create();
    }
}
