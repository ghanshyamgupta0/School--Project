@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Notice</h1>
        <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Notices
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.notices.update', $notice) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $notice->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="general" {{ old('category', $notice->category) == 'general' ? 'selected' : '' }}>General</option>
                        <option value="academic" {{ old('category', $notice->category) == 'academic' ? 'selected' : '' }}>Academic</option>
                        <option value="event" {{ old('category', $notice->category) == 'event' ? 'selected' : '' }}>Event</option>
                        <option value="exam" {{ old('category', $notice->category) == 'exam' ? 'selected' : '' }}>Exam</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content', $notice->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="date" class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" name="publish_date" value="{{ old('publish_date', $notice->publish_date->format('Y-m-d')) }}" required>
                    @error('publish_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    @if($notice->photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $notice->photo) }}" alt="Current Photo" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                    <small class="text-muted">Leave empty to keep the current photo</small>
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @error('is_important') is-invalid @enderror" id="is_important" name="is_important" value="1" {{ old('is_important', $notice->is_important) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_important">Mark as Important</label>
                        @error('is_important')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Notice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 