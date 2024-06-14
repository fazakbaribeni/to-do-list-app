<div class="row">
    <div class="col-sm-4">
        <!-- Error Reporting for User -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form wire:submit.prevent="addTask" class="task-form">
            <div class="form-group">
                <input type="text" class="form-control" wire:model="description" placeholder="Insert task description"
                       required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
    </div>
    <div class="col-sm-8">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="{{ $task->completed ? 'task-completed' : '' }}">{{ $task->description }}</td>
                    <td>
                        @if(!$task->completed)
                            <button wire:click="toggleTaskCompletion({{ $task->id }})" class="btn btn-success">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <button wire:click="deleteTask({{ $task->id }})" class="btn btn-danger text-white">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
