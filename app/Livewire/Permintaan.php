<?php

namespace App\Livewire;

<<<<<<< HEAD
use Livewire\Component;
use App\Models\PermintaanModel;
use Illuminate\Support\Facades\Auth;

class Permintaan extends Component
{
    // Properti untuk menampung input form
    public $nama_barang;
    public $kategori;
    public $jumlah;
    public $deskripsi;
    public $urgensi = 'Normal'; 
    public $lokasi_hub;
    
    // Properti untuk fitur search lokasi
    public $search = ''; // Search untuk filter card (jika digunakan)
    public $search_lokasi = ''; // Search untuk fitur autocomplete kecamatan

    /**
     * mount() dijalankan pertama kali saat komponen diakses.
     * Proteksi internal agar hanya role 'penerima' yang bisa buka form ini.
     */
    public function mount()
    {
        // Pastikan user login dan memiliki role penerima
        if (Auth::check() && Auth::user()->role !== 'penerima') {
            // Jika donatur mencoba akses, lempar balik ke dashboard
            return redirect()->to('/dashboard');
        }
    }

    /**
     * Fungsi untuk memilih lokasi dari card di view.
     */
    public function setLokasi($namaLokasi)
    {
        $this->lokasi_hub = $namaLokasi;
        // Opsional: isi search_lokasi agar input text sinkron dengan pilihan card
        $this->search_lokasi = $namaLokasi;
    }

    /**
     * Fungsi baru untuk memilih lokasi dari hasil pencarian autocomplete.
     */
    public function selectLokasi($nama)
    {
        $this->lokasi_hub = $nama;
        $this->search_lokasi = $nama;
    }

