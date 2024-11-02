<?php

use function Livewire\Volt\{state, with};

state(["task"]);

with([
    'todos' => fn() => auth()->user()->todos
]);

$add = function() {
    auth()->user()->todos()->create([
        'task' => $this->task
    ]);

};

$delete = fn(\App\Models\Todo $todo) => $todo->delete();

?>

<div>
    <form wire:submit='add'>
        <input type="text" wire:model='task'>
        <button type="submit">Add</button>
    </form>

    <div>
        @foreach($todos as $todo)
            <div>
                {{ $todo->task }}
                <button wire:click='delete({{ $todo->id }})'>X</button>
            </div>

        @endforeach
    </div>
</div>
