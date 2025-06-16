<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About Us - National Model Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
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
        body {
            padding-top: 0;
            margin-top: 0;
        }

        /* New styles for about page */
        .principal-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset("upload/about/school-building.png") }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        .principal-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            transition: transform 0.3s ease;
        }
        .principal-card:hover {
            transform: translateY(-10px);
        }
        .staff-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .staff-image {
            height: 250px;
            object-fit: cover;
        }
        .staff-info {
            padding: 20px;
        }
        .staff-social {
            margin-top: 15px;
        }
        .staff-social a {
            color: #666;
            margin-right: 10px;
            transition: color 0.3s ease;
        }
        .staff-social a:hover {
            color: #0d6efd;
        }
        .section-title {
            position: relative;
            margin-bottom: 50px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #0d6efd;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar bg-primary text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
                        <img src="{{ asset('upload/logo.png') }}" alt="School Logo" height="40">
                        <span class="school-name ms-2">National Model Secondary School</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="language-switch me-3">
                            <a href="#" class="text-white active" data-lang="en">EN</a>
                            <span class="text-white"> </span>
                            <a href="#" class="text-white" data-lang="ne">नेपा</a>
                            <div class="slider"></div>
                        </div>
                        <div class="auth-buttons">
                            <button onclick="window.location='{{ route('login') }}'" class="btn btn-sm btn-outline-light me-2">Login</button>
                            <button onclick="window.location='{{ route('register') }}'" class="btn btn-sm btn-light">Sign Up</button>
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
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#academics">Academics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#admissions">Admissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#news">News & Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notice') }}">Notices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("index") }}#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Principal Section -->
    <section class="principal-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="principal-card text-center">
                        <img src="{{ asset('upload/staff/principal.jpg') }}" alt="Principal" class="rounded-circle mb-4" style="width: 200px; height: 200px; object-fit: cover;">
                        <h2 class="mb-3">Dr. John Smith</h2>
                        <h4 class="text-primary mb-4">Principal</h4>
                        <p class="lead mb-4">With over 20 years of experience in education, Dr. Smith has been leading our institution with dedication and vision. His commitment to excellence and innovation has helped shape the future of countless students.</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-outline-light"><i class="fab fa-linkedin"></i> LinkedIn</a>
                            <a href="#" class="btn btn-outline-light"><i class="fas fa-envelope"></i> Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Staff Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Our Dedicated Staff</h2>
            <div class="row g-4">
                <!-- Academic Staff -->
                <div class="col-12 mb-5">
                    <h3 class="text-center mb-4">Academic Staff</h3>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="staff-card">
                                <img src="{{ asset('upload/staff/teacher1.jpg') }}" alt="Teacher" class="staff-image w-100">
                                <div class="staff-info">
                                    <h4>Sarah Johnson</h4>
                                    <p class="text-muted">Mathematics Department Head</p>
                                    <p>M.Sc. in Mathematics, 15 years of teaching experience</p>
                                    <div class="staff-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="staff-card">
                                <img src="{{ asset('upload/staff/teacher2.jpg') }}" alt="Teacher" class="staff-image w-100">
                                <div class="staff-info">
                                    <h4>Michael Brown</h4>
                                    <p class="text-muted">Science Department Head</p>
                                    <p>Ph.D. in Physics, 12 years of teaching experience</p>
                                    <div class="staff-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="staff-card">
                                <img src="{{ asset('upload/staff/teacher3.jpg') }}" alt="Teacher" class="staff-image w-100">
                                <div class="staff-info">
                                    <h4>Emily Davis</h4>
                                    <p class="text-muted">English Department Head</p>
                                    <p>M.A. in English Literature, 10 years of teaching experience</p>
                                    <div class="staff-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Administrative Staff -->
                <div class="col-12">
                    <h3 class="text-center mb-4">Administrative Staff</h3>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="staff-card">
                                <img src="{{ asset('upload/staff/admin1.jpg') }}" alt="Admin" class="staff-image w-100">
                                <div class="staff-info">
                                    <h4>David Wilson</h4>
                                    <p class="text-muted">Administrative Director</p>
                                    <p>MBA in Education Management, 8 years of experience</p>
                                    <div class="staff-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="staff-card">
                                <img src="{{ asset('upload/staff/admin2.jpg') }}" alt="Admin" class="staff-image w-100">
                                <div class="staff-info">
                                    <h4>Lisa Anderson</h4>
                                    <p class="text-muted">Student Affairs Coordinator</p>
                                    <p>M.Ed. in Student Affairs, 6 years of experience</p>
                                    <div class="staff-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="staff-card">
                                <img src="{{ asset('upload/staff/admin3.jpg') }}" alt="Admin" class="staff-image w-100">
                                <div class="staff-info">
                                    <h4>Robert Taylor</h4>
                                    <p class="text-muted">IT Department Head</p>
                                    <p>M.Sc. in Computer Science, 7 years of experience</p>
                                    <div class="staff-social">
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('index') }}" class="text-light">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-light">About</a></li>
                        <li><a href="#academics" class="text-light">Academics</a></li>
                        <li><a href="#admissions" class="text-light">Admissions</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Connect With Us</h5>
                    <div class="social-links">
                        <a href="https://www.facebook.com/Nationalmodelsch00l/" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Newsletter</h5>
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 National Model Secondary School. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html> 