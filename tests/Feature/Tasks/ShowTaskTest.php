<?php

use App\Enums\TaskStatusEnum;
use App\Models\Task;

use function Pest\Laravel\getJson;

it('shows a task', function ()
{
    $task = Task::factory()->create(['status' => TaskStatusEnum::Pending()]);

    getJson(route('tasks.show', $task))
        ->assertOk()
        ->assertJsonPath('data.id', $task->id);
});
