<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(
            [
                'name'=>'ادمین',
                'permision'=>1
            ]
        );
        User::create(
            [
                'fname' => 'علی',
                'lname' => 'منصوری',
                'email' => 'alims98@gmail.com',
                'password' => Hash::make('123456789'),
                'role_id' => $admin->id,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
        );

        Category::factory()->count(3)->create();
        Tag::factory()->count(100)->create();

        Role::factory()->has(
            User::factory()->has(
                Article::factory()->count(rand(3,15))
            )->count(3)
        )->count(1)->create();
    }
}
