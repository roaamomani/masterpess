@extends('Dashboard.master')

@section('content')

<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-success text-white text-center">
                            <h3 class="card-title text-white">Edit Sport Type - {{ $sport_type->sport_type }}</h3>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('sport-types.update', $sport_type->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Current Image Display -->
                                <div class="form-group mb-4">
                                    <label for="sport_image" class="form-label">Current Image</label>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <div class="card">
                                                <img src="{{ asset($sport_type->sport_image) }}" alt="Sport Image" class="card-img-top img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload New Image -->
                                <div class="form-group mb-4">
                                    <label for="sport_image" class="form-label">Select another Image</label>
                                    <input type="file" name="sport_image" id="sport_image" class="form-control"
                                           onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';"
                                           onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';">
                                </div>

                                <!-- Sport Type Name -->
                                <div class="form-group mb-3">
                                    <label for="sport_type" class="form-label">Type of Sport</label>
                                    <input type="text" name="sport_type" id="sport_type" class="form-control" value="{{ $sport_type->sport_type }}" required
                                           onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';"
                                           onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';">
                                </div>

                                <!-- Sport Description -->
                                <div class="form-group mb-3">
                                    <label for="sport_desc" class="form-label">Description</label>
                                    <textarea name="sport_desc" id="sport_desc" class="form-control" rows="3" required
                                              onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';"
                                              onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';">{{ $sport_type->sport_desc }}</textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success btn-lg w-100">Save Update</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('sport-types.index') }}" class="btn btn-secondary btn-lg">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
