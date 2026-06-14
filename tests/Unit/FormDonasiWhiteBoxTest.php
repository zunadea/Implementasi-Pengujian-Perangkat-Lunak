<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Livewire\FormDonasi;
use App\Models\User;
use App\Models\ReboxOpening;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class FormDonasiWhiteBoxTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => 'donatur']);
        $this->actingAs($this->user);
    }

    /** PATH 1: kode_box_input kosong */
    public function test_path1_kode_kosong_menampilkan_error_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Andir'])
            ->set('kode_box_input', '')
            ->call('bukaBox')
            ->assertHasErrors(['kode_box_input' => 'required']);
    }

    /** PATH 2: kode tidak cocok dengan lokasi yang dipilih */
    public function test_path2_kode_tidak_cocok_menampilkan_error(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Andir'])
            ->set('kode_box_input', 'XX-99')
            ->call('bukaBox')
            ->assertHasErrors(['kode_box_input']);
    }

    /** PATH 3: kode cocok, tabel tidak ada (skip DB insert) */
    public function test_path3_kode_cocok_step_berubah(): void
{
    Livewire::test(FormDonasi::class, ['name' => 'Andir'])
        ->set('kode_box_input', 'AD-01')
        ->call('bukaBox')
        ->assertSet('step', 'open');
}

    /** PATH 4: kode cocok, tabel ada → simpan record */
    public function test_path4_kode_cocok_dengan_tabel_menyimpan_record(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Andir'])
            ->set('kode_box_input', 'AD-01')
            ->call('bukaBox')
            ->assertSet('step', 'open')
            ->assertDispatched('box-opened');

        $this->assertDatabaseHas('rebox_openings', [
            'user_id'    => $this->user->id,
            'rebox_code' => 'AD-01',
            'status'     => 'Terbuka',
        ]);
    }
}