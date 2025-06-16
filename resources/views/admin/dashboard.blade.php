@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Dashboard</h1>
        <div>
            <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Notice
            </a>
        </div>
    </div>

    <!-- Contact Messages Card -->
    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Contact Messages</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Contact::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-primary">
                        View Messages
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Users</h6>
                            <h2 class="mt-2 mb-0">{{ $totalUsers }}</h2>
                        </div>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Notices</h6>
                            <h2 class="mt-2 mb-0">{{ $totalNotices }}</h2>
                        </div>
                        <i class="fas fa-bullhorn"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Admissions</h6>
                            <h2 class="mt-2 mb-0">{{ $totalAdmissions }}</h2>
                        </div>
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Important Notices</h6>
                            <h2 class="mt-2 mb-0">{{ $importantNotices }}</h2>
                        </div>
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data -->
    <div class="row">
        <!-- Recent Notices -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Notices</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($recentNotices as $notice)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $notice->title }}</h6>
                                <small>{{ $notice->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{{ Str::limit($notice->content, 100) }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Admissions -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Admissions</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($recentAdmissions as $admission)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $admission->full_name }}</h6>
                                <small>{{ $admission->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">Grade: {{ $admission->grade_applying }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 