<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_donor_can_access_donor_pages(): void
    {
        $donor = User::factory()->create(['role' => 'donatur']);

        $this->actingAs($donor)->get('/dashboard')->assertOk();
        $this->actingAs($donor)->get('/form-donasi')->assertOk();
        $this->actingAs($donor)->get('/riwayat-permintaan')->assertOk();
    }

    public function test_recipient_cannot_access_donor_only_pages(): void
    {
        $recipient = User::factory()->create(['role' => 'penerima']);

        $this->actingAs($recipient)->get('/form-donasi')->assertForbidden();
        $this->actingAs($recipient)->get('/riwayat-permintaan')->assertForbidden();
    }

    public function test_admin_cannot_access_regular_user_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get('/dashboard')->assertForbidden();
        $this->actingAs($admin)->get('/admin/verifikasi')->assertOk();
    }

    public function test_logout_only_accepts_post_requests(): void
    {
        $donor = User::factory()->create(['role' => 'donatur']);

        $this->actingAs($donor)->get('/logout')->assertMethodNotAllowed();
        $this->actingAs($donor)->post('/logout')->assertRedirect('/login');
        $this->assertGuest();
    }
}
