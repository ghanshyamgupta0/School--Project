<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Notices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            padding-top: 20px;
            padding-top: 0;
            margin-top: 0;
        }
        /* Reuse existing styles from index.blade.php */
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: -50px;
        }
        .navbar .nav-link {
            color: #333 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            position: relative;
        }
        .navbar .nav-link:hover {
            color: #0d6efd !important;
            transform: translateY(-2px);
        }
        .navbar .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #0d6efd;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .navbar .nav-link:hover::after {
            width: 80%;
        }
        .navbar .nav-link.active {
            color: #0d6efd !important;
        }
        .navbar .nav-link.active::after {
            width: 80%;
        }
        .school-name {
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .navbar-toggler {
            border-color: #333;
        }
        .top-bar {
            position: relative;
            z-index: 1030;
        }
        .navbar {
            position: relative;
            z-index: 1020;
        }

        .notice-section {
            padding: 40px 0;
        }
        .notice-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 40px 0;
            margin: 40px 0;
        }
        .notice-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .notice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .notice-category {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        .notice-date {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .notice-content {
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .filter-buttons {
            margin-bottom: 30px;
        }
        .filter-btn {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #495057;
            padding: 8px 20px;
            border-radius: 20px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        .filter-btn:hover, .filter-btn.active {
            background: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }
        .important-badge {
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-left: 10px;
        }
        .pagination {
            margin-top: 30px;
        }
        .pagination .page-link {
            color: #0d6efd;
            border: 1px solid #dee2e6;
            margin: 0 2px;
            border-radius: 4px;
        }
        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }
        .pagination .page-link:hover {
            background-color: #e9ecef;
            border-color: #dee2e6;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar bg-primary text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="{{ asset('upload/logo.png') }}" alt="School Logo" height="40">
                        <span class="school-name ms-2">National Model Secondary School</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="language-switch me-3">
                            <a href="#" class="text-white active" data-lang="en">EN</a>
                            <span class="text-white"></span>
                            <a href="#" class="text-white" data-lang="ne">नेपा</a>
                            <div class="slider"></div>
                        </div>
                        <div class="auth-buttons">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-sm btn-light">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route("index") }}#home" data-translate="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("about") }}" data-translate="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#academics" data-translate="academics">Academics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#admissions" data-translate="admissions">Admissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#news" data-translate="news">News & Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notice') }}" data-translate="notices">Notices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#contact" data-translate="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Notice Header -->
    <div class="notice-header">
        <div class="container">
            <h1 class="text-center mb-3">School Notices</h1>
            <p class="text-center mb-0">Stay updated with the latest announcements and important information</p>
        </div>
    </div>

    <!-- Notice Section -->
    <section class="notice-section">
        <div class="container">
            <!-- Filter Buttons -->
            <div class="filter-buttons text-center">
                <button class="filter-btn active" data-filter="all">All Notices</button>
                <button class="filter-btn" data-filter="academic">Academic</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="general">General</button>
                <button class="filter-btn" data-filter="exam">Exam</button>
            </div>

            <!-- Notices Grid -->
            <div class="row g-4">
                @forelse($notices as $notice)
                    <div class="col-md-6 col-lg-4 notice-item" data-category="{{ strtolower($notice->category) }}">
                        <div class="card notice-card h-100">
                            @if($notice->photo)
                                <img src="{{ asset('storage/' . $notice->photo) }}" class="card-img-top" alt="{{ $notice->title }}">
                            @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0">
                                        {{ $notice->title }}
                                        @if($notice->is_important)
                                            <span class="important-badge">Important</span>
                                        @endif
                                    </h5>
                                    <span class="notice-category">{{ $notice->category }}</span>
                                </div>
                                <p class="notice-date mb-2">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $notice->publish_date->format('M d, Y') }}
                                </p>
                                <p class="notice-content mb-3">{{ $notice->content }}</p>
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#noticeModal{{ $notice->id }}">
                                    Read More
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Notice Modal -->
                    <div class="modal fade" id="noticeModal{{ $notice->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        {{ $notice->title }}
                                        @if($notice->is_important)
                                            <span class="important-badge">Important</span>
                                        @endif
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @if($notice->photo)
                                        <img src="{{ asset('storage/' . $notice->photo) }}" class="img-fluid mb-3" alt="{{ $notice->title }}">
                                    @endif
                                    <p class="notice-date mb-3">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $notice->publish_date->format('M d, Y') }}
                                        <span class="ms-3">
                                            <i class="fas fa-tag me-1"></i>
                                            {{ $notice->category }}
                                        </span>
                                    </p>
                                    <div class="notice-content">
                                        {{ $notice->content }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No notices available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $notices->links() }}
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Notice filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const noticeItems = document.querySelectorAll('.notice-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    button.classList.add('active');

                    const filter = button.getAttribute('data-filter');

                    noticeItems.forEach(item => {
                        if (filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html> 