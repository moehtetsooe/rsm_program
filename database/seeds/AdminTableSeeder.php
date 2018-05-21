<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'name' => 'superadmin',
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('internet'),
        	'role' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
    }
}
