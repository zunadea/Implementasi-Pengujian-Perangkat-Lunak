namespace App\Livewire;

use App\Models\Donation;
use App\Models\Rebox;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class FormDonasi extends Component
{
    use WithFileUploads;

    public $rebox_id; // Tetap simpan ini untuk ID database
    public $nama_barang;
    public $jumlah;
    public $kategori;
    public $foto;
    public $deskripsi;
    public $nama_lokasi; // Tambahan untuk tampilan UI

    // SESUAIKAN DI SINI: Parameter harus sama dengan di web.php yaitu {name}
    public function mount($name)
    {
        $this->nama_lokasi = $name;
        
        // Cari ID Rebox berdasarkan namanya untuk disimpan ke DB nanti
        $rebox = Rebox::where('name', $name)->first();
        if ($rebox) {
            $this->rebox_id = $rebox->id;
        }
    }

    public function simpanDonasi()
    {
        $this->validate([
            'nama_barang' => 'required|min:3',
            'jumlah'      => 'required|numeric|min:1',
            'kategori'    => 'required',
            'foto'        => 'required|image|max:2048',
            'deskripsi'   => 'nullable|string|max:500',
        ]);

        $pathFoto = $this->foto->store('donasi', 'public');

        Donation::create([
            'user_id'     => Auth::id(),
            'rebox_id'    => $this->rebox_id,
            'nama_barang' => $this->nama_barang,
            'jumlah'      => $this->jumlah,
            'kategori'    => $this->kategori,
            'foto'        => $pathFoto,
            'deskripsi'   => $this->deskripsi,
            'status'      => 'pending',
        ]);

        session()->flash('message', 'Donasi berhasil dikirim!');
        return redirect()->route('riwayat');
    }

    public function render()
    {
        return view('livewire.form-donasi', [
            // Gunakan properti nama_lokasi yang sudah di-set di mount
            'lokasiTerpilihName' => $this->nama_lokasi 
        ]);
    }
}