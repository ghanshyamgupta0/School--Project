@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Notices</h1>
        <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Notice
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Publish Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notices as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td><span class="badge bg-info">{{ $notice->category }}</span></td>
                                <td>{{ $notice->publish_date->format('M d, Y') }}</td>
                                <td>
                                    @if($notice->is_important)
                                        <span class="badge bg-warning">Important</span>
                                    @else
                                        <span class="badge bg-success">Normal</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this notice?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No notices found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $notices->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 