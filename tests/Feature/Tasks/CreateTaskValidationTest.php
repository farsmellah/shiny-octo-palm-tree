<?php

use function Pest\Laravel\postJson;

it('validates payload when creating a task', function ()
{
    postJson(route('tasks.store'), ['title' => ''])
        ->assertStatus(422)
        ->assertJsonValidationErrors(['title']);
});
