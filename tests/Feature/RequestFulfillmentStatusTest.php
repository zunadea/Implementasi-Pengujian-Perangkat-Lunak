<?php

namespace Tests\Feature;

use App\Livewire\Permintaan;
use App\Livewire\Riwayat;
use App\Models\PermintaanModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class RequestFulfillmentStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_fulfilling_a_pending_request_marks_it_as_approved(): void
    {
        $recipient = User::factory()->create(['role' => 'penerima']);
        $donor = User::factory()->create(['role' => 'donatur']);
        $request = $this->createRequest($recipient, [
            'status' => 'Pending',
            'fulfilled_by_user_id' => null,
            'fulfilled_at' => null,
        ]);

        Livewire::actingAs($donor)
            ->test(Permintaan::class)
            ->set('selectedRequest', [
                'id' => $request->id,
                'nama_barang' => $request->nama_barang,
                'kategori_barang' => $request->kategori,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'penerima' => $recipient->name,
                'penerima_photo' => null,
                'jenis_penerima' => 'Komunitas',
                'lokasi' => $request->lokasi_hub,
                'maps_url' => $request->google_maps_link,
                'status' => 'Butuh bantuan',
                'date_label' => 'Baru saja',
            ])
            ->set('salurkan_nama_barang', $request->nama_barang)
            ->set('salurkan_kategori', $request->kategori)
            ->set('salurkan_jumlah', $request->jumlah)
            ->call('completeFulfillment');

        $this->assertDatabaseHas('permintaan', [
            'id' => $request->id,
            'status' => 'Disetujui',
            'fulfilled_by_user_id' => $donor->id,
        ]);
    }

    public function test_donor_can_start_delivery_for_an_approved_request(): void
    {
        [$recipient, $donor, $request] = $this->approvedRequest();

        Livewire::actingAs($donor)
            ->test(Riwayat::class)
            ->call('openDonorSalurkanDetail', $request->id)
            ->assertSet('selectedDonorRequest.status', 'Disetujui')
            ->assertSet('selectedDonorRequest.can_start_delivery', true)
            ->call('startDelivery')
            ->assertSet('selectedDonorRequest.status', 'Diproses')
            ->assertSet('selectedDonorRequest.can_start_delivery', false);

        $this->assertDatabaseHas('permintaan', [
            'id' => $request->id,
            'status' => 'Diproses',
            'fulfilled_by_user_id' => $donor->id,
        ]);
    }

    public function test_another_donor_cannot_start_delivery(): void
    {
        [, , $request] = $this->approvedRequest();
        $otherDonor = User::factory()->create(['role' => 'donatur']);

        Livewire::actingAs($otherDonor)
            ->test(Riwayat::class)
            ->set('selectedDonorRequestId', $request->id)
            ->set('selectedDonorDetailType', 'salurkan')
            ->call('startDelivery');

        $this->assertDatabaseHas('permintaan', [
            'id' => $request->id,
            'status' => 'Disetujui',
        ]);
    }

    public function test_recipient_feedback_marks_processing_request_as_received(): void
    {
        Storage::fake('public');
        [$recipient, , $request] = $this->approvedRequest();
        $request->update(['status' => 'Diproses']);

        Livewire::actingAs($recipient)
            ->test(Riwayat::class)
            ->call('openRecipientDetail', $request->id)
            ->call('openFeedbackForm')
            ->set('feedback_photo', UploadedFile::fake()->createWithContent(
                'diterima.png',
                base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=')
            ))
            ->set('feedback_nama_barang', $request->nama_barang)
            ->set('feedback_jumlah', $request->jumlah)
            ->set('feedback_note', 'Barang sudah diterima dengan baik.')
            ->call('submitFeedback')
            ->assertSet('selectedRecipientRequest.status', 'Diterima');

        $request->refresh();

        $this->assertSame('Diterima', $request->status);
        $this->assertNotNull($request->feedback_at);
        Storage::disk('public')->assertExists($request->feedback_photo);
    }

    private function approvedRequest(): array
    {
        $recipient = User::factory()->create(['role' => 'penerima']);
        $donor = User::factory()->create(['role' => 'donatur']);

        $request = $this->createRequest($recipient, [
            'status' => 'Disetujui',
            'fulfilled_by_user_id' => $donor->id,
            'fulfilled_at' => now(),
        ]);

        return [$recipient, $donor, $request];
    }

    private function createRequest(User $recipient, array $overrides = []): PermintaanModel
    {
        return PermintaanModel::create(array_merge([
            'user_id' => $recipient->id,
            'nama_barang' => 'Baju Layak Pakai',
            'kategori' => 'Pakaian',
            'jenis_penerima' => 'Komunitas',
            'jumlah' => 5,
            'deskripsi' => 'Baju untuk kegiatan sosial komunitas.',
            'urgensi' => 'Normal',
            'lokasi_hub' => 'Bandung',
            'google_maps_link' => 'https://maps.google.com/?q=Bandung',
        ], $overrides));
    }
}
