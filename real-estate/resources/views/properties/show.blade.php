@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <!-- <img src="{{ asset('storage/' . $property->image_path) }}" class="card-img-top" alt="{{ $property->name }}" style="max-height: 500px; object-fit: cover;"> -->
                 <img src="{{ asset('storage/' . $property->image_path) }}" ...>
                <div class="card-body">

                    <h1 class="card-title">{{ $property->name }}</h1>
                    <p class="text-muted">{{ $property->type }}</p>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <h5>Price</h5>
                                <p class="mb-0">₹{{ number_format($property->price) }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 border rounded">
                                <h5>Area</h5>
                                <p class="mb-0">{{ $property->area_sqft }} sqft ({{ $area_sqm }} sqm)</p>
                            </div>
                        </div>
                    </div>
                    
                    <h3>Address</h3>
                    <p>{{ $property->address }}</p>
                    
                    <h3>Description</h3>
                    <p>{{ $property->description }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Book a Viewing</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('bookings.store', $property) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Preferred Date/Time</label>
                            <input type="datetime-local" name="datetime" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Book Viewing</button>
                    </form>
                    
                    @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection