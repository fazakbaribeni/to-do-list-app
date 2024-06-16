<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // Tasks without any actions
        Task::factory()->count(3)->create();

        // Completed Tasks
        Task::factory()->count(3)->set('completed', true)->create();



    }
}
