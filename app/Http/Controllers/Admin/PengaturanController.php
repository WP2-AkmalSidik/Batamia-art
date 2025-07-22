<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Pengaturan;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPages = 25;

            $banks   = Bank::where('jenis', 'bank')->get();
            $wallets = Bank::where('jenis', 'e-wallet')->get();

            $data = [
                'view' => view('pages.admin.pengaturan-toko.components.bank', compact('wallets', 'banks'))->render(),
            ];

            return $this->successResponse($data, 'Data berhasil ditemukan.');
        }
        return view('pages.admin.pengaturan-toko.index');
    }

    public function updatePengaturan(Request $request)
    {
        $pengaturan = Pengaturan::where('id', 1)->first();
        $validated  = $request->validate([
            'nama_toko' => 'required',
            'alamat'    => 'required',
            'provinsi'  => 'required',
            'kota'      => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kode_pos'  => 'required',
            'deskripsi' => 'nullable',
            'no_telp'   => 'nullable',
            'email'     => 'nullable',
            'facebook'  => 'nullable',
            'instagram' => 'nullable',
            'x'         => 'nullable',

        ]);

        try {
            $pengaturan->update($validated);
            return $this->successResponse($pengaturan, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan Pengaturan: ' . $e->getMessage());
            return $this->errorResponse(null, 'Data gagal disimpan. ' . $e->getMessage());
        }
    }
    public function storeBank(Request $request)
    {
        $validated = $request->validate([
            'nama_bank' => 'required|unique:banks,nama_bank',
            'nama_akun' => 'required',
            'no_akun'   => 'required|integer',
            'jenis'     => 'required|in:bank,e-wallet',
            'logo'      => 'nullable|image|max:2048',
        ]);

        try {
            if ($request->hasFile('logo')) {
                $fotoPath          = $request->file('logo')->store('bank', 'public');
                $validated['logo'] = $fotoPath;
            } else {
                $validated['logo'] = getUiAvatar($validated['nama_bank']);
            }

            $bank = Bank::create($validated);

            return $this->successResponse($bank, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan Bank: ' . $e->getMessage());
            return $this->errorResponse(null, 'Data gagal disimpan. ' . $e->getMessage());
        }
    }
    public function showBank(string $id)
    {
        $bank = Bank::where('id', $id)->first();
        if (! $bank) {
            return $this->errorResponse(null, 'Data gagal ditemukan');
        }
        return $this->successResponse($bank, 'Data berhasil ditemukan');
    }
    public function updateBank(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_bank' => 'required|unique:banks,nama_bank,' . $id . ',id',
            'nama_akun' => 'required',
            'no_akun'   => 'required|integer',
            'jenis'     => 'required|in:bank,e-wallet',
            'logo'      => 'nullable|image|max:2048',
        ]);

        try {
            $bank = Bank::findOrFail($id);

            // Handle image update
            if ($request->hasFile('logo')) {
                // Hapus gambar lama jika ada
                if ($bank->logo && Storage::disk('public')->exists($bank->logo)) {
                    Storage::disk('public')->delete($bank->logo);
                }

                // Simpan gambar baru
                $fotoPath          = $request->file('logo')->store('bank', 'public');
                $validated['logo'] = $fotoPath;
            } else {
                // Pertahankan gambar lama jika tidak ada upload baru
                unset($validated['logo']);
            }

            $bank->update($validated);

            return $this->successResponse($bank, 'Data Bank berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui Bank: ' . $e->getMessage());
            return $this->errorResponse(null, 'Data gagal diperbarui. Silakan coba lagi.');
        }
    }
    public function updateStatusBank(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => 'required|boolean',
        ]);

        try {
            $bank = Bank::findOrFail($id);

            $bank->update($validated);

            return $this->successResponse($bank, 'Data Bank berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui Bank: ' . $e->getMessage());
            return $this->errorResponse(null, 'Data gagal diperbarui. Silakan coba lagi.');
        }
    }
    public function destroyBank(string $id)
    {
        $bank = Bank::where('id', $id)->first();

        if (! $bank) {
            return $this->errorResponse(null, 'Bank tidak ditemukan. ' . $id);
        }
        try {
            $bank->delete();
            return $this->successResponse(
                $bank,
                'Bank berhasil dihapus.'
            );
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Bank gagal dihapus. ' . $e->getMessage());
        }
    }
}