    /**
     * Proses pengiriman form permintaan barang.
     */
    public function submit()
    {
        // 1. Validasi Input
        $this->validate([
            'nama_barang' => 'required|min:3',
            'kategori'    => 'required',
            'jumlah'      => 'required|numeric|min:1',
            'deskripsi'   => 'required',
            'lokasi_hub'  => 'required',
        ], [
            'lokasi_hub.required' => 'Silakan pilih lokasi drop-off terlebih dahulu.',
        ]);

        // 2. Simpan ke Database
        PermintaanModel::create([
            'nama_barang' => $this->nama_barang,
            'kategori'    => $this->kategori,
            'jumlah'      => $this->jumlah,
            'deskripsi'   => $this->deskripsi,
            'urgensi'     => $this->urgensi,
            'lokasi_hub'  => $this->lokasi_hub,
            // Menyimpan ID pengguna yang membuat permintaan
            'user_id'     => Auth::id(), 
            'status'      => 'Pending', // Status awal saat permintaan dibuat
        ]);

        // 3. Beri notifikasi ke session
        session()->flash('message', 'Permintaan barang berhasil dikirim! Tim ReBox akan segera meninjau kebutuhan Anda.');

        // 4. Redirect ke halaman riwayat pribadi penerima
        return $this->redirect(route('riwayat'), navigate: true);
=======
use App\Models\Donation;
use App\Models\PermintaanModel;
use App\Support\ReboxLocations;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Permintaan extends Component
{
    public string $step = 'list';
    public string $search = '';
    public string $location_search = '';
    public string $category_filter = 'Semua';
    public string $kode_box_input = '';
    public int $request_page = 1;
    public int $request_per_page = 3;
    public bool $show_code_modal = false;
    public bool $show_fulfillment_modal = false;
    public bool $show_success_modal = false;
    public ?int $selectedRequestId = null;

    public array $selectedRequest = [];
    public array $selectedLocation = [];

    public string $salurkan_nama_barang = '';
    public string $salurkan_kategori = '';
    public int|string $salurkan_jumlah = '';

    public string $request_nama_barang = '';
    public string $request_kategori = '';
    public int|string $request_jumlah = '';
    public string $request_deskripsi = '';
    public string $request_maps_link = '';
    public bool $show_request_confirm = false;
    public array $submittedRequest = [];

    public function mount(): void
    {
        $this->selectedLocation = $this->locations()[0];

        if (Auth::user()?->role === 'penerima') {
            $this->step = 'recipient_form';
        }
    }

    public function setCategory(string $category): void
    {
        $this->category_filter = $category;
        $this->request_page = 1;
    }

    public function updatedSearch(): void
    {
        $this->request_page = 1;
    }

    public function setRequestPage(int $page): void
    {
        $lastPage = max(1, (int) ceil(count($this->filteredRequests()) / $this->request_per_page));

        $this->request_page = min(max(1, $page), $lastPage);
    }

    public function previousRequestPage(): void
    {
        $this->setRequestPage($this->request_page - 1);
    }

    public function nextRequestPage(): void
    {
        $this->setRequestPage($this->request_page + 1);
    }

    public function showDetail(int $id): void
    {
        $request = collect($this->requests())->firstWhere('id', $id);

        if (! $request) {
            return;
        }

        $this->selectedRequestId = $id;
        $this->selectedRequest = $request;
        $this->show_code_modal = false;
        $this->show_fulfillment_modal = false;
        $this->show_success_modal = false;
        $this->step = 'detail';
    }

    public function startFulfillment(): void
    {
        if (! $this->selectedRequest) {
            $this->step = 'list';
            return;
        }

        $this->step = 'location';
    }

    public function selectLocation(string $name): void
    {
        $location = collect($this->locations())->firstWhere('name', $name);

        if (! $location) {
            return;
        }

        $this->selectedLocation = $location;
        $this->kode_box_input = '';
    }

    public function goToCode(): void
    {
        if (! $this->selectedLocation || ! $this->selectedRequest) {
            return;
        }

        $this->kode_box_input = '';
        $this->resetErrorBag('kode_box_input');
        $this->show_fulfillment_modal = false;
        $this->show_success_modal = false;
        $this->show_code_modal = true;
    }

    public function closeCodeModal(): void
    {
        $this->show_code_modal = false;
        $this->kode_box_input = '';
        $this->resetErrorBag('kode_box_input');
    }

    public function closeFulfillmentModal(): void
    {
        $this->show_fulfillment_modal = false;
    }

    public function closeSuccessModal(): void
    {
        $this->show_success_modal = false;
    }

    public function openBox(): void
    {
        $this->validate([
            'kode_box_input' => ['required', 'string'],
        ], [
            'kode_box_input.required' => 'Kode box wajib diisi.',
        ]);

        $scannedCode = ReboxLocations::extractCode($this->kode_box_input);

        if ($scannedCode !== $this->selectedLocation['code']) {
            $this->addError('kode_box_input', 'Kode box tidak sesuai dengan lokasi Rebox yang dipilih.');
            return;
        }

        $this->kode_box_input = $scannedCode;
        $this->salurkan_nama_barang = $this->selectedRequest['nama_barang'] ?? '';
        $this->salurkan_kategori = $this->selectedRequest['kategori_barang'] ?? '';
        $this->salurkan_jumlah = $this->selectedRequest['jumlah'] ?? '';
        $this->show_code_modal = false;
        $this->show_fulfillment_modal = true;
        $this->step = 'detail';
    }

    public function completeFulfillment(): void
    {
        $this->validate([
            'salurkan_nama_barang' => ['required', 'string', 'min:3', 'max:100'],
            'salurkan_kategori' => ['required', 'string'],
            'salurkan_jumlah' => ['required', 'integer', 'min:1', 'max:1000'],
        ], [
            'salurkan_nama_barang.required' => 'Nama barang wajib diisi.',
            'salurkan_kategori.required' => 'Kategori barang wajib diisi.',
            'salurkan_jumlah.required' => 'Jumlah barang wajib diisi.',
            'salurkan_jumlah.integer' => 'Jumlah barang harus berupa angka.',
        ]);

        if (! empty($this->selectedRequest['id'])) {
            $request = PermintaanModel::find($this->selectedRequest['id']);

            if ($request) {
                $request->update([
                    'status' => 'Diproses',
                    'fulfilled_by_user_id' => Auth::id(),
                    'fulfilled_at' => now(),
                ]);
            }
        }

        $this->show_fulfillment_modal = false;
        $this->show_success_modal = true;
        $this->step = 'detail';
    }

    public function backToList(): void
    {
        $this->reset(['selectedRequestId', 'selectedRequest', 'kode_box_input']);
        $this->show_code_modal = false;
        $this->show_fulfillment_modal = false;
        $this->show_success_modal = false;
        $this->step = 'list';
    }

    public function askSubmitRequest(): void
    {
        $this->validateRecipientRequest();
        $this->show_request_confirm = true;
    }

    public function cancelSubmitRequest(): void
    {
        $this->show_request_confirm = false;
    }

    public function confirmSubmitRequest(): void
    {
        $this->validateRecipientRequest();

        $request = PermintaanModel::create([
            'user_id' => Auth::id(),
            'nama_barang' => $this->request_nama_barang,
            'kategori' => $this->request_kategori,
            'jumlah' => (int) $this->request_jumlah,
            'deskripsi' => $this->request_deskripsi,
            'urgensi' => 'Normal',
            'lokasi_hub' => Auth::user()?->name ?? 'Penerima Rebox',
            'google_maps_link' => $this->request_maps_link,
            'status' => 'Pending',
        ]);

        $this->submittedRequest = [
            'id' => $request->id,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'maps_url' => $request->google_maps_link,
            'status' => $request->status,
        ];

        $this->reset(['request_nama_barang', 'request_kategori', 'request_jumlah', 'request_deskripsi', 'request_maps_link', 'show_request_confirm']);
        $this->step = 'recipient_success';
    }

    public function createAnotherRequest(): void
    {
        $this->submittedRequest = [];
        $this->show_request_confirm = false;
        $this->step = 'recipient_form';
    }

    private function validateRecipientRequest(): void
    {
        $this->validate([
            'request_nama_barang' => ['required', 'string', 'min:3', 'max:100'],
            'request_kategori' => ['required', 'string', 'in:Pakaian,Buku,Elektronik,Lainnya'],
            'request_jumlah' => ['required', 'integer', 'min:1', 'max:1000'],
            'request_deskripsi' => ['required', 'string', 'min:10', 'max:700'],
            'request_maps_link' => ['required', 'url', 'max:700'],
        ], [
            'request_nama_barang.required' => 'Nama barang wajib diisi.',
            'request_nama_barang.min' => 'Nama barang minimal 3 karakter.',
            'request_kategori.required' => 'Kategori wajib dipilih.',
            'request_jumlah.required' => 'Jumlah kebutuhan wajib diisi.',
            'request_jumlah.integer' => 'Jumlah kebutuhan harus berupa angka.',
            'request_jumlah.max' => 'Jumlah kebutuhan maksimal 1000.',
            'request_deskripsi.required' => 'Deskripsi kebutuhan wajib diisi.',
            'request_deskripsi.min' => 'Deskripsi minimal 10 karakter.',
            'request_maps_link.required' => 'Link Google Maps wajib diisi.',
            'request_maps_link.url' => 'Link Google Maps harus berupa URL yang valid.',
        ]);
    }

    public function backToDetail(): void
    {
        $this->show_code_modal = false;
        $this->show_fulfillment_modal = false;
        $this->show_success_modal = false;
        $this->step = 'detail';
    }

    public function backToLocation(): void
    {
        $this->show_code_modal = false;
        $this->show_fulfillment_modal = false;
        $this->show_success_modal = false;
        $this->step = 'location';
    }

    public function filteredRequests(): array
    {
        $query = strtolower(trim($this->search));

        return collect($this->requests())
            ->filter(fn ($item) => $this->category_filter === 'Semua' || $item['jenis_penerima'] === $this->category_filter)
            ->filter(function ($item) use ($query) {
                if ($query === '') {
                    return true;
                }

                return str_contains(strtolower($item['penerima']), $query)
                    || str_contains(strtolower($item['nama_barang']), $query)
                    || str_contains(strtolower($item['lokasi']), $query);
            })
            ->values()
            ->all();
    }

    public function filteredLocations(): array
    {
        $query = strtolower(trim($this->location_search));

        if ($query === '') {
            return $this->locations();
        }

        return collect($this->locations())
            ->filter(fn ($location) => str_contains(strtolower($location['title']), $query)
                || str_contains(strtolower($location['area']), $query)
                || str_contains(strtolower($location['name']), $query))
            ->values()
            ->all();
    }

    public function inventory(): array
    {
        $donations = Donation::where('rebox_id', $this->selectedLocation['id'] ?? 1)
            ->latest()
            ->take(8)
            ->get()
            ->map(fn ($donation) => [
                'nama_barang' => $donation->nama_barang,
                'kategori' => $donation->kategori,
                'jumlah' => $donation->jumlah,
            ])
            ->all();

        if ($donations) {
            return $donations;
        }

        return [];
    }

    public function mapsUrl(): string
    {
        if (! empty($this->selectedRequest['maps_url'])) {
            return $this->selectedRequest['maps_url'];
        }

        $address = $this->selectedRequest['lokasi'] ?? 'Bandung';

        return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
    }

    private function requests(): array
    {
        return PermintaanModel::with('user')
            ->whereIn('status', ['Pending', 'pending'])
            ->latest()
            ->take(8)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'nama_barang' => $item->nama_barang,
                'kategori_barang' => $item->kategori,
                'jumlah' => $item->jumlah,
                'deskripsi' => $item->deskripsi,
                'penerima' => $item->user?->name ?? 'Penerima Rebox',
                'penerima_photo' => $item->user?->profile_photo ? asset('storage/' . $item->user->profile_photo) : null,
                'jenis_penerima' => 'Komunitas',
                'lokasi' => $item->lokasi_hub ?: 'Bandung',
                'maps_url' => $item->google_maps_link ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode($item->lokasi_hub ?: 'Bandung'),
                'status' => 'Butuh bantuan',
                'date_label' => $item->created_at?->diffForHumans() ?? 'Baru saja',
            ])
            ->all();
    }

