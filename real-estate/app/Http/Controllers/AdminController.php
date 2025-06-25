<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Flat,Villa,Plot',
            'price' => 'required|numeric|min:0',
            'area_sqft' => 'required|integer|min:1',
            'address' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // $imagePath = $request->file('image')->store('public/uploads');
        // $validated['image_path'] = str_replace('public/', '', $imagePath);
        $imagePath = $request->file('image')->store('uploads', 'public');
        $validated['image_path'] = $imagePath;

        Property::create($validated);

        return redirect()->route('admin.create')->with('success', 'Property added successfully!');
    }
}