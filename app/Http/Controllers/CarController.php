<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rent;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cars,name',
            'brand_id' => 'required',
            'year' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        if ($validated) {
            Car::create($validated);
        }

        return redirect()->route('admin.index')->with('success', 'Mobil berhasil ditambahkan');
    }

    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Mobil berhasil diupdate');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        Rent::where('car_id', $car->id)->delete();
        return redirect()->route('admin.index')->with('success', 'Mobil berhasil dihapus');
    }
}