    public function locations(): array
    {
        return ReboxLocations::all();
>>>>>>> zunadeafiturv1
    }

    public function render()
    {
<<<<<<< HEAD
        // Daftar kecamatan berdasarkan input Anda
        $daftar_kecamatan = [
            // Kota Bandung
            'Andir', 'Antapani', 'Arcamanik', 'Astana Anyar', 'Babakan Ciparay', 'Bandung Kidul', 
            'Bandung Kulon', 'Bandung Wetan', 'Batununggal', 'Bojongloa Kaler', 'Bojongloa Kidul', 
            'Buahbatu', 'Cibeunying Kaler', 'Cibeunying Kidul', 'Cicadas', 'Cicendo', 'Cidadap', 
            'Cinambo', 'Coblong', 'Gedebage', 'Kiaracondong', 'Lengkong', 'Mandalajati', 
            'Panyileukan', 'Rancasari', 'Regol', 'Sukajadi', 'Sukasari', 'Sumur Bandung', 'Ujungberung',
            // Kabupaten Bandung
            'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang', 'Cicalengka', 'Cikancung', 
            'Cilengkrang', 'Cileunyi', 'Ciparay', 'Ciwidey', 'Dayeuhkolot', 'Ibun', 'Katapang', 
            'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih', 'Margahayu', 'Nagreg', 'Pacet', 
            'Pameungpeuk', 'Paseh', 'Pasirjambu', 'Rancaekek', 'Rancabali', 'Solokanjeruk', 'Soreang', 
            'Cimenyan', 'Cimaung', 'Pangalengan',
            // Kabupaten Bandung Barat
            'Batujajar', 'Cihampelas', 'Cililin', 'Cipatat', 'Cipeundeuy', 'Cipongkor', 'Cisarua', 
            'Gununghalu', 'Lembang', 'Ngamprah', 'Padalarang', 'Parongpong', 'Rongga', 'Saguling', 'Sindangkerta'
        ];

        $results = [];

        // Logika pencarian: tampilkan hasil jika user mengetik minimal 2 karakter
        if (strlen($this->search_lokasi) >= 2) {
            $results = array_filter($daftar_kecamatan, function($kecamatan) {
                return str_contains(strtolower($kecamatan), strtolower($this->search_lokasi));
            });
            
            // Batasi hasil agar tidak terlalu panjang di dropdown
            $results = array_slice($results, 0, 8);
        }

        return view('livewire.permintaan', [
            'results' => $results
        ])->layout('components.layouts.app'); 
    }
}
=======
        $filteredRequests = $this->filteredRequests();
        $totalRequests = count($filteredRequests);
        $requestPageCount = max(1, (int) ceil($totalRequests / $this->request_per_page));
        $this->request_page = min($this->request_page, $requestPageCount);

        return view('livewire.permintaan', [
            'requests' => array_slice($filteredRequests, ($this->request_page - 1) * $this->request_per_page, $this->request_per_page),
            'totalRequests' => $totalRequests,
            'requestPageCount' => $requestPageCount,
            'locations' => $this->filteredLocations(),
            'inventoryItems' => $this->inventory(),
            'mapsUrl' => $this->mapsUrl(),
        ]);
    }
}
>>>>>>> zunadeafiturv1
