<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $rows = [

            [
                'user_group_id' => 1,
                'name' => 'Sunil Prajapati',
                'email' => 'sunil@youngminds.com.np',
                'password' => bcrypt('sunil'),
                'designation_id'=>1,
                'user_status'=>'active',
            ],
        ];
        DB::table('users')->insert($rows);
    }
}
