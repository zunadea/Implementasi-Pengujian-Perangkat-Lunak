<?php

namespace Tests\Integration;

use App\Livewire\Dashboard;
use App\Livewire\FormDonasi;
use App\Livewire\Login;
use App\Livewire\Permintaan;
use App\Livewire\Profile;
use App\Livewire\Register;
use App\Livewire\Riwayat;
use App\Models\Donation;
use App\Models\PermintaanModel;
use App\Models\ReboxOpening;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\Support\FakesUploadedImages;
use Tests\TestCase;

/**
 * ============================================================
 *  INT – ALUR SISTEM INTEGRATION TEST  (ReBox)
 * ============================================================
 *  Modul yang diuji:
 *   1. Autentikasi (register, login, logout)
 *   2. Donasi (alur form → kode box → simpan ke DB)
 *   3. Permintaan (ajukan, penuhi, feedback)
 *   4. Profil & Verifikasi NIK
 *   5. Dashboard (statistik & proteksi akses)
 * ============================================================
 */
class AlurSistemIntegrationTest extends TestCase
{
    use RefreshDatabase;
    use FakesUploadedImages;

    // ──────────────────────────────────────────────────────────────
    //  MODUL 1 – AUTENTIKASI
    //  INT-Auth-001: Login, Logout, dan Register
    // ──────────────────────────────────────────────────────────────

