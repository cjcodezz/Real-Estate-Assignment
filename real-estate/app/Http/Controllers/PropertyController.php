<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $properties = Property::query()
            ->when($request->type, fn($q, $type) => $q->where('type', $type))
            ->when($request->min_price, fn($q, $price) => $q->where('price', '>=', $price))
            ->when($request->max_price, fn($q, $price) => $q->where('price', '<=', $price))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        $property->load('bookings');
        $area_sqm = round($property->area_sqft * 0.092903, 2);
        
        return view('properties.show', [
            'property' => $property,
            'area_sqm' => $area_sqm
        ]);
    }
}