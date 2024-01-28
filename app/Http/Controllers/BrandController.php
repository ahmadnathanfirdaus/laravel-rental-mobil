<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:brands,name',
        ]);

        if ($validated) {
            Brand::create($validated);
        }

        return redirect()->route('admin.index')->with('success', 'Merk berhasil ditambahkan');
    }
}
