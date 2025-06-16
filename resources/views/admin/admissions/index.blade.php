@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admission Applications</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Grade Applying</th>
                                    <th>Parent Name</th>
                                    <th>Parent Phone</th>
                                    <th>Applied Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admissions as $admission)
                                <tr>
                                    <td>{{ $admission->id }}</td>
                                    <td>{{ $admission->full_name }}</td>
                                    <td>{{ $admission->email }}</td>
                                    <td>{{ $admission->phone }}</td>
                                    <td>{{ $admission->grade_applying }}</td>
                                    <td>{{ $admission->parent_name }}</td>
                                    <td>{{ $admission->parent_phone }}</td>
                                    <td>{{ $admission->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $admission->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="{{ route('admin.admissions.delete', $admission->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admission?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- View Modal -->
                                <div class="modal fade" id="viewModal{{ $admission->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $admission->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel{{ $admission->id }}">Admission Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Student Information</h6>
                                                        <p><strong>Name:</strong> {{ $admission->full_name }}</p>
                                                        <p><strong>Email:</strong> {{ $admission->email }}</p>
                                                        <p><strong>Phone:</strong> {{ $admission->phone }}</p>
                                                        <p><strong>Date of Birth:</strong> {{ $admission->dob }}</p>
                                                        <p><strong>Gender:</strong> {{ ucfirst($admission->gender) }}</p>
                                                        <p><strong>Address:</strong> {{ $admission->address }}</p>
                                                        <p><strong>Previous School:</strong> {{ $admission->previous_school }}</p>
                                                        <p><strong>Grade Applying:</strong> {{ $admission->grade_applying }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Parent/Guardian Information</h6>
                                                        <p><strong>Name:</strong> {{ $admission->parent_name }}</p>
                                                        <p><strong>Phone:</strong> {{ $admission->parent_phone }}</p>
                                                        <p><strong>Email:</strong> {{ $admission->parent_email }}</p>
                                                        <p><strong>Occupation:</strong> {{ $admission->parent_occupation }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 