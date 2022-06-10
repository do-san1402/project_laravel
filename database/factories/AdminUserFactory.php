<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AdminUser;
use App\Models\Roles;

class AdminUserFactory extends Factory
{
    protected $model = AdminUser::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'admin_name' => $this->faker->name(),
            'admin_phone' => '0867474667',
            'admin_email' => $this->faker->unique()->safeEmail(),
            'amdin_password' => 'e10adc3949ba59abbe56e057f20f883e', 
        ];
    }
    // $factory->afterCreating(AdminUser::class, function($admin, $faker) {
    //     $roles = Roles::where('name' , 'user') -> get();
    //     $admin -> roles() -> sync($roles->pluck('id') -> toArray())
    // });
}
