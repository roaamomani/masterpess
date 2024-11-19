@extends('landing_page.layouts.master')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $strengthHub->name }}</h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('Home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Strength Hubs</a></li>
            <li class="breadcrumb-item active text-primary">{{ $strengthHub->name }}</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Strength Hub Details Start -->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            @if($strengthHub->images->isNotEmpty())
                <div id="strengthHubImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($strengthHub->images as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset($image->path) }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Strength Hub Image">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#strengthHubImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#strengthHubImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            <h2 class="mb-4">{{ $strengthHub->name }}</h2>
            <p class="mb-2"><strong>Trainer:</strong> {{ $strengthHub->trainer->name }}</p>
            <p class="mb-2"><strong>Type of Training:</strong> {{ $strengthHub->type }}</p>
            <p class="mb-4"><strong>Description:</strong> {{ $strengthHub->description ?? 'No description available.' }}</p>
            <p class="mb-4"><strong>Location:</strong> {{ $strengthHub->location }}</p>
            <p class="mb-4"><strong>Price per Session:</strong> ${{ $strengthHub->price_per_session }}</p>
            <p class="mb-4"><strong>Available Time:</strong> {{ \Carbon\Carbon::parse($strengthHub->available_from)->format('g:i A') }} to {{ \Carbon\Carbon::parse($strengthHub->available_to)->format('g:i A') }}</p>

            <p class="mb-4 {{ $strengthHub->availability == 1 ? 'text-success' : 'text-danger' }}">
                {{ $strengthHub->availability == 1 ? 'Available for Booking' : 'Not Available' }}
            </p>

            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ route('book.training', ['strengthHub_id' => $strengthHub->id]) }}">Book a Session</a>

            <a href="{{ route('services.index') }}" class="btn btn-success rounded-pill py-2 px-4">Back to Strength Hubs</a>
        </div>
    </div>
</div>
<!-- Strength Hub Details End -->

@endsection
