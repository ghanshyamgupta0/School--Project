<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>National Model Academy - Excellence in Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
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
        /* Fix for unwanted top margin */
        body {
            padding-top: 0;
            margin-top: 0;
        }
        .hero-section {
            padding-top: 0;
            margin-top: 0;
        }
        /* About Section Styles */
        .about-image {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .about-image img {
            transition: transform 0.3s ease;
        }
        .about-image:hover img {
            transform: scale(1.05);
        }
        .gallery-item {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            transition: transform 0.3s ease;
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        .gallery-item .overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            transition: all 0.3s ease;
        }
        .gallery-item:hover .overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        }
        /* Academics Section Styles */
        .academic-card {
            transition: transform 0.3s ease;
        }
        .academic-card:hover {
            transform: translateY(-10px);
        }
        .academic-icon {
            height: 80px;
            width: 80px;
            background: rgba(13, 110, 253, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        .academic-features {
            min-height: 100px;
        }
        .feature-item {
            font-size: 0.9rem;
            color: #666;
        }
        .feature-item i {
            font-size: 1rem;
        }
        .academic-card .card {
            transition: all 0.3s ease;
        }
        .academic-card:hover .card {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        }
        /* Language Switch Styles */
        .language-switch {
            position: relative;
            display: inline-flex;
            background: rgba(255, 255, 255, 0.1);
            padding: 4px;
            border-radius: 20px;
            overflow: hidden;
        }
        .language-switch a {
            position: relative;
            z-index: 2;
            padding: 4px 12px;
            border-radius: 16px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }
        .language-switch a.active {
            color: #0d6efd !important;
        }
        .language-switch .slider {
            position: absolute;
            top: 2px;
            left: 2px;
            width: calc(50% - 4px);
            height: calc(100% - 4px);
            background: white;
            border-radius: 16px;
            transition: transform 0.3s ease;
            z-index: 1;
        }
        .language-switch a[data-lang="ne"].active ~ .slider {
            transform: translateX(100%);
        }
        .language-switch span {
            position: relative;
            z-index: 2;
            padding: 0 4px;
        }
        .language-switch a:hover {
            color: #0d6efd !important;
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
                        <a class="nav-link active" href="#home" data-translate="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("about") }}" data-translate="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#academics" data-translate="academics">Academics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#admissions" data-translate="admissions">Admissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news" data-translate="news">News & Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notice') }}" data-translate="notices">Notices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" data-translate="contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold" data-translate="welcomeTitle">Welcome to Our School</h1>
                    <p class="lead" data-translate="welcomeSubtitle">Nurturing minds, building futures, and creating leaders of tomorrow.</p>
                    <div class="d-flex gap-3">
                        <a href="#admissions" class="btn btn-primary btn-lg" data-translate="applyNow">Apply Now</a>
                        <a href="{{ route('result') }}" class="btn btn-outline-primary btn-lg" data-translate="checkResults">Check Results</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="aboutTitle">About Us</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about-content">
                        <h3 data-translate="welcomeMessage">Welcome to National Model Secondary School</h3>
                        <p class="lead mb-4" data-translate="aboutLead">At the center of the city's market, we are shaping future leaders by delivering quality education built on innovation, care, and integrity.</p>
                        
                        <div class="mb-4">
                            <h4 data-translate="ourMission">Our Mission</h4>
                            <p data-translate="missionText">To provide quality education that empowers students to become responsible global citizens. We focus on nurturing each child's unique potential through innovative teaching methods and a supportive learning environment.</p>
                        </div>

                        <div class="mb-4">
                            <h4 data-translate="ourVision">Our Vision</h4>
                            <p data-translate="visionText">To be a leading educational institution that fosters innovation, excellence, and character development. We aim to create a community of lifelong learners who are prepared to meet the challenges of tomorrow.</p>
                        </div>

                        <div class="mb-4">
                            <h4 data-translate="ourPrograms">Our Programs</h4>
                            <p data-translate="programsText">We offer comprehensive education from Nursery to Grade 7, with a curriculum designed to:</p>
                            <ul class="list-unstyled" data-translate-list="programPoints">
                                <li><i class="fas fa-check-circle text-primary me-2"></i><span>Develop critical thinking and problem-solving skills</span></li>
                                <li><i class="fas fa-check-circle text-primary me-2"></i><span>Foster creativity and innovation</span></li>
                                <li><i class="fas fa-check-circle text-primary me-2"></i><span>Build strong character and values</span></li>
                                <li><i class="fas fa-check-circle text-primary me-2"></i><span>Prepare students for future academic success</span></li>
                            </ul>
                        </div>

                        <div>
                            <h4 data-translate="whyChooseUs">Why Choose Us?</h4>
                            <ul class="list-unstyled" data-translate-list="chooseUsPoints">
                                <li><i class="fas fa-star text-primary me-2"></i><span>Experienced and dedicated teaching staff</span></li>
                                <li><i class="fas fa-star text-primary me-2"></i><span>Small class sizes for personalized attention</span></li>
                                <li><i class="fas fa-star text-primary me-2"></i><span>Modern facilities and learning resources</span></li>
                                <li><i class="fas fa-star text-primary me-2"></i><span>Safe and nurturing environment</span></li>
                                <li><i class="fas fa-star text-primary me-2"></i><span>Convenient location in the city center</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image position-relative mb-4">
                        <img src="{{ asset('upload/about/school-building.png') }}" alt="School Building" class="img-fluid">
                        <div class="position-absolute bottom-0 start-0 bg-primary text-white p-3 rounded-top-right">
                            <h5 class="mb-0" data-translate="established">Established 2020</h5>
                            <p class="mb-0" data-translate="serving">Serving the community for over a decade</p>
                        </div>
                    </div>
                    
                    <!-- Image Gallery -->
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="gallery-item position-relative">
                                <img src="{{ asset('upload/about/classroom.png') }}" alt="Modern Classrooms" class="img-fluid">
                                <div class="position-absolute bottom-0 start-0 end-0 overlay p-3">
                                    <h6 class="text-white mb-0">Modern Classrooms</h6>
                                    <small class="text-white-50">Interactive Learning Environment</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-item position-relative">
                                <img src="{{ asset('upload/about/library.png') }}" alt="School Library" class="img-fluid">
                                <div class="position-absolute bottom-0 start-0 end-0 overlay p-3">
                                    <h6 class="text-white mb-0">School Library</h6>
                                    <small class="text-white-50">Knowledge Hub</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-item position-relative">
                                <img src="{{ asset('upload/about/playground.png') }}" alt="Playground" class="img-fluid">
                                <div class="position-absolute bottom-0 start-0 end-0 overlay p-3">
                                    <h6 class="text-white mb-0">Playground</h6>
                                    <small class="text-white-50">Safe Play Area</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-item position-relative">
                                <img src="{{ asset('upload/about/computer-lab.png') }}" alt="Computer Lab" class="img-fluid">
                                <div class="position-absolute bottom-0 start-0 end-0 overlay p-3">
                                    <h6 class="text-white mb-0">Computer Lab</h6>
                                    <small class="text-white-50">Digital Learning</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-2x text-primary mb-3"></i>
                                    <h4>500+</h4>
                                    <p class="mb-0">Happy Students</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-primary mb-3"></i>
                                    <h4>30+</h4>
                                    <p class="mb-0">Expert Teachers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academics Section -->
    <section id="academics" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="academicsTitle">Academics</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="academic-card h-100">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="academic-icon mb-4">
                                    <i class="fas fa-baby fa-3x text-primary"></i>
                                </div>
                                <h3 class="card-title h4 mb-3" data-translate="nurserySchool">Nursery School</h3>
                                <p class="card-text text-muted mb-4" data-translate="nurseryGrade">Class A - U.K.G</p>
                                <div class="academic-features mb-4">
                                    <div class="feature-item d-flex align-items-center mb-2">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="nurseryFeature1">Play-based Learning</span>
                                    </div>
                                    <div class="feature-item d-flex align-items-center mb-2">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="nurseryFeature2">Early Development</span>
                                    </div>
                                    <div class="feature-item d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="nurseryFeature3">Creative Activities</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100" data-translate="learnMore">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="academic-card h-100">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="academic-icon mb-4">
                                    <i class="fas fa-book-reader fa-3x text-primary"></i>
                                </div>
                                <h3 class="card-title h4 mb-3" data-translate="primarySchool">Primary School</h3>
                                <p class="card-text text-muted mb-4" data-translate="primaryGrade">Grades 1-5</p>
                                <div class="academic-features mb-4">
                                    <div class="feature-item d-flex align-items-center mb-2">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="primaryFeature1">Core Subjects</span>
                                    </div>
                                    <div class="feature-item d-flex align-items-center mb-2">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="primaryFeature2">Basic Skills</span>
                                    </div>
                                    <div class="feature-item d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="primaryFeature3">Foundation Building</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100" data-translate="learnMore">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="academic-card h-100">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="academic-icon mb-4">
                                    <i class="fas fa-graduation-cap fa-3x text-primary"></i>
                                </div>
                                <h3 class="card-title h4 mb-3" data-translate="middleSchool">Middle School</h3>
                                <p class="card-text text-muted mb-4" data-translate="middleGrade">Grades 6-8</p>
                                <div class="academic-features mb-4">
                                    <div class="feature-item d-flex align-items-center mb-2">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="middleFeature1">Advanced Subjects</span>
                                    </div>
                                    <div class="feature-item d-flex align-items-center mb-2">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="middleFeature2">Critical Thinking</span>
                                    </div>
                                    <div class="feature-item d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span data-translate="middleFeature3">Skill Development</span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100" data-translate="learnMore">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admissions Section -->
    <section id="admissions" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="admissionsTitle">Admissions</h2>
            <div class="row">
                <div class="col-lg-6">
                    <h3 data-translate="applicationProcess">Application Process</h3>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-primary me-2"></i><span data-translate="submitApplication">Submit Application Form</span></li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i><span data-translate="entranceExam">Entrance Examination</span></li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i><span data-translate="interview">Interview</span></li>
                        <li><i class="fas fa-check-circle text-primary me-2"></i><span data-translate="documentVerification">Document Verification</span></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <form class="admission-form" action="{{ route('admission.store') }}" method="POST">
                        @csrf
                        <h3 data-translate="requestInfo">Request Information</h3>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" rows="3" required>{{ old('address') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control @error('previous_school') is-invalid @enderror" name="previous_school" placeholder="Previous School" value="{{ old('previous_school') }}" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select @error('grade_applying') is-invalid @enderror" name="grade_applying" required>
                                <option value="">Select Grade Applying For</option>
                                <option value="Nursery" {{ old('grade_applying') == 'Nursery' ? 'selected' : '' }}>Nursery</option>
                                <option value="LKG" {{ old('grade_applying') == 'LKG' ? 'selected' : '' }}>LKG</option>
                                <option value="UKG" {{ old('grade_applying') == 'UKG' ? 'selected' : '' }}>UKG</option>
                                <option value="Grade 1" {{ old('grade_applying') == 'Grade 1' ? 'selected' : '' }}>Grade 1</option>
                                <option value="Grade 2" {{ old('grade_applying') == 'Grade 2' ? 'selected' : '' }}>Grade 2</option>
                                <option value="Grade 3" {{ old('grade_applying') == 'Grade 3' ? 'selected' : '' }}>Grade 3</option>
                                <option value="Grade 4" {{ old('grade_applying') == 'Grade 4' ? 'selected' : '' }}>Grade 4</option>
                                <option value="Grade 5" {{ old('grade_applying') == 'Grade 5' ? 'selected' : '' }}>Grade 5</option>
                                <option value="Grade 6" {{ old('grade_applying') == 'Grade 6' ? 'selected' : '' }}>Grade 6</option>
                                <option value="Grade 7" {{ old('grade_applying') == 'Grade 7' ? 'selected' : '' }}>Grade 7</option>
                                <option value="Grade 8" {{ old('grade_applying') == 'Grade 8' ? 'selected' : '' }}>Grade 8</option>
                            </select>
                        </div>

                        <h4 class="mt-4 mb-3">Parent/Guardian Information</h4>
                        <div class="mb-3">
                            <input type="text" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" placeholder="Parent/Guardian Name" value="{{ old('parent_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" placeholder="Parent/Guardian Phone" value="{{ old('parent_phone') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control @error('parent_email') is-invalid @enderror" name="parent_email" placeholder="Parent/Guardian Email" value="{{ old('parent_email') }}" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control @error('parent_occupation') is-invalid @enderror" name="parent_occupation" placeholder="Parent/Guardian Occupation" value="{{ old('parent_occupation') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary" data-translate="submit">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Events Section -->
    <section id="news" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="newsTitle">News & Events</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('upload/sports.jpg') }}" class="card-img-top" alt="Event">
                        <div class="card-body">
                            <h5 class="card-title" data-translate="annualSports">Annual Sports Day</h5>
                            <p class="card-text" data-translate="sportsDesc">Join us for our annual sports celebration.</p>
                            <a href="#" class="btn btn-primary" data-translate="readMore">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('upload/sci-fair.jpg')}}" class="card-img-top" alt="Event">
                        <div class="card-body">
                            <h5 class="card-title" data-translate="scienceFair">Science Fair</h5>
                            <p class="card-text" data-translate="scienceDesc">Showcasing student innovation and creativity.</p>
                            <a href="#" class="btn btn-primary" data-translate="readMore">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('upload/culture.jpg') }}" class="card-img-top" alt="Event">
                        <div class="card-body">
                            <h5 class="card-title" data-translate="culturalFest">Cultural Festival</h5>
                            <p class="card-text" data-translate="culturalDesc">Celebrating diversity and cultural heritage.</p>
                            <a href="#" class="btn btn-primary" data-translate="readMore">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-translate="contactTitle">Contact Us</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3 data-translate="getInTouch">Get in Touch</h3>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Birgunj Kalaiya Road, ganduk Chowk</p>
                    <p><i class="fas fa-phone me-2"></i>(+977) 456-7890</p>
                    <p><i class="fas fa-envelope me-2"></i>nationalmodel@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Your Name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Your Message" required></textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
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
                    <h5 data-translate="quickLinks">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-light" data-translate="home">Home</a></li>
                        <li><a href="#about" class="text-light" data-translate="about">About</a></li>
                        <li><a href="#academics" class="text-light" data-translate="academics">Academics</a></li>
                        <li><a href="#admissions" class="text-light" data-translate="admissions">Admissions</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 data-translate="connectWithUs">Connect With Us</h5>
                    <div class="social-links">
                        <a href="https://www.facebook.com/Nationalmodelsch00l/" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 data-translate="newsletter">Newsletter</h5>
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                            <button class="btn btn-primary" type="submit" data-translate="subscribe">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 National Model Secondary School. <span data-translate="rights">All rights reserved.</span></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        // Language content objects
        const translations = {
            en: {
                // Navigation
                home: "Home",
                about: "About",
                academics: "Academics",
                admissions: "Admissions",
                news: "News & Events",
                notices: "Notices",
                contact: "Contact",
                
                // Hero Section
                welcomeTitle: "Welcome to Our School",
                welcomeSubtitle: "Nurturing minds, building futures, and creating leaders of tomorrow.",
                applyNow: "Apply Now",
                checkResults: "Check Results",

                // About Section
                aboutTitle: "About Us",
                welcomeMessage: "Welcome to National Model Secondary School",
                aboutLead: "At the center of the city's market, we are shaping future leaders by delivering quality education built on innovation, care, and integrity.",
                ourMission: "Our Mission",
                missionText: "To provide quality education that empowers students to become responsible global citizens. We focus on nurturing each child's unique potential through innovative teaching methods and a supportive learning environment.",
                ourVision: "Our Vision",
                visionText: "To be a leading educational institution that fosters innovation, excellence, and character development. We aim to create a community of lifelong learners who are prepared to meet the challenges of tomorrow.",
                ourPrograms: "Our Programs",
                programsText: "We offer comprehensive education from Nursery to Grade 7, with a curriculum designed to:",
                programPoints: [
                    "Develop critical thinking and problem-solving skills",
                    "Foster creativity and innovation",
                    "Build strong character and values",
                    "Prepare students for future academic success"
                ],
                whyChooseUs: "Why Choose Us?",
                chooseUsPoints: [
                    "Experienced and dedicated teaching staff",
                    "Small class sizes for personalized attention",
                    "Modern facilities and learning resources",
                    "Safe and nurturing environment",
                    "Convenient location in the city center"
                ],
                established: "Established 2020",
                serving: "Serving the community for over a decade",

                // Academics Section
                academicsTitle: "Academics",
                nurserySchool: "Nursery School",
                nurseryGrade: "Class A - U.K.G",
                primarySchool: "Primary School",
                primaryGrade: "Grades 1-5",
                middleSchool: "Middle School",
                middleGrade: "Grades 6-8",
                learnMore: "Learn More",

                // Admissions Section
                admissionsTitle: "Admissions",
                applicationProcess: "Application Process",
                requestInfo: "Request Information",
                fullName: "Full Name",
                email: "Email",
                phone: "Phone",
                submit: "Submit",

                // News Section
                newsTitle: "News & Events",
                annualSports: "Annual Sports Day",
                sportsDesc: "Join us for our annual sports celebration.",
                scienceFair: "Science Fair",
                scienceDesc: "Showcasing student innovation and creativity.",
                culturalFest: "Cultural Festival",
                culturalDesc: "Celebrating diversity and cultural heritage.",
                readMore: "Read More",

                // Contact Section
                contactTitle: "Contact Us",
                getInTouch: "Get in Touch",
                message: "Message",
                sendMessage: "Send Message",

                // Footer
                quickLinks: "Quick Links",
                connectWithUs: "Connect With Us",
                newsletter: "Newsletter",
                enterEmail: "Enter your email",
                subscribe: "Subscribe",
                rights: "All rights reserved."
            },
            ne: {
                // Navigation
                home: "गृहपृष्ठ",
                about: "हाम्रोबारे",
                academics: "शैक्षिक",
                admissions: "भर्ना",
                news: "समाचार र कार्यक्रमहरू",
                notices: "सूचनाहरू",
                contact: "सम्पर्क",
                
                // Hero Section
                welcomeTitle: "हाम्रो विद्यालयमा स्वागत छ",
                welcomeSubtitle: "दिमाग विकास, भविष्य निर्माण, र भविष्यका नेताहरू तयार पार्ने",
                applyNow: "अब आवेदन गर्नुहोस्",
                checkResults: "नतिजा हेर्नुहोस्",

                // About Section
                aboutTitle: "हाम्रोबारे",
                welcomeMessage: "नेशनल मोडेल सेकेन्डरी स्कूलमा स्वागत छ",
                aboutLead: "सहरको बजारको केन्द्रमा, हामी नवीनता, हेरचाह र ईमानदारीमा आधारित गुणस्तरीय शिक्षा प्रदान गरेर भविष्यका नेताहरू तयार पार्दैछौं।",
                ourMission: "हाम्रो लक्ष्य",
                missionText: "विद्यार्थीहरूलाई जिम्मेवार विश्व नागरिक बन्न सशक्त बनाउने गुणस्तरीय शिक्षा प्रदान गर्न। हामी नवीन शिक्षण विधिहरू र सहायक सिकाइ वातावरण मार्फत प्रत्येक बच्चाको विशेष क्षमता विकास गर्न ध्यान केन्द्रित गर्दछौं।",
                ourVision: "हाम्रो दृष्टि",
                visionText: "नवीनता, उत्कृष्टता र चरित्र विकासलाई बढावा दिने अग्रणी शैक्षिक संस्था बन्न। हामी कलको चुनौतीहरूको लागि तयार भएका आजीवन सिकारुहरूको समुदाय सिर्जना गर्न लक्ष्य राख्दछौं।",
                ourPrograms: "हाम्रा कार्यक्रमहरू",
                programsText: "हामी नर्सरी देखि कक्षा ७ सम्म व्यापक शिक्षा प्रदान गर्दछौं, जसमा पाठ्यक्रम निम्न उद्देश्यहरूका लागि डिजाइन गरिएको छ:",
                programPoints: [
                    "आलोचनात्मक सोच र समस्या समाधान कौशल विकास",
                    "सृजनशीलता र नवीनता बढावा",
                    "बलियो चरित्र र मूल्यहरू निर्माण",
                    "भविष्यको शैक्षिक सफलताको लागि तयारी"
                ],
                whyChooseUs: "हामीलाई किन चयन गर्ने?",
                chooseUsPoints: [
                    "अनुभवी र समर्पित शिक्षक स्टाफ",
                    "व्यक्तिगत ध्यानको लागि साना कक्षा आकार",
                    "आधुनिक सुविधाहरू र सिकाइ स्रोतहरू",
                    "सुरक्षित र पालन-पोषण वातावरण",
                    "सहर केन्द्रमा सुविधाजनक स्थान"
                ],
                established: "२०२० मा स्थापना",
                serving: "एक दशक भन्दा बढी समुदायलाई सेवा गर्दै",

                // Academics Section
                academicsTitle: "शैक्षिक",
                nurserySchool: "नर्सरी विद्यालय",
                nurseryGrade: "कक्षा ए - यू.के.जी",
                primarySchool: "प्राथमिक विद्यालय",
                primaryGrade: "कक्षा १-५",
                middleSchool: "मध्य विद्यालय",
                middleGrade: "कक्षा ६-८",
                learnMore: "अधिक जान्नुहोस्",

                // Admissions Section
                admissionsTitle: "भर्ना",
                applicationProcess: "आवेदन प्रक्रिया",
                requestInfo: "जानकारी अनुरोध",
                fullName: "पूरा नाम",
                email: "इमेल",
                phone: "फोन",
                submit: "पेश गर्नुहोस्",

                // News Section
                newsTitle: "समाचार र कार्यक्रमहरू",
                annualSports: "वार्षिक खेलकुद दिवस",
                sportsDesc: "हाम्रो वार्षिक खेलकुद उत्सवमा सहभागी हुनुहोस्।",
                scienceFair: "विज्ञान मेला",
                scienceDesc: "विद्यार्थीहरूको नवीनता र सृजनशीलता प्रदर्शन।",
                culturalFest: "सांस्कृतिक उत्सव",
                culturalDesc: "विविधता र सांस्कृतिक विरासतको उत्सव।",
                readMore: "अधिक पढ्नुहोस्",

                // Contact Section
                contactTitle: "हामीलाई सम्पर्क गर्नुहोस्",
                getInTouch: "सम्पर्कमा आउनुहोस्",
                message: "सन्देश",
                sendMessage: "सन्देश पठाउनुहोस्",

                // Footer
                quickLinks: "द्रुत लिङ्कहरू",
                connectWithUs: "हामीसँग जोडिनुहोस्",
                newsletter: "न्युजलेटर",
                enterEmail: "आफ्नो इमेल प्रविष्ट गर्नुहोस्",
                subscribe: "सदस्यता लिनुहोस्",
                rights: "सर्वाधिकार सुरक्षित।"
            }
        };

        // Function to update content based on language
        function updateContent(lang) {
            const elements = document.querySelectorAll('[data-translate]');
            elements.forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[lang][key]) {
                    element.textContent = translations[lang][key];
                }
            });

            // Update lists
            const lists = document.querySelectorAll('[data-translate-list]');
            lists.forEach(list => {
                const key = list.getAttribute('data-translate-list');
                const items = translations[lang][key];
                if (items && Array.isArray(items)) {
                    const listItems = list.querySelectorAll('li');
                    items.forEach((item, index) => {
                        if (listItems[index]) {
                            listItems[index].querySelector('span').textContent = item;
                        }
                    });
                }
            });
        }

        // Language switch functionality
        document.addEventListener('DOMContentLoaded', function() {
            const langLinks = document.querySelectorAll('.language-switch a');
            langLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const lang = this.getAttribute('data-lang');
                    
                    // Update active state
                    langLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update content
                    updateContent(lang);
                });
            });
        });

        // Add these new translations to your existing translations object
        const additionalTranslations = {
            en: {
                // Academics features
                nurseryFeature1: "Play-based Learning",
                nurseryFeature2: "Early Development",
                nurseryFeature3: "Creative Activities",
                primaryFeature1: "Core Subjects",
                primaryFeature2: "Basic Skills",
                primaryFeature3: "Foundation Building",
                middleFeature1: "Advanced Subjects",
                middleFeature2: "Critical Thinking",
                middleFeature3: "Skill Development",

                // Admissions process
                submitApplication: "Submit Application Form",
                entranceExam: "Entrance Examination",
                interview: "Interview",
                documentVerification: "Document Verification"
            },
            ne: {
                // Academics features
                nurseryFeature1: "खेल-आधारित सिकाइ",
                nurseryFeature2: "प्रारम्भिक विकास",
                nurseryFeature3: "सृजनात्मक गतिविधिहरू",
                primaryFeature1: "मुख्य विषयहरू",
                primaryFeature2: "आधारभूत कौशलहरू",
                primaryFeature3: "आधार निर्माण",
                middleFeature1: "उन्नत विषयहरू",
                middleFeature2: "आलोचनात्मक सोच",
                middleFeature3: "कौशल विकास",

                // Admissions process
                submitApplication: "आवेदन फारम पेश गर्नुहोस्",
                entranceExam: "प्रवेश परीक्षा",
                interview: "अन्तर्वार्ता",
                documentVerification: "कागजात प्रमाणीकरण"
            }
        };

        // Merge the additional translations with the existing ones
        Object.keys(additionalTranslations).forEach(lang => {
            translations[lang] = { ...translations[lang], ...additionalTranslations[lang] };
        });

        // Add currentLang variable to track the current language
        let currentLang = 'en';

        // Update the language switch functionality
        document.addEventListener('DOMContentLoaded', function() {
            const langLinks = document.querySelectorAll('.language-switch a');
            langLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const lang = this.getAttribute('data-lang');
                    currentLang = lang;
                    
                    // Update active state
                    langLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update content
                    updateContent(lang);
                });
            });
        });

    </script>
</body>
</html>
