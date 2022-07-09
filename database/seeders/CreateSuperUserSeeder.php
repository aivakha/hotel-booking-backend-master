<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_user = User::create([
            'email' => 'super-user@hotel.com',
            'phone' => '+380980000000',
            'first_name' => 'admin',
            'last_name' => 'super',
            'gender' => 'admin',
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if (!count(Role::findByName('super_user')->get()) > 0) {
            Role::create([
                'name' => 'super_user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        $super_user->assignRole('super_user');
    }
}
