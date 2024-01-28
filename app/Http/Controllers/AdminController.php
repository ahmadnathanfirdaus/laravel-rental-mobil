<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'brands' => Brand::all(),
            'cars' => Car::all(),
            'rents' => Rent::all(),
        ];
        return view('admin.index', $data);
    }
}
