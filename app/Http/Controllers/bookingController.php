<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\lapangan;
use Illuminate\Http\Request;

class bookingController extends Controller
{
    public function index(string $id)
    {
        $lapangan = lapangan::find($id);

        // return view('booking.index');
        $bookedTimes = booking::select('tanggal', 'start_time', 'end_time')
            ->where('lapangan_id', $lapangan->id)
            ->whereNotIn('status', ['selesai', 'canceled'])
            ->get();
        return view('booking.index', compact('lapangan', 'bookedTimes'));
    }

    protected function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'lapangan_id' => 'required',
            'no_telp' => 'required',
            'tanggal' => 'required',
            'durasi' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'total' => 'required',
        ]);

        booking::create([
            'user_id' => $request->user_id,
            'lapangan_id' => $request->lapangan_id,
            'no_telp' => $request->no_telp,
            'tanggal' => $request->tanggal,
            'durasi' => $request->durasi,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total' => $request->total,
        ]);

        $booking = booking::all();
        $lapangan = lapangan::all();
        return redirect()->route('konfirmasi', compact('lapangan', 'booking'))->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function cancelOrder(string $id)
    {
        // Cari pesanan berdasarkan ID
        $booking = booking::findOrFail($id);

        // Periksa apakah pesanan belum dibayar
        if (!$booking->bayar) {
            // Lakukan proses pembatalan
            $booking->status = 'Canceled';
            $booking->save();

            // Berikan pesan sukses jika berhasil dibatalkan
            return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
        } else {
            // Berikan pesan error jika pesanan sudah dibayar
            return redirect()->back()->with('error', 'Pesanan sudah dibayar dan tidak dapat dibatalkan.');
        }
    }
}
