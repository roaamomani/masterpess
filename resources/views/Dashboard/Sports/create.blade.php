@extends('Dashboard.master')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Start Form Card -->
                            <div class="card shadow-lg ">
                                <div class="card-header bg-success text-white text-center">
                                    <h4><strong class="text-white">Add New Sport Type</strong></h4>
                                </div>
                                <div class="card-body">
                                    <!-- Form Errors -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Start Form -->
                                    <form action="{{ route('sport-types.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Sport Type Name-->
                                        <div class="form-group">
                                            <label for="sport_type">Sport Type</label>
                                            <input type="text" id="sport_type" name="sport_type" placeholder="Enter Sport Type" class="form-control" onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';" onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';">
                                        </div>

                                        <!-- Sport Type Description -->
                                        <div class="form-group">
                                            <label for="sport_desc">Sport Type Description</label>
                                            <textarea id="sport_desc" name="sport_desc" placeholder="Enter Sport Type Description" class="form-control" onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';" onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';"></textarea>
                                        </div>

                                        <!-- Duration -->
                                        <div class="form-group">
                                            <label for="duration">Duration (in minutes)</label>
                                            <input type="number" id="duration" name="duration" placeholder="Enter Duration" class="form-control" onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';" onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';">
                                        </div>

                                        <!-- Difficulty Level -->
                                        <div class="form-group">
                                            <label for="difficulty">Difficulty Level</label>
                                            <select id="difficulty" name="difficulty" class="form-control">
                                                <option value="beginner">Beginner</option>
                                                <option value="intermediate">Intermediate</option>
                                                <option value="advanced">Advanced</option>
                                            </select>
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="form-group">
                                            <label for="sport_image">Add Image</label>
                                            <input type="file" id="sport_image" name="sport_image" class="form-control" onfocus="this.style.borderColor='#00D084'; this.style.boxShadow='0 0 5px rgba(76, 175, 80, 0.5)'; this.style.outline='none';" onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none';">
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check-circle"></i> Create
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                            <!-- End Form Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
