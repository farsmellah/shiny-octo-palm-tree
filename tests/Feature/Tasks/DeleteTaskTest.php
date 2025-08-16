<?php

use App\Enums\TaskStatusEnum;
use App\Models\Task;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;

it('deletes a task', function ()
{
    $task = Task::factory()->create(['status' => TaskStatusEnum::Pending()]);

    deleteJson(route('tasks.destroy', $task))
        ->assertNoContent();

    getJson(route('tasks.show', $task))
        ->assertNotFound();
});
