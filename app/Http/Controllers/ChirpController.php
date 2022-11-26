<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = Chirp::with('user:id,name')->latest()->get();
        return Inertia::render('Chirps/Index', [
            'chirps' => $chirps,
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'message' => 'required|string|max:255',
        ]);

        request()->user()->chirps()->create($validated);

        return back();
    }
}
