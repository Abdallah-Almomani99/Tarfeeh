<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{


    public function create()
    {
        return view('admin.hero-slide');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'date' => 'nullable|date',
            'title' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('hero_slides', 'public');

        HeroSlide::create([
            'image_path' => $imagePath,
            'date' => $request->date,
            'title' => $request->title,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Slide added successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        Storage::disk('public')->delete($heroSlide->image_path);
        $heroSlide->delete();

        return redirect()->route('dashboard.index')->with('success', 'Slide deleted successfully.');
    }
}
