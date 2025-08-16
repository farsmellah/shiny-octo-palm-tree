<?php

use App\Models\Task;
use Illuminate\Testing\Fluent\AssertableJson;

use function Pest\Laravel\getJson;


it('lists tasks', function ()
{
    Task::factory()->count(3)->create();

    getJson(route('tasks.index'))
        ->assertOk()
        ->assertJsonCount(3, 'data')
        ->assertJson(
            fn(AssertableJson $json) =>
            $json->has(
                'data.0',
                fn($item) =>
                $item->whereAllType([
                    'id'         => 'integer',
                    'title'      => 'string',
                    'status'     => 'string',
                    'created_at' => 'string',
                    'updated_at' => 'string',
                ])->etc()
            )
        );
});
