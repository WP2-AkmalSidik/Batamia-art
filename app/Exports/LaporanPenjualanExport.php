<?php
namespace App\Exports;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanPenjualanExport implements FromCollection
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection(): Collection
    {
        $query = Order::with('orderProduks.produk', 'alamat.user', 'bank');

        if ($this->request->filter == 'monthly') {
            $query->whereMonth('created_at', date('m', strtotime($this->request->bulan)))
                ->whereYear('created_at', date('Y', strtotime($this->request->tahun)));
        } elseif ($this->request->filter == 'yearly') {
            $query->whereYear('created_at', date('Y', strtotime($this->request->tahun)));
        } elseif ($this->request->filter == 'weekly') {
            $query->whereBetween('created_at', [$this->request->dariTanggal, $this->request->sampaiTanggal]);
        }

        if ($this->request->status) {
            $query->where('status', $this->request->status);
        }

        return $query->get()->map(function ($order, $index) {
            return [
                'No'           => $index + 1,
                'Nama Pembeli' => $order->alamat->user->nama ?? '-',
                'Tanggal'      => $order->created_at->format('d-m-Y'),
                'Status'       => $order->status,
                'Total Produk' => $order->orderProduks->sum('kuantitas'),
            ];
        });
    }
}
