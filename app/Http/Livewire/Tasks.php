<?php
declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{

    /***
     * For more info regarding the Livewire components please refer to the below
     * https://laravel-livewire.com/docs/2.x/making-components
     */

    /***
     * @var
     */
    public $tasks;
    /***
     * @var
     */
    public $description;

    /***
     * @var string[]
     */

    protected $rules = [
        'description' => 'required|string|max:255',
    ];

    /**
     * @return void
     */
    public function mount()
    {
        $this->tasks = Task::all();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.tasks');
    }

    /**
     * @return void
     */
    public function addTask()
    {
        $this->validate();

        Task::create(['description' => $this->description]);

        $this->description = '';
        $this->tasks = Task::all();
    }

    /***
     * @param $taskId
     * @return void
     */
    public function deleteTask(int $taskId)
    {
        Task::find($taskId)->delete();
        $this->tasks = Task::all();
    }

    /***
     * @param $taskId
     * @return void
     */
    public function toggleTaskCompletion($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->update(['completed' => 1]);
        $this->tasks = Task::all();
    }

}
