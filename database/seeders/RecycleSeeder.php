<?php

namespace Database\Seeders;

use App\Models\Recycle;
use Illuminate\Database\Seeder;

class RecycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recycle::factory(10)->create();
    }
}
