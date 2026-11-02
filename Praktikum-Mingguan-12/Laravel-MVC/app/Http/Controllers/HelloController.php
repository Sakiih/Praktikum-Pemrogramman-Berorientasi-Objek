<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class HelloController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        return view('hello', compact('mahasiswa'));
    }
}