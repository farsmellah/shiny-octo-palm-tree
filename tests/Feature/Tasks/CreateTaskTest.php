<?php

use App\Enums\TaskStatusEnum;

use function Pest\Laravel\postJson;

it('creates a task', function ()
{
    $payload = [
        'title'       => 'kill petushok',
        'description' => '???',
        'status'      => TaskStatusEnum::Pending(),
    ];

    postJson(route('tasks.store'), $payload)
        ->assertCreated()
        ->assertJsonPath('data.title', $payload['title'])
        ->assertJsonPath('data.status', $payload['status'])
        ->assertJsonPath('data.description', $payload['description']);
});
