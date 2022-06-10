<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::truncate();
        $adminRoles = Roles::where('name', 'admin') -> first();
        $authorRoles = Roles::where('name', 'author') -> first();
        $userRoles = Roles::where('name', 'user')-> first();
        $admin = AdminUser::create([
            'admin_email' => 'doquangsan@gmail.com',
            'admin_password' => md5('123456'),
            'admin_name' => 'DQSadmin',
            'admin_phone' => '0867474887'
        ]);
        $author = AdminUser::create([
            'admin_email' => 'doquangsan@gmail.com',
            'admin_password' => md5('123456'),
            'admin_name' => 'DQSauthor',
            'admin_phone' => '0867474887'
        ]);
        $user = AdminUser::create([
            'admin_email' => 'doquangsan@gmail.com',
            'admin_password' => md5('123456'),
            'admin_name' => 'DQSuser',
            'admin_phone' => '0867474887'
        ]);
        $admin-> roles() -> attach($adminRoles);
        $author-> roles() -> attach($authorRoles);
        $user-> roles() -> attach($userRoles);
    }
}
