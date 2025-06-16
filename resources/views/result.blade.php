<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Checker - National Model Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="../upload/logo.png" alt="School Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}#acedemics">Academics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}#admissions">Admissions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}#news">News & Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notice') }}">Notices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Result Checker Section -->
    <section class="result-section py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body p-5">
                            <h2 class="text-center mb-4">Check Your Result</h2>
                            <form id="resultForm">
                                <div class="mb-3">
                                    <label for="studentId" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" id="studentId" required>
                                </div>
                                <div class="mb-3">
                                    <label for="examType" class="form-label">Exam Type</label>
                                    <select class="form-select" id="examType" required>
                                        <option value="">Select Exam Type</option>
                                        <option value="midterm">Mid-Term Examination</option>
                                        <option value="final">Final Examination</option>
                                        <option value="unit">Unit Test</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <select class="form-select" id="class" required>
                                        <option value="">Select Class</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                        <option value="4">Class 4</option>
                                        <option value="5">Class 5</option>
                                        <option value="6">Class 6</option>
                                        <option value="7">Class 7</option>
                                        <option value="8">Class 8</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Check Result</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html> 