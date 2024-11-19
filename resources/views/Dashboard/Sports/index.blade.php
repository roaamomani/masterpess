@extends('Dashboard.master')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <!-- Success Alert -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Table -->
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- Data Table -->
                            <div class="card shadow-lg">
                                <div class="card-header bg-success text-white text-center">
                                    <h3 class="text-white"><i class="fas fa-futbol"></i> Sports Type</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead class="bg-success text-white">
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Image</th>
                                                    <th>Court Type</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sports_type as $sport_type)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td> <!-- Serial Number -->
                                                        <td>
                                                            <img src="{{ asset($sport_type->sport_image) }}" alt="sport_image" width="100"
                                                                 title="Click to edit or delete this sport type" data-toggle="tooltip" data-placement="top">
                                                        </td>
                                                        <td>{{ $sport_type->sport_type }}</td>
                                                        <td>{{ $sport_type->sport_desc }}</td>
                                                        <td class="d-flex align-items-center">
                                                            <!-- Edit Button -->
                                                            <a href="{{ route('sport-types.edit', $sport_type->id) }}" class="btn btn-sm btn-warning m-r-5"
                                                               title="Edit Sport Type">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <!-- Delete Button -->
                                                            <form action="{{ route('sport-types.destroy', $sport_type->id) }}" method="POST"
                                                                  onsubmit="return confirm('Are you sure you want to delete this sport type?');"
                                                                  style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete Sport Type">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End Data Table -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
