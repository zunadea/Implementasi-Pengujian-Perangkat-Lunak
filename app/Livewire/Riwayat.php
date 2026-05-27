<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Donation;
use App\Models\PermintaanModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Riwayat extends Component
{
    use WithFileUploads;

    public string $tab = 'salurkan';
    public int $donorHistoryPage = 1;
    public int $donorHistoryPerPage = 3;
    public string $donorTimeFilter = 'all';
    public string $recipientStatusFilter = 'Semua';
    public ?int $selectedRecipientRequestId = null;
    public array $selectedRecipientRequest = [];
    public bool $showRecipientDetail = false;
    public ?int $selectedDonorRequestId = null;
    public array $selectedDonorRequest = [];
    public bool $showDonorDetail = false;
    public bool $showFeedbackForm = false;
    public $feedback_photo;
    public string $feedback_nama_barang = '';
    public int|string $feedback_jumlah = '';
    public string $feedback_note = '';

    public function setTab(string $tab): void
    {
        $this->tab = in_array($tab, ['salurkan', 'rebox'], true) ? $tab : 'salurkan';
        $this->donorHistoryPage = 1;
        $this->closeDonorDetail();
    }

    public function setDonorHistoryPage(int $page): void
    {
        $histories = $this->filteredDonorHistories($this->tab === 'salurkan' ? $this->salurkanHistory() : $this->reboxHistory());
        $lastPage = max(1, (int) ceil(count($histories) / $this->donorHistoryPerPage));

        $this->donorHistoryPage = min(max(1, $page), $lastPage);
    }

    public function setDonorTimeFilter(string $filter): void
    {
        $allowed = ['all', 'latest', 'oldest', '30days', '7days'];
        $this->donorTimeFilter = in_array($filter, $allowed, true) ? $filter : 'all';
        $this->donorHistoryPage = 1;
    }

    public function previousDonorHistoryPage(): void
    {
        $this->setDonorHistoryPage($this->donorHistoryPage - 1);
    }

    public function nextDonorHistoryPage(): void
    {
        $this->setDonorHistoryPage($this->donorHistoryPage + 1);
    }

    public function setRecipientStatusFilter(string $status): void
    {
        $allowed = ['Semua', 'Menunggu', 'Diproses', 'Disetujui', 'Ditolak'];
        $this->recipientStatusFilter = in_array($status, $allowed, true) ? $status : 'Semua';
    }

    public function openRecipientDetail(int $id): void
    {
        $request = PermintaanModel::with(['fulfilledBy', 'user'])
            ->where('user_id', Auth::id())
            ->find($id);

        if (! $request) {
            return;
        }

        $this->selectedRecipientRequestId = $id;
        $this->selectedRecipientRequest = $this->formatRecipientRequest($request);
        $this->showRecipientDetail = true;
        $this->showFeedbackForm = false;
    }

    public function closeRecipientDetail(): void
    {
        $this->showRecipientDetail = false;
        $this->showFeedbackForm = false;
        $this->resetFeedbackForm();
    }

    public function openDonorSalurkanDetail(int $id): void
    {
        $request = PermintaanModel::with(['fulfilledBy', 'user'])
            ->where('fulfilled_by_user_id', Auth::id())
            ->find($id);

        if (! $request) {
            return;
        }

        $this->selectedDonorRequestId = $id;
        $this->selectedDonorRequest = $this->formatDonorSalurkanRequest($request);
        $this->showDonorDetail = true;
    }

    public function closeDonorDetail(): void
    {
        $this->showDonorDetail = false;
        $this->selectedDonorRequestId = null;
        $this->selectedDonorRequest = [];
    }

    public function openFeedbackForm(): void
    {
        if (! $this->selectedRecipientRequestId) {
            return;
        }

        $request = PermintaanModel::where('user_id', Auth::id())->find($this->selectedRecipientRequestId);

        if (! $request || $this->recipientStatus($request->status ?? 'Pending') !== 'Diproses') {
            return;
        }

        $this->feedback_nama_barang = $request->nama_barang;
        $this->feedback_jumlah = $request->jumlah;
        $this->feedback_note = '';
        $this->feedback_photo = null;
        $this->showFeedbackForm = true;
    }

    public function submitFeedback(): void
    {
        if (! $this->selectedRecipientRequestId) {
            return;
        }

        $this->validate([
            'feedback_photo' => ['required', 'image', 'max:5120'],
            'feedback_nama_barang' => ['required', 'string', 'min:3', 'max:100'],
            'feedback_jumlah' => ['required', 'integer', 'min:1', 'max:1000'],
            'feedback_note' => ['nullable', 'string', 'max:500'],
        ], [
            'feedback_photo.required' => 'Foto barang diterima wajib diunggah.',
            'feedback_photo.image' => 'File feedback harus berupa gambar.',
            'feedback_nama_barang.required' => 'Nama barang wajib diisi.',
            'feedback_jumlah.required' => 'Jumlah barang wajib diisi.',
            'feedback_jumlah.integer' => 'Jumlah barang harus berupa angka.',
        ]);

        $request = PermintaanModel::where('user_id', Auth::id())->find($this->selectedRecipientRequestId);

        if (! $request) {
            return;
        }

        $path = $this->feedback_photo->store('feedback-permintaan', 'public');

        $request->update([
            'status' => 'Selesai',
            'feedback_photo' => $path,
            'feedback_nama_barang' => $this->feedback_nama_barang,
            'feedback_jumlah' => (int) $this->feedback_jumlah,
            'feedback_note' => $this->feedback_note,
            'feedback_at' => now(),
        ]);

        $request->refresh()->load(['fulfilledBy', 'user']);
        $this->selectedRecipientRequest = $this->formatRecipientRequest($request);
        $this->showFeedbackForm = false;
        $this->resetFeedbackForm();
    }

    private function resetFeedbackForm(): void
    {
        $this->reset(['feedback_photo', 'feedback_nama_barang', 'feedback_jumlah', 'feedback_note']);
        $this->resetValidation(['feedback_photo', 'feedback_nama_barang', 'feedback_jumlah', 'feedback_note']);
    }

    private function recipientStatus(string $status): string
    {
        $normalized = strtolower(trim($status));

        return match ($normalized) {
            'pending', 'menunggu' => 'Menunggu',
            'proses', 'diproses', 'processing' => 'Diproses',
            'approved', 'setuju', 'disetujui', 'selesai' => 'Disetujui',
            'rejected', 'tolak', 'ditolak' => 'Ditolak',
            default => ucfirst($status ?: 'Menunggu'),
        };
    }

    private function hasRecipientFeedback(PermintaanModel $request): bool
    {
        return filled($request->feedback_at)
            && filled($request->feedback_photo)
            && Storage::disk('public')->exists($request->feedback_photo);
    }

    private function recipientCategoryIcon(string $category): array
    {
        $normalized = strtolower(trim($category));

        if (str_contains($normalized, 'pakaian')) {
            return ['key' => 'pakaian', 'icon' => 'fas fa-shirt'];
        }

        if (str_contains($normalized, 'buku')) {
            return ['key' => 'buku', 'icon' => 'fas fa-book-open'];
        }

        if (str_contains($normalized, 'elektronik')) {
            return ['key' => 'elektronik', 'icon' => 'fas fa-tv'];
        }

        return ['key' => 'lainnya', 'icon' => 'fas fa-box-open'];
    }

    private function reboxNames(): array
    {
        return [
            1 => 'Rebox Dago',
            2 => 'Rebox Lembang',
            3 => 'Rebox Braga',
            4 => 'Rebox Cihampelas',
            5 => 'Rebox Gedebage',
            6 => 'Rebox Cibaduyut',
            7 => 'Rebox Ciwidey',
            8 => 'Rebox Pangalengan',
            9 => 'Rebox Bojongsoang',
            10 => 'Rebox Setiabudi',
            11 => 'Rebox Pasteur',
            12 => 'Rebox Antapani',
            13 => 'Rebox Arcamanik',
            14 => 'Rebox Ujungberung',
            15 => 'Rebox Soreang',
            16 => 'Rebox Padalarang',
            17 => 'Rebox Cimahi',
            18 => 'Rebox Jatinangor',
            19 => 'Rebox Dayeuhkolot',
            20 => 'Rebox Cileunyi',
        ];
    }

    private function reboxHistory()
    {
        $reboxNames = $this->reboxNames();

        return Donation::where('user_id', Auth::id())
            ->latest()
            ->get()
            ->map(function ($donation) use ($reboxNames) {
                $dateTime = $this->formatIndonesiaDateTime($donation->created_at);

                return [
                    'donatur' => Auth::user()?->name ?? 'Donatur Rebox',
                    'role' => Auth::user()?->role ?? 'Donatur',
                    'date' => $dateTime['date'],
                    'time' => $dateTime['time'],
                    'timestamp' => $dateTime['timestamp'],
                    'nama_barang' => $donation->nama_barang,
                    'lokasi_box' => $reboxNames[$donation->rebox_id] ?? 'Rebox Dago',
                    'jumlah' => $donation->jumlah . ' Pcs',
                    'image' => $donation->foto && Storage::disk('public')->exists($donation->foto)
                        ? asset('storage/' . $donation->foto)
                        : asset('images/GambarcardRebox1.png'),
                ];
            })
            ->values()
            ->all();
    }

    private function salurkanHistory(): array
    {
        return PermintaanModel::with('user')
            ->where('fulfilled_by_user_id', Auth::id())
            ->latest('fulfilled_at')
            ->get()
            ->map(function ($request) {
                $isComplete = $this->hasRecipientFeedback($request);
                $status = $isComplete ? 'Selesai' : 'Proses';
                $dateTime = $this->formatIndonesiaDateTime($request->fulfilled_at ?? $request->updated_at ?? $request->created_at);

                return [
                    'id' => $request->id,
                    'donatur' => Auth::user()?->name ?? 'Donatur Rebox',
                    'role' => 'Donatur',
                    'date' => $dateTime['date'],
                    'time' => $dateTime['time'],
                    'timestamp' => $dateTime['timestamp'],
                    'nama_barang' => $request->nama_barang,
                    'tujuan' => $request->user?->name ?? 'Penerima Rebox',
                    'maps_url' => $request->google_maps_link ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode($request->lokasi_hub ?: ($request->user?->name ?? 'Penerima Rebox') . ' Bandung'),
                    'jumlah' => $request->jumlah . ' Pcs',
                    'kategori' => $request->kategori,
                    'status' => $status,
                    'feedback_at' => $request->feedback_at ? \Carbon\Carbon::parse($request->feedback_at)->translatedFormat('d M Y, H:i') : null,
                    'feedback_photo_url' => $isComplete ? asset('storage/' . $request->feedback_photo) : null,
                    'feedback_note' => $request->feedback_note,
                    'image' => asset('images/GambarcardRebox2.png'),
                ];
            })
            ->values()
            ->all();
    }

    private function formatDonorSalurkanRequest(PermintaanModel $request): array
    {
        $isComplete = $this->hasRecipientFeedback($request);
        $fulfilledAt = $this->formatIndonesiaDateTime($request->fulfilled_at ?? $request->updated_at ?? $request->created_at);
        $mapsUrl = $request->google_maps_link ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode($request->lokasi_hub ?: ($request->user?->name ?? 'Penerima Rebox') . ' Bandung');

        return [
            'id' => $request->id,
            'code' => '#REQ-' . now()->format('Y') . '-' . str_pad((string) $request->id, 5, '0', STR_PAD_LEFT),
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah . ' Pcs',
            'deskripsi' => $request->deskripsi ?: 'Tidak ada deskripsi tambahan.',
            'penerima' => $request->user?->name ?? 'Penerima Rebox',
            'penerima_email' => $request->user?->email ?? '-',
            'lokasi_hub' => $request->lokasi_hub ?: 'Lokasi penerima belum diisi.',
            'maps_url' => $mapsUrl,
            'status' => $isComplete ? 'Selesai' : 'Proses',
            'status_note' => $isComplete
                ? 'Penerima sudah mengisi feedback dan mengunggah bukti barang diterima.'
                : 'Menunggu penerima mengisi feedback dan bukti barang diterima.',
            'fulfilled_at' => $fulfilledAt['date'] . ', ' . $fulfilledAt['time'],
            'feedback_at' => $request->feedback_at ? \Carbon\Carbon::parse($request->feedback_at)->translatedFormat('d M Y, H:i') : null,
            'feedback_photo_url' => $isComplete ? asset('storage/' . $request->feedback_photo) : null,
            'feedback_nama_barang' => $request->feedback_nama_barang,
            'feedback_jumlah' => $request->feedback_jumlah ? $request->feedback_jumlah . ' Pcs' : null,
            'feedback_note' => $request->feedback_note,
        ];
    }

    private function indonesiaTimezone(): string
    {
        $timezone = Auth::user()?->timezone ?? config('app.timezone', 'Asia/Jakarta');

        return in_array($timezone, ['Asia/Jakarta', 'Asia/Makassar', 'Asia/Jayapura'], true)
            ? $timezone
            : 'Asia/Jakarta';
    }

    private function timezoneSuffix(string $timezone): string
    {
        return match ($timezone) {
            'Asia/Makassar' => 'WITA',
            'Asia/Jayapura' => 'WIT',
            default => 'WIB',
        };
    }

    private function formatIndonesiaDateTime($value): array
    {
        $timezone = $this->indonesiaTimezone();
        $date = $value
            ? \Carbon\Carbon::parse($value)->timezone($timezone)
            : now($timezone);

        return [
            'date' => $date->translatedFormat('d M Y'),
            'time' => $date->format('H:i') . ' ' . $this->timezoneSuffix($timezone),
            'timestamp' => $date->timestamp,
        ];
    }

    private function filteredDonorHistories(array $histories): array
    {
        $items = collect($histories);

        if ($this->donorTimeFilter === '7days') {
            $threshold = now($this->indonesiaTimezone())->subDays(7)->timestamp;
            $items = $items->filter(fn ($history) => ($history['timestamp'] ?? 0) >= $threshold);
        }

        if ($this->donorTimeFilter === '30days') {
            $threshold = now($this->indonesiaTimezone())->subDays(30)->timestamp;
            $items = $items->filter(fn ($history) => ($history['timestamp'] ?? 0) >= $threshold);
        }

        $items = $this->donorTimeFilter === 'oldest'
            ? $items->sortBy('timestamp')
            : $items->sortByDesc('timestamp');

        return $items->values()->all();
    }

    private function donorTimeFilterLabel(): string
    {
        return match ($this->donorTimeFilter) {
            'latest' => 'Terbaru',
            'oldest' => 'Terlama',
            '30days' => '30 Hari',
            '7days' => '7 Hari',
            default => 'Semua Waktu',
        };
    }

    private function recipientRequestHistory(): array
    {
        $requests = PermintaanModel::with('fulfilledBy')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        if ($this->recipientStatusFilter !== 'Semua') {
            $requests = $requests->filter(fn ($request) => $this->recipientStatus($request->status ?? 'Pending') === $this->recipientStatusFilter);
        }

        return $requests
            ->values()
            ->map(fn ($request) => $this->formatRecipientRequest($request))
            ->all();
    }

    private function formatRecipientRequest(PermintaanModel $request): array
    {
        $status = $this->recipientStatus($request->status ?? 'Pending');
        $categoryIcon = $this->recipientCategoryIcon($request->kategori ?? 'Lainnya');

        return [
            'id' => $request->id,
            'code' => '#REQ-' . now()->format('Y') . '-' . str_pad((string) $request->id, 5, '0', STR_PAD_LEFT),
            'date' => $request->created_at?->translatedFormat('d M Y') ?? now()->translatedFormat('d M Y'),
            'time_ago' => $request->created_at?->diffForHumans() ?? 'Baru saja',
            'fulfilled_at' => $request->fulfilled_at ? \Carbon\Carbon::parse($request->fulfilled_at)->translatedFormat('d M Y, H:i') : '-',
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jumlah_raw' => $request->jumlah,
            'jumlah' => $request->jumlah . ' Pcs',
            'deskripsi' => $request->deskripsi,
            'status' => $status,
            'donatur' => $request->fulfilledBy?->name ?? 'Belum ada donatur',
            'feedback_photo_url' => $request->feedback_photo && Storage::disk('public')->exists($request->feedback_photo)
                ? asset('storage/' . $request->feedback_photo)
                : null,
            'feedback_nama_barang' => $request->feedback_nama_barang,
            'feedback_jumlah' => $request->feedback_jumlah,
            'feedback_note' => $request->feedback_note,
            'feedback_at' => $request->feedback_at ? \Carbon\Carbon::parse($request->feedback_at)->translatedFormat('d M Y, H:i') : null,
            'icon' => $categoryIcon['icon'],
            'category_key' => $categoryIcon['key'],
            'image' => asset('images/GambarcardRebox1.png'),
        ];
    }

    public function render()
    {
        $salurkanHistories = $this->salurkanHistory();
        $reboxHistories = $this->reboxHistory();
        $activeDonorHistories = $this->filteredDonorHistories($this->tab === 'salurkan' ? $salurkanHistories : $reboxHistories);
        $donorHistoryTotal = count($activeDonorHistories);
        $donorHistoryPageCount = max(1, (int) ceil($donorHistoryTotal / $this->donorHistoryPerPage));
        $this->donorHistoryPage = min($this->donorHistoryPage, $donorHistoryPageCount);

        return view('livewire.riwayat', [
            'salurkanHistories' => $salurkanHistories,
            'reboxHistories' => $reboxHistories,
            'donorHistories' => array_slice($activeDonorHistories, ($this->donorHistoryPage - 1) * $this->donorHistoryPerPage, $this->donorHistoryPerPage),
            'donorHistoryTotal' => $donorHistoryTotal,
            'donorHistoryPageCount' => $donorHistoryPageCount,
            'donorTimeFilterLabel' => $this->donorTimeFilterLabel(),
            'recipientRequests' => $this->recipientRequestHistory(),
        ])->layout('components.layouts.app');
    }
}
