<!DOCTYPE html>
<!-- resources/views/layouts/app.blade.php -->
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SIAKAD</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .navbar {
            background-color: #0d6efd;
            color: white;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: white;
            padding-top: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #e9f2ff;
            color: #0d6efd;
        }

        .content {
            padding: 25px;
            width: 100%;
        }

        .card {
            background-color: white;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .card-box {
            display: flex;
            gap: 15px;
        }

        .card-box .card {
            width: 33%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #0d6efd;
            color: white;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 15px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .form-card {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 500px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .status-aktif {
            color: green;
            font-weight: bold;
        }

        .status-cuti {
            color: orange;
            font-weight: bold;
        }

        .alert {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    @include('components.navbar')

    <div class="wrapper">
        @include('components.sidebar')

        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
