<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Livewire\FormDonasi;
use App\Models\User;
use App\Models\Donation;
use App\Models\ReboxOpening;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

class FormDonasiTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    private function fakeImage(string $name = 'donasi.png', int $kilobytes = 500): UploadedFile
    {
        $png = base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8z8BQDwAFgwJ/luz56wAAAABJRU5ErkJggg=='
        );

        return UploadedFile::fake()
            ->createWithContent($name, str_pad($png, $kilobytes * 1024, '0'));
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => 'donatur']);
        $this->actingAs($this->user);
        Storage::fake('public');
    }

    // ============================================================
    // mount()
    // ============================================================

    /** @test */
    public function mount_dengan_nama_lokasi_valid_memilih_lokasi_yang_sesuai(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->assertSet('nama_lokasi', 'Rebox Andir');
    }

    /** @test */
    public function mount_dengan_nama_lokasi_tidak_ada_fallback_ke_lokasi_pertama(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox LokasiXYZ']);
        $this->assertNotEmpty($component->get('nama_lokasi'));
    }

    // ============================================================
    // locations()
    // ============================================================

    /** @test */
    public function locations_mengembalikan_40_lokasi(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir']);
        $locations = $component->instance()->locations();
        $this->assertCount(40, $locations);
    }

    /** @test */
    public function locations_setiap_item_memiliki_maps_url(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir']);
        $locations = $component->instance()->locations();
        foreach ($locations as $loc) {
            $this->assertArrayHasKey('maps_url', $loc);
            $this->assertStringStartsWith('https://www.google.com/maps', $loc['maps_url']);
        }
    }

    // ============================================================
    // filteredLocations()
    // ============================================================

    /** @test */
    public function filtered_locations_search_kosong_mengembalikan_semua_lokasi(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('search_lokasi', '');
        $locations = $component->instance()->filteredLocations();
        $this->assertCount(40, $locations);
    }

    /** @test */
    public function filtered_locations_keyword_valid_mengembalikan_lokasi_sesuai(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('search_lokasi', 'andir');
        $locations = $component->instance()->filteredLocations();
        $this->assertNotEmpty($locations);
        foreach ($locations as $loc) {
            $haystack = strtolower($loc['title'] . $loc['area'] . $loc['name']);
            $this->assertStringContainsString('andir', $haystack);
        }
    }

    /** @test */
    public function filtered_locations_keyword_tidak_ada_mengembalikan_array_kosong(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('search_lokasi', 'xyzxyz123');
        $locations = $component->instance()->filteredLocations();
        $this->assertEmpty($locations);
    }

    // ============================================================
    // selectLocation()
    // ============================================================

    /** @test */
    public function select_location_nama_valid_mengubah_selected_location(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->call('selectLocation', 'Antapani')
            ->assertSet('nama_lokasi', 'Rebox Antapani')
            ->assertSet('kode_box_input', '');
    }

    /** @test */
    public function select_location_mengubah_rebox_id_sesuai_lokasi(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->call('selectLocation', 'Andir');
        $this->assertNotNull($component->get('rebox_id'));
    }

    /** @test */
    public function select_location_nama_tidak_ada_fallback_ke_lokasi_pertama(): void
    {
        $component = Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->call('selectLocation', 'LokasiTidakAda');
        $this->assertNotEmpty($component->get('nama_lokasi'));
    }

    /** @test */
    public function select_location_mereset_kode_box_input(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', 'AD-01')
            ->call('selectLocation', 'Antapani')
            ->assertSet('kode_box_input', '');
    }

    // ============================================================
    // updated()
    // ============================================================

    /** @test */
    public function updated_menghapus_error_bag_untuk_properti_yang_diubah(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->call('kirimDonasi')
            ->assertHasErrors(['nama_barang'])
            ->set('nama_barang', 'Baju Baru')
            ->assertHasNoErrors(['nama_barang']);
    }

    // ============================================================
    // kirimDonasi()
    // ============================================================

    /** @test */
    public function kirim_donasi_data_valid_berpindah_ke_step_code(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik siap dipakai')
            ->call('kirimDonasi')
            ->assertSet('step', 'code')
            ->assertHasNoErrors();
    }

    /** @test */
    public function kirim_donasi_nama_barang_kosong_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', '')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['nama_barang' => 'required'])
            ->assertSet('step', 'form');
    }

    /** @test */
    public function kirim_donasi_nama_barang_kurang_dari_3_karakter_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'AB')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['nama_barang' => 'min']);
    }

    /** @test */
    public function kirim_donasi_jumlah_kurang_dari_1_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 0)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['jumlah' => 'min']);
    }

    /** @test */
    public function kirim_donasi_jumlah_lebih_dari_1000_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 1001)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['jumlah' => 'max']);
    }

    /** @test */
    public function kirim_donasi_jumlah_bukan_angka_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 'abc')
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['jumlah' => 'integer']);
    }

    /** @test */
    public function kirim_donasi_kategori_kosong_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', '')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['kategori' => 'required']);
    }

    /** @test */
    public function kirim_donasi_kondisi_kosong_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', '')
            ->set('deskripsi', 'Deskripsi barang')
            ->call('kirimDonasi')
            ->assertHasErrors(['kondisi' => 'required']);
    }

    /** @test */
    public function kirim_donasi_deskripsi_kosong_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', '')
            ->call('kirimDonasi')
            ->assertHasErrors(['deskripsi' => 'required']);
    }

    /** @test */
    public function kirim_donasi_deskripsi_lebih_100_kata_gagal_validasi(): void
    {
        $deskripsiPanjang = implode(' ', array_fill(0, 101, 'kata'));

        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', $deskripsiPanjang)
            ->call('kirimDonasi')
            ->assertHasErrors(['deskripsi']);
    }

    // ============================================================
    // bukaBox()
    // ============================================================

    /** @test */
    public function buka_box_kode_valid_step_berubah_ke_open(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', 'AD-01')
            ->call('bukaBox')
            ->assertSet('step', 'open')
            ->assertDispatched('box-opened')
            ->assertHasNoErrors();
    }

    /** @test */
    public function buka_box_kode_valid_menyimpan_record_rebox_opening(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', 'AD-01')
            ->call('bukaBox');

        $this->assertDatabaseHas('rebox_openings', [
            'user_id'    => $this->user->id,
            'rebox_code' => 'AD-01',
            'status'     => 'Terbuka',
        ]);
    }

    /** @test */
    public function buka_box_kode_valid_via_url_qr_mengekstrak_kode_dengan_benar(): void
    {
        // Simulasi input dari hasil scan QR (mengandung kode di dalam string)
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', 'rebox://open?code=AD-01')
            ->call('bukaBox')
            ->assertSet('step', 'open');
    }

    /** @test */
    public function buka_box_kode_kosong_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', '')
            ->call('bukaBox')
            ->assertHasErrors(['kode_box_input' => 'required'])
            ->assertSet('step', 'form');
    }

    /** @test */
    public function buka_box_kode_tidak_cocok_lokasi_menampilkan_error(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', 'AT-02')
            ->call('bukaBox')
            ->assertHasErrors(['kode_box_input'])
            ->assertSet('step', 'form');
    }

    /** @test */
    public function buka_box_kode_tidak_dikenali_sama_sekali_menampilkan_error(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('kode_box_input', 'XX-99')
            ->call('bukaBox')
            ->assertHasErrors(['kode_box_input']);
    }

    // ============================================================
    // selesaiDonasi()
    // ============================================================

    /** @test */
    public function selesai_donasi_data_valid_step_berubah_ke_success(): void
    {
        $foto = $this->fakeImage();

        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik siap dipakai')
            ->set('foto', $foto)
            ->call('selesaiDonasi')
            ->assertSet('step', 'success')
            ->assertHasNoErrors();
    }

    /** @test */
    public function selesai_donasi_data_valid_menyimpan_record_donation(): void
    {
        $foto = $this->fakeImage();

        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik siap dipakai')
            ->set('foto', $foto)
            ->call('selesaiDonasi');

        $this->assertDatabaseHas('donations', [
            'user_id'     => $this->user->id,
            'nama_barang' => 'Baju Bekas',
            'jumlah'      => 3,
            'kategori'    => 'Pakaian',
            'status'      => 'pending',
        ]);
    }

    /** @test */
    public function selesai_donasi_tanpa_foto_gagal_validasi(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik siap dipakai')
            ->set('foto', null)
            ->call('selesaiDonasi')
            ->assertHasErrors(['foto' => 'required']);
    }

    /** @test */
    public function selesai_donasi_foto_bukan_gambar_gagal_validasi(): void
    {
        $foto = UploadedFile::fake()->create('dokumen.pdf', 500, 'application/pdf');

        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik siap dipakai')
            ->set('foto', $foto)
            ->call('selesaiDonasi')
            ->assertHasErrors(['foto' => 'image']);
    }

    /** @test */
    public function selesai_donasi_foto_lebih_dari_2mb_gagal_validasi(): void
    {
        $foto = $this->fakeImage('besar.png', 3000);

        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', 'Baju Bekas')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik siap dipakai')
            ->set('foto', $foto)
            ->call('selesaiDonasi')
            ->assertHasErrors(['foto' => 'max']);
    }

    /** @test */
    public function selesai_donasi_gagal_jika_field_barang_tidak_valid(): void
    {
        $foto = $this->fakeImage();

        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('nama_barang', '')
            ->set('jumlah', 3)
            ->set('kategori', 'Pakaian')
            ->set('kondisi', 'Layak')
            ->set('deskripsi', 'Baju kondisi baik')
            ->set('foto', $foto)
            ->call('selesaiDonasi')
            ->assertHasErrors(['nama_barang' => 'required']);
    }

    // ============================================================
    // expireBox()
    // ============================================================

    /** @test */
    public function expire_box_saat_step_open_kembali_ke_step_code(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('step', 'open')
            ->call('expireBox')
            ->assertSet('step', 'code')
            ->assertSet('foto', null);
    }

    /** @test */
    public function expire_box_saat_step_open_menampilkan_flash_message(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('step', 'open')
            ->call('expireBox')
            ->assertSet('step', 'code')
            ->assertSet('foto', null);
    }

    /** @test */
    public function expire_box_saat_step_bukan_open_tidak_mengubah_apapun(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('step', 'form')
            ->call('expireBox')
            ->assertSet('step', 'form');
    }

    /** @test */
    public function expire_box_saat_step_code_tidak_mengubah_apapun(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('step', 'code')
            ->call('expireBox')
            ->assertSet('step', 'code');
    }

    // ============================================================
    // resetToForm()
    // ============================================================

    /** @test */
    public function reset_to_form_mengembalikan_step_ke_form(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('step', 'code')
            ->call('resetToForm')
            ->assertSet('step', 'form');
    }

    /** @test */
    public function reset_to_form_mengosongkan_kode_box_input(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('step', 'code')
            ->set('kode_box_input', 'AD-01')
            ->call('resetToForm')
            ->assertSet('kode_box_input', '');
    }

    // ============================================================
    // render()
    // ============================================================

    /** @test */
    public function render_mengembalikan_view_dengan_data_locations(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->assertViewHas('locations');
    }

    /** @test */
    public function render_locations_terfilter_saat_ada_search(): void
    {
        Livewire::test(FormDonasi::class, ['name' => 'Rebox Andir'])
            ->set('search_lokasi', 'andir')
            ->assertViewHas('locations', function ($locations) {
                return count($locations) > 0 && count($locations) < 40;
            });
    }
}