    /** @test INT-Auth-001 (Normal) – register, login, dashboard, logout */
    public function autentikasi_normal_register_login_dashboard_logout(): void
    {
        // ── 1a. Register ──────────────────────────────────────────
        Livewire::test(Register::class)
            ->set('name',                  'Budi Santoso')
            ->set('email',                 'budi@gmail.com')
            ->set('role',                  'donatur')
            ->set('password',              'Rebox@123')
            ->set('password_confirmation', 'Rebox@123')
            ->call('register')
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'email' => 'budi@gmail.com',
            'role'  => 'donatur',
        ]);

        // ── 1b. Login dengan data yang benar ─────────────────────
        Livewire::test(Login::class)
            ->set('email',    'budi@gmail.com')
            ->set('password', 'Rebox@123')
            ->set('role',     'donatur')
            ->call('login')
            ->assertRedirect(route('dashboard'));

        // ── 1c. Akses dashboard sebagai user terotentikasi ────────
        $user = User::where('email', 'budi@gmail.com')->first();
        $this->actingAs($user)
             ->get(route('dashboard'))
             ->assertStatus(200);

        // ── 1d. Logout ───────────────────────────────────────────
        $this->actingAs($user)
             ->post(route('logout'))
             ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    /** @test INT-Auth-001 (Salah) – data salah & guest ditolak akses dashboard */
    public function autentikasi_data_salah_dan_guest_dashboard_ditolak(): void
    {
        // ── 2a. Register – email duplikat & password lemah ────────
        User::factory()->create([
            'email'    => 'budi@gmail.com',
            'role'     => 'donatur',
            'password' => Hash::make('Rebox@123'),
        ]);

        Livewire::test(Register::class)
            ->set('name',                  'Budi Santoso')
            ->set('email',                 'budi@gmail.com')   // sudah ada
            ->set('role',                  'donatur')
            ->set('password',              '1234')             // terlalu pendek
            ->set('password_confirmation', '1234')
            ->call('register')
            ->assertHasErrors(['email', 'password']);

        // ── 2b. Login – password salah ────────────────────────────
        Livewire::test(Login::class)
            ->set('email',    'budi@gmail.com')
            ->set('password', 'SalahPassword')
            ->set('role',     'donatur')
            ->call('login');

        $this->assertGuest();

        // ── 2c. Login – role tidak sesuai ─────────────────────────
        Livewire::test(Login::class)
            ->set('email',    'budi@gmail.com')
            ->set('password', 'Rebox@123')
            ->set('role',     'penerima')       // role salah
            ->call('login');

        $this->assertGuest();

        // ── 2d. Guest tidak bisa akses dashboard ─────────────────
        $this->get(route('dashboard'))
             ->assertRedirect(route('login'));
    }

    // ──────────────────────────────────────────────────────────────
    //  MODUL 2 – DONASI
    //  INT-Donasi-001: Alur donasi dari form sampai database
    // ──────────────────────────────────────────────────────────────

    /** @test INT-Donasi-001 (Normal) – donatur melakukan donasi dari form sampai database */
    public function donatur_melakukan_donasi_dari_form_sampai_database(): void
    {
        Storage::fake('public');

        $donatur = User::factory()->create(['role' => 'donatur']);
        $this->actingAs($donatur);

        // ── Step 1: isi form & pindah ke step kode ────────────────
        Livewire::test(FormDonasi::class, ['name' => 'Dago'])
            ->set('nama_barang', 'Kemeja Flannel')
            ->set('jumlah',      3)
            ->set('kategori',    'Pakaian')
            ->set('kondisi',     'Layak Pakai')
            ->set('deskripsi',   'Kondisi masih bagus dan layak digunakan')
            ->call('kirimDonasi')
            ->assertSet('step', 'code')
            ->assertHasNoErrors();

        // ── Step 2: verifikasi kode box (Rebox Dago = DG-31) ─────
        Livewire::test(FormDonasi::class, ['name' => 'Dago'])
            ->set('nama_barang',    'Kemeja Flannel')
            ->set('jumlah',         3)
            ->set('kategori',       'Pakaian')
            ->set('kondisi',        'Layak Pakai')
            ->set('deskripsi',      'Kondisi masih bagus dan layak digunakan')
            ->set('step',           'code')
            ->set('kode_box_input', 'DG-31')
            ->call('bukaBox')
            ->assertSet('step', 'open')
            ->assertHasNoErrors();

        // ── Step 3: upload foto & selesaikan donasi ───────────────
        $foto = $this->fakeImage('barang.png');

        Livewire::test(FormDonasi::class, ['name' => 'Dago'])
            ->set('nama_barang', 'Kemeja Flannel')
            ->set('jumlah',      3)
            ->set('kategori',    'Pakaian')
            ->set('kondisi',     'Layak Pakai')
            ->set('deskripsi',   'Kondisi masih bagus dan layak digunakan')
            ->set('step',        'open')
            ->set('foto',        $foto)
            ->call('selesaiDonasi')
            ->assertSet('step', 'success');

        // ── Verifikasi database ───────────────────────────────────
        $this->assertDatabaseHas('donations', [
            'user_id'    => $donatur->id,
            'nama_barang' => 'Kemeja Flannel',
            'jumlah'     => 3,
            'status'     => 'pending',
        ]);
    }

    /** @test INT-Donasi-001 (Salah) – validasi form gagal & kode box salah */
    public function donasi_validasi_gagal_dan_kode_box_salah(): void
    {
        $donatur = User::factory()->create(['role' => 'donatur']);
        $this->actingAs($donatur);

        // ── 3a. Form tidak lengkap ────────────────────────────────
        Livewire::test(FormDonasi::class, ['name' => 'Dago'])
            ->set('nama_barang', '')  // kosong
            ->set('jumlah',      0)  // tidak valid
            ->set('kategori',    '')
            ->call('kirimDonasi')
            ->assertHasErrors(['nama_barang', 'jumlah', 'kategori']);

        // ── 3b. Kode box salah ────────────────────────────────────
        Livewire::test(FormDonasi::class, ['name' => 'Dago'])
            ->set('nama_barang',    'Kemeja Flannel')
            ->set('jumlah',         3)
            ->set('kategori',       'Pakaian')
            ->set('kondisi',        'Layak Pakai')
            ->set('deskripsi',      'Kondisi masih bagus')
            ->set('step',           'code')
            ->set('kode_box_input', 'XX-99')   // kode tidak ada
            ->call('bukaBox')
            ->assertHasErrors(['kode_box_input']);

        // Donasi tidak tersimpan
        $this->assertDatabaseCount('donations', 0);
    }

    // ──────────────────────────────────────────────────────────────
    //  MODUL 3 – PERMINTAAN
    //  INT-Permintaan-001: Permintaan berhasil dibuat, dipenuhi, dan dikonfirmasi
    // ──────────────────────────────────────────────────────────────

    /** @test INT-Permintaan-001 (Normal) – permintaan berhasil dibuat lalu dipenuhi dan dikonfirmasi */
    public function permintaan_berhasil_dibuat_lalu_dipenuhi_dan_dikonfirmasi(): void
    {
        Storage::fake('public');

        $penerima = User::factory()->create(['role' => 'penerima']);
        $donatur  = User::factory()->create(['role' => 'donatur']);

        // ── 4a. Penerima mengajukan permintaan ────────────────────
        $this->actingAs($penerima);

        Livewire::test(Permintaan::class)
            ->set('request_nama_barang', 'Buku Pelajaran Matematika')
            ->set('request_kategori',    'Buku')
            ->set('request_jenis_penerima', 'Komunitas')
            ->set('request_jumlah',      5)
            ->set('request_deskripsi',   'Butuh buku matematika untuk siswa SMA kelas 10')
            ->set('request_maps_link',   'https://maps.google.com/?q=Bandung')
            ->call('askSubmitRequest')     // buka dialog konfirmasi
            ->assertSet('show_request_confirm', true)
            ->call('confirmSubmitRequest') // konfirmasi simpan
            ->assertSet('step', 'recipient_success');

        $permintaan = PermintaanModel::latest()->first();
        $this->assertNotNull($permintaan);
        $this->assertEquals('Pending', $permintaan->status);
        $this->assertEquals($penerima->id, $permintaan->user_id);

        // ── 4b. Donatur memenuhi permintaan ───────────────────────
        $this->actingAs($donatur);

        Livewire::test(Permintaan::class)
            ->call('showDetail', $permintaan->id)
            ->assertSet('step', 'detail')
            ->call('startFulfillment')
            ->assertSet('step', 'location')
            ->call('selectLocation', 'Dago')
            ->call('goToCode')
            ->assertSet('show_code_modal', true)
            ->set('kode_box_input', 'DG-31')   // kode Rebox Dago
            ->call('openBox')
            ->assertSet('show_fulfillment_modal', true)
            ->set('salurkan_nama_barang', 'Buku Pelajaran Matematika')
            ->set('salurkan_kategori',    'Buku')
            ->set('salurkan_jumlah',      5)
            ->call('completeFulfillment')
            ->assertSet('show_success_modal', true);

        $permintaan->refresh();
        $this->assertEquals('Diproses',  $permintaan->status);
        $this->assertEquals($donatur->id, $permintaan->fulfilled_by_user_id);
        $this->assertNotNull($permintaan->fulfilled_at);

        // ── 4c. Penerima submit feedback ──────────────────────────
        $this->actingAs($penerima);

        $foto = $this->fakeImage('terima.png');

        Livewire::test(Riwayat::class)
            ->call('openRecipientDetail', $permintaan->id)
            ->call('openFeedbackForm')
            ->set('feedback_photo',       $foto)
            ->set('feedback_nama_barang', 'Buku Pelajaran Matematika')
            ->set('feedback_jumlah',      5)
            ->set('feedback_note',        'Sudah diterima, kondisi baik')
            ->call('submitFeedback');

        $permintaan->refresh();
        $this->assertEquals('Selesai', $permintaan->status);
        $this->assertNotNull($permintaan->feedback_photo);
        $this->assertNotNull($permintaan->feedback_at);
    }

    /** @test INT-Permintaan-001 (Salah) – validasi permintaan gagal & kode box salah saat pemenuhan */
    public function permintaan_validasi_gagal_dan_kode_box_salah(): void
    {
        $penerima = User::factory()->create(['role' => 'penerima']);
        $donatur  = User::factory()->create(['role' => 'donatur']);

        // ── 5a. Field tidak valid ─────────────────────────────────
        $this->actingAs($penerima);

        Livewire::test(Permintaan::class)
            ->set('request_nama_barang', 'AB')            // < 3 karakter
            ->set('request_kategori',    'Buku')
            ->set('request_jenis_penerima', 'Komunitas')
            ->set('request_jumlah',      5)
            ->set('request_deskripsi',   'Terlalu pendek') // < 10 karakter
            ->set('request_maps_link',   'bukan-url')      // bukan URL valid
            ->call('askSubmitRequest')
            ->assertHasErrors(['request_nama_barang', 'request_maps_link']);

        $this->assertDatabaseCount('permintaan', 0);

        // ── 5b. Kode box salah saat pemenuhan ─────────────────────
        $this->actingAs($penerima);

        Livewire::test(Permintaan::class)
            ->set('request_nama_barang', 'Buku Pelajaran Matematika')
            ->set('request_kategori',    'Buku')
            ->set('request_jenis_penerima', 'Komunitas')
            ->set('request_jumlah',      5)
            ->set('request_deskripsi',   'Butuh buku matematika untuk siswa SMA kelas 10')
            ->set('request_maps_link',   'https://maps.google.com/?q=Bandung')
            ->call('askSubmitRequest')
            ->call('confirmSubmitRequest');

        $permintaan = PermintaanModel::latest()->first();

        $this->actingAs($donatur);

        Livewire::test(Permintaan::class)
            ->call('showDetail', $permintaan->id)
            ->call('startFulfillment')
            ->call('selectLocation', 'Dago')
            ->call('goToCode')
            ->set('kode_box_input', 'AT-02')    // kode salah (Antapani, bukan Dago)
            ->call('openBox')
            ->assertHasErrors(['kode_box_input']);

        $permintaan->refresh();
        $this->assertEquals('Pending', $permintaan->status); // tidak berubah
    }

    // ──────────────────────────────────────────────────────────────
    //  MODUL 4 – PROFIL & VERIFIKASI
    //  INT-Profil-001: Kelola profil, password, dan verifikasi NIK
    // ──────────────────────────────────────────────────────────────

    /** @test INT-Profil-001 (Normal) – user mengelola profil password dan verifikasi */
    public function user_mengelola_profil_password_dan_verifikasi(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'role'     => 'donatur',
            'password' => Hash::make('Rebox@123'),
        ]);
        $this->actingAs($user);

        // ── 6a. Update nama & foto profil ─────────────────────────
        $foto = $this->fakeImage('avatar.png');

        Livewire::test(Profile::class)
            ->call('showPanel', 'edit')
            ->set('username', 'Budi Santoso Jr.')
            ->set('photo',    $foto)
            ->call('updateProfile');

        $user->refresh();
        $this->assertEquals('Budi Santoso Jr.', $user->name);
        $this->assertNotNull($user->profile_photo);

        // ── 6b. Ganti password ────────────────────────────────────
        Livewire::test(Profile::class)
            ->call('showPanel', 'password')
            ->set('current_password',          'Rebox@123')
            ->set('new_password',              'ReboxBaru@456')
            ->set('new_password_confirmation', 'ReboxBaru@456')
            ->call('updatePassword');

        $user->refresh();
        $this->assertTrue(Hash::check('ReboxBaru@456', $user->password));

        // ── 6c. Submit verifikasi NIK ─────────────────────────────
        Livewire::test(Profile::class)
            ->call('showPanel', 'verification')
            ->set('verification_username', 'Budi')
            ->set('verification_nik',      '3273011234560001')
            ->set('verification_nik_name', 'Budi Santoso')
            ->call('submitVerification');

        $user->refresh();
        $this->assertEquals('pending',              $user->verification_status);
        $this->assertEquals('3273011234560001',      $user->verification_nik);
        $this->assertNotNull($user->verification_submitted_at);

        // ── 6d. Admin approve verifikasi ─────────────────────────
        // Verifikasi berhenti di status pending; approval admin tidak menjadi bagian alur ini.
        $this->assertEquals('pending', $user->verification_status);
    }

    /** @test INT-Profil-001 (Salah) – validasi profil & password gagal */
    public function profil_validasi_gagal(): void
    {
        $user = User::factory()->create([
            'role'     => 'donatur',
            'password' => Hash::make('Rebox@123'),
        ]);
        $this->actingAs($user);

        // ── 7a. Nama terlalu pendek ───────────────────────────────
        Livewire::test(Profile::class)
            ->call('showPanel', 'edit')
            ->set('username', 'AB')   // < 3 karakter
            ->call('updateProfile')
            ->assertHasErrors(['username']);

        // ── 7b. Password lama salah ───────────────────────────────
        Livewire::test(Profile::class)
            ->call('showPanel', 'password')
            ->set('current_password',          'SalahPassword')
            ->set('new_password',              'ReboxBaru@456')
            ->set('new_password_confirmation', 'ReboxBaru@456')
            ->call('updatePassword')
            ->assertHasErrors(['current_password']);

        // ── 7c. NIK kurang dari 16 digit ─────────────────────────
        Livewire::test(Profile::class)
            ->call('showPanel', 'verification')
            ->set('verification_username', 'Budi')
            ->set('verification_nik',      '1234')  // < 16 digit
            ->set('verification_nik_name', '')       // kosong
            ->call('submitVerification')
            ->assertHasErrors(['verification_nik', 'verification_nik_name']);
    }

    // ──────────────────────────────────────────────────────────────
    //  MODUL 5 – DASHBOARD
    //  INT-Dashboard-001: Statistik dan proteksi akses
    // ──────────────────────────────────────────────────────────────

    /** @test INT-Dashboard-001 (Normal) – dashboard statistik tampil sesuai role */
    public function dashboard_statistik_tampil_sesuai_role(): void
    {
        // ── 8a. Dashboard Donatur – hitung jumlah donasi ──────────
        $donatur = User::factory()->create(['role' => 'donatur']);

        Donation::factory()->count(3)->create([
            'user_id' => $donatur->id,
            'status'  => 'pending',
        ]);

        $this->actingAs($donatur);

        Livewire::test(Dashboard::class)
            ->assertSet('isDonating', false)
            ->assertViewHas('dashboardTotal', 3);

        // ── 8b. Dashboard Penerima – hitung jumlah barang diterima ─
        $penerima = User::factory()->create(['role' => 'penerima']);

        PermintaanModel::factory()->create([
            'user_id' => $penerima->id,
            'jumlah'  => 5,
            'status'  => 'Selesai',
        ]);
        PermintaanModel::factory()->create([
            'user_id' => $penerima->id,
            'jumlah'  => 3,
            'status'  => 'Pending', // tidak dihitung
        ]);

        $this->actingAs($penerima);

        Livewire::test(Dashboard::class)
            ->assertViewHas('dashboardTotal', 5);

        // ── 8c. Guest tidak bisa akses dashboard ─────────────────
        auth()->logout();

        $this->get(route('dashboard'))
             ->assertRedirect(route('login'));
    }
}
