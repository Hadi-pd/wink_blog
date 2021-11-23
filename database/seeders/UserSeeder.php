<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin')
            ]
        );
        $role = Role::create(
            ['name' => 'admin']
        );
        RoleUser::create(
            [
                'role_id' => $role->id,
                'user_id' => $user->id
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user1',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user2@gmail.com'],
            [
                'name' => 'user2',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user3@gmail.com'],
            [
                'name' => 'user3',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user4@gmail.com'],
            [
                'name' => 'user4',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user5@gmail.com'],
            [
                'name' => 'user5',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user6@gmail.com'],
            [
                'name' => 'user6',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user7@gmail.com'],
            [
                'name' => 'user7',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user8@gmail.com'],
            [
                'name' => 'user8',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user9@gmail.com'],
            [
                'name' => 'user9',
                'password' => Hash::make('user')
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user10@gmail.com'],
            [
                'name' => 'user10',
                'password' => Hash::make('user')
            ]
        );
        $role = Role::create(
            ['name' => 'user']
        );
        RoleUser::create(
            [
                'role_id' => $role->id,
                'user_id' => $user->id
            ]
        );
        $role=Role::create(
            ['name'=>'author']
        );
    }
}
