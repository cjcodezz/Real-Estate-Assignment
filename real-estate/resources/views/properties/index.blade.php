@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Available Properties</h1>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('properties.index') }}" class="row g-3">
                <div class="col-md-5">
                    <select name="type" class="form-select">
                        <option value="">All Types</option>
                        <option value="Flat" {{ request('type') == 'Flat' ? 'selected' : '' }}>Flat</option>
                        <option value="Villa" {{ request('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                        <option value="Plot" {{ request('type') == 'Plot' ? 'selected' : '' }}>Plot</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="number" name="min_price" placeholder="Min Price" class="form-control" value="{{ request('min_price') }}">
                </div>
                <div class="col-md-5">
                    <input type="number" name="max_price" placeholder="Max Price" class="form-control" value="{{ request('max_price') }}">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('properties.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        @forelse($properties as $property)
        <div class="col-md-4 mb-4">
            <div class="card h-100 property-card">
                <!-- <img src="{{ asset('storage/' . $property->image_path) }}" class="card-img-top" alt="{{ $property->name }}" style="height: 200px; object-fit: cover;"> -->
                <img src="{{ asset('storage/' . $property->image_path) }}" ...>
                <div class="card-body">
                    <h5 class="card-title">{{ $property->name }}</h5>
                    <p class="card-text">
                        <strong>Type:</strong> {{ $property->type }}<br>
                        <strong>Price:</strong> ₹{{ number_format($property->price) }}<br>
                        <strong>Area:</strong> {{ $property->area_sqft }} sqft
                    </p>
                    <a href="{{ route('properties.show', $property) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">No properties found.</div>
        </div>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $properties->links() }}
    </div>
</div>
@endsection