<?php
// tests/Feature/TasksTest.php
namespace Tests\Feature;

use App\Http\Livewire\Tasks;
use App\Models\Task;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function it_mounts_the_component_and_retrieves_all_tasks()
    {
        Task::factory()->create(['description' => 'Test Task 1']);
        Task::factory()->create(['description' => 'Test Task 2']);

        Livewire::test(Tasks::class)
            ->assertSet('tasks', function ($tasks) {
                return count($tasks) === 2;
            });
    }

    /** @test */
    public function it_adds_a_new_task()
    {
        Livewire::test(Tasks::class)
            ->set('description', 'New Task')
            ->call('addTask')
            ->assertSet('description', '')
            ->assertSee('New Task');

        $this->assertDatabaseHas('tasks', ['description' => 'New Task']);
    }

    /** @test */
    public function it_deletes_a_task()
    {
        $task = Task::factory()->create(['description' => 'Task to Delete']);

        Livewire::test(Tasks::class)
            ->call('deleteTask', $task->id)
            ->assertDontSee('Task to Delete');

        $this->assertDatabaseMissing('tasks', ['description' => 'Task to Delete']);
    }

    /** @test */
    public function it_toggles_task_completion()
    {
        $task = Task::factory()->create(['description' => 'Incomplete Task', 'completed' => 0]);

        Livewire::test(Tasks::class)
            ->call('toggleTaskCompletion', $task->id)
            ->assertSet('tasks', function ($tasks) {
                return $tasks->first()->completed === 1;
            });

        $this->assertDatabaseHas('tasks', ['description' => 'Incomplete Task', 'completed' => 1]);
    }
}
