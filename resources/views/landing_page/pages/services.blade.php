@extends('landing_page.layouts.master')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Strength Hubs</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('Home') }}">Home</a></li>
            <li class="breadcrumb-item active text-primary">Strength Hubs</li>
        </ol>
    </div>
</div>
<!-- Header End -->

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Services Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Strength Hubs</h4>
            <h1 class="display-5 mb-4">Explore Our Available Strength Training Sessions</h1>
            <p class="mb-0">Browse through our wide range of training sessions at our Strength Hubs. Whether you're looking for strength training or conditioning, we have the perfect session for you.</p>
        </div>

        <!-- Filters Start -->
        <div class="container py-5">
            <form method="GET" action="{{ route('services.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" name="training_type" onchange="this.form.submit()">
                            <option value="">Select Training Type</option>
                            @foreach($trainingTypes as $trainingType)
                                <option value="{{ $trainingType->id }}" {{ request('training_type') == $trainingType->id ? 'selected' : '' }}>
                                    {{ $trainingType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="trainer_type" onchange="this.form.submit()">
                            <option value="">Select Trainer Type</option>
                            @foreach($trainerTypes as $trainerType)
                                <option value="{{ $trainerType->id }}" {{ request('trainer_type') == $trainerType->id ? 'selected' : '' }}>
                                    {{ $trainerType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('services.index') }}" class="btn btn-success w-100">Show All</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Filters End -->

        <div class="row g-4">
            @foreach($strengthHubs as $strengthHub)
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="service-item" style="display: flex; flex-direction: column; height: 100%;">
                        <div class="service-img" style="flex: 1;">
                            @if($strengthHub->images->isNotEmpty())
                                <img src="{{ asset($strengthHub->images->first()->path) }}" class="img-fluid rounded-top" style="height: 200px; object-fit: cover; width: 100%;" alt="{{ $strengthHub->name }}">
                            @else
                                <img src="{{ asset('landing/img/placeholder.jpg') }}" class="img-fluid rounded-top" style="height: 200px; object-fit: cover; width: 100%;" alt="Placeholder">
                            @endif
                        </div>
                        <div class="rounded-bottom p-4" style="flex: 1;">
                            <a href="{{ route('services.show', $strengthHub->id) }}" class="h4 d-inline-block mb-4" style="display: block; font-size: 1.25rem; color: #333;">
                                {{ $strengthHub->name }}
                            </a>
                            <p class="mb-4" style="color: #555;"><strong>Training Type:</strong> {{ $strengthHub->trainingType->name }}</p>
                            <p class="mb-4" style="color: #555;"><strong>Trainer Type:</strong> {{ $strengthHub->trainerType->name }}</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('services.show', $strengthHub->id) }}">View Details</a>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('book', ['strengthHub_id' => $strengthHub->id]) }}">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services End -->

@endsection
