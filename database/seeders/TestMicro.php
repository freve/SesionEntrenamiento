<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\SessionType;
use App\Models\Session;

class TestMicro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SessionType::factory()->count(5)->create();
        Session::factory()->count(10)->create();
    }
}
