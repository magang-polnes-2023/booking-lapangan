<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class konfirmasiController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $booking = Booking::with('user', 'lapangan')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(5);

        return view('konfirmasi.index', compact('booking'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'bukti' => 'required|image|max:2048',
        ]);

        $booking = booking::findOrFail($id);
        $bukti = $request->file('bukti');
        $bukti->storeAs('public/', $bukti->hashName());
        Storage::delete('public/' . $booking->bukti);
        $booking->update([
            'bukti' => $bukti->hashName(),
            'status' => 'Sedang Diverifikasi'
        ]);

        return redirect()->route('konfirmasi')->with(['success' => 'data booking sudah diupdate']);
    }
}
