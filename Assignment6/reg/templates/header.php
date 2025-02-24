<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบลงทะเบียนเรียน</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3490dc;
            --secondary-color: #38c172;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color);
        }

        .welcome-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-top: 2rem;
        }

        .welcome-section h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 1.5rem 0;
            margin-top: 3rem;
        }

        .nav-link {
            color: var(--dark-color);
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .main-header {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .student-info {
            border-left: 4px solid var(--secondary-color);
            padding-left: 1rem;
            margin-top: 1rem;
        }

        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            border-radius: 0.5rem 0.5rem 0 0 !important;
            padding: 1.5rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(52, 144, 220, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #2779bd;
            border-color: #2779bd;
        }
        
        .form-label {
            font-weight: 500;
        }
        
        .alert {
            margin-top: 1rem;
            border-radius: 0.25rem;
        }
        
        .input-group-text {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        header {
            background-color: #0d6efd;
            color: white;
            padding: 20px 0;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        header h1 {
            margin: 0;
            font-weight: 600;
        }
        nav {
            background-color: #f1f1f1;
            padding: 10px 0;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        nav a {
            color: #333;
            text-decoration: none;
            margin-right: 15px;
            padding: 8px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        nav a:hover {
            background-color: #0d6efd;
            color: white;
        }
        section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        h2 {
            color: #0d6efd;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .table-container {
            margin-bottom: 30px;
        }

        .btn-withdraw {
            color: #dc3545;
            border: 1px solid #dc3545;
            transition: all 0.3s;
        }
        .btn-withdraw:hover {
            background-color: #dc3545;
            color: white;
        }

        .main-content {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-enroll {
            background-color: #198754;
            color: white;
            border-radius: 4px;
            padding: 6px 12px;
            text-decoration: none;
            transition: all 0.3s;
        }
        .btn-enroll:hover {
            background-color: #146c43;
            color: white;
        }

        .course-table th {
            background-color: #0d6efd;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }
        .course-table td {
            padding: 10px 15px;
            border-top: 1px solid #dee2e6;
        }
        .course-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .course-table tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>

<body>
    <header class="main-header">
        <div class="container">
            <h1 class="text-center mb-0">ระบบลงทะเบียนเรียน</h1>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>ระบบลงทะเบียนเรียน
            </a>
            <div>
                <ul class="navbar-nav ms-auto">
                    <?php
                    if (isset($_SESSION['timestamp'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/main"><i class="fas fa-home me-1"></i>หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile"><i class="fas fa-user me-1"></i>ข้อมูลนักเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/courses"><i class="fas fa-book me-1"></i>รายวิชา</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><i class="fas fa-sign-out-alt me-1"></i>ออกจากระบบ</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fas fa-home me-1"></i>หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary ms-2" href="/login"><i class="fas fa-sign-in-alt me-1"></i>เข้าสู่ระบบ</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>