<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name'=>'ادمین',
                'permision'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        );
        Role::factory(1)->create();
    }
}
