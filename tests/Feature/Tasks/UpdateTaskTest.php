<?php

use App\Enums\TaskStatusEnum;
use App\Models\Task;

use function Pest\Laravel\putJson;

it('updates a task status', function ()
{
    $task = Task::factory()->create(['status' => TaskStatusEnum::Pending()]);

    putJson(route('tasks.update', $task), [
        'status' => TaskStatusEnum::Done(),
    ])
        ->assertOk()
        ->assertJsonPath('data.status', TaskStatusEnum::Done());
});
