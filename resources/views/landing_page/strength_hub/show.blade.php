@extends('landing_page.layouts.master')

@section('content')

<div class="container">
    @if($strengthHub)
        <h1>{{ $strengthHub->name }}</h1>
        <p>{{ $strengthHub->description }}</p>
        <p><strong>Location:</strong> {{ $strengthHub->location }}</p>
        <p><strong>Price per Session:</strong> ${{ $strengthHub->price_per_session }}</p>
    @else
        <p>StrengthHub not found!</p>
    @endif
</div>

@endsection
