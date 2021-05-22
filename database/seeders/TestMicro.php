<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\SessionType;
use App\Models\Session;
use App\Models\Method;

class TestMicro extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SessionType::factory()->count(3)->create();
        Session::factory()->count(6)->create();
        Method::factory()->count(10)->create();
    }
}
