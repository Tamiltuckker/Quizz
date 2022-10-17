<?php
  
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456')
            ]
        ];

        foreach($users as $user)
        {
            $newUser = User::firstOrCreate(
                [
                    'email' => $user['email']
                ],
                [
                    'name' => $user['name'],
                    'password' => $user['password']
                ]
            );

            $roles = Role::firstOrCreate(
                [
                    'name' => $user['name']
                ],
                [
                    'name' => $user['name'],
                    'guard_name'=> 'web'
                ]
            );
            $newUser->roles()->detach($newUser->roles);
            if ($newUser->name == Role::ADMIN) {
                $newUser->assignRole(Role::ADMIN);
            }
            else if ($newUser->name == Role::USER) {
                $newUser->assignRole(Role::USER);
            }
        }
    }
}