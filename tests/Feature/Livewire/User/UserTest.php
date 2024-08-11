<?php

namespace Tests\Feature\Livewire\User;

use App\Livewire\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(User::class)
            ->assertStatus(200);
    }
}
