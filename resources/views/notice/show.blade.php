@extends("layouts.app");

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Notices</h1>
        <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">Create New Notice</a>
    </div>

    <div class="row">
        @foreach($notices as $notice)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    @if($notice->photo)
                        <img src="{{ asset('storage/' . $notice->photo) }}" class="card-img-top" alt="{{ $notice->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $notice->title }}</h5>
                        <p class="card-text">{{ Str::limit($notice->content, 150) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info">{{ $notice->category }}</span>
                            <small class="text-muted">{{ $notice->publish_date->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection