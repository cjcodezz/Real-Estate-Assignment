<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'datetime' => [
                'required',
                'date',
                Rule::unique('bookings')->where(function ($query) use ($property) {
                    return $query->where('property_id', $property->id);
                })
            ]
        ]);

        $booking = new Booking($validated);
        $booking->property_id = $property->id;
        $booking->save();

        return redirect()->back()->with('success', 'Booking created successfully!');
    }
}