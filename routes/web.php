<?php

use Illuminate\Support\Facades\Route;


/*** Task Route the CRUD system is handled by Livewire Component Task
 * -> app/Http/Livewire/Tasks.php *
 */
Route::get('/', function () {
    return view('tasks.index');
});
