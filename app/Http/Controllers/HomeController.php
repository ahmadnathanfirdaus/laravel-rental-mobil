<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.index');
        }

        $data = [
            'brands' => Brand::all(),
            'cars' => Car::all(),
            'rents' => Rent::where('user_id', auth()->user()->id)->get(),
        ];

        return view('user.index', $data);
    }
}
