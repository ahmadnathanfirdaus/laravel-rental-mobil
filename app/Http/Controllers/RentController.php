<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required',
            'user_id' => 'required',
            'rent_date' => 'required',
            'return_date' => 'required',
            'total_price' => 'required',
        ]);

        if ($validated) {
            Rent::create($validated);
        }

        return redirect()->route('home')->with('success', 'Penyewaan berhasil dilakukan');
    }

    public function approve(Rent $rent)
    {
        $rent->update([
            'status' => 'approved',
        ]);
        return redirect()->route('admin.index')->with('success', 'Penyewaan berhasil disetujui');
    }

    public function deny(Rent $rent)
    {
        $rent->update([
            'status' => 'denied',
        ]);
        return redirect()->route('admin.index')->with('success', 'Penyewaan berhasil ditolak');
    }
}
