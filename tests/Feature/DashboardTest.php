<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('aquiempiezatodo'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the aquiempiezatodo', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('aquiempiezatodo'));
    $response->assertStatus(200);
});