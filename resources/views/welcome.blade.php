<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Our E-Commerce Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?shopping') no-repeat center center;
            background-size: cover;
            height: 60vh;
            color: rgb(198, 8, 81);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="hero">
        <div>
            <h1>Welcome to Our E-Commerce Site</h1>
            <p>Your one-stop shop for all your needs!</p>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Admin Dashboard</a>
            <a href="{{ route('products.index') }}" class="btn btn-success">Shop Now</a>
        </div>
    </div>

    <div class="container mt-4">
        <h2>Featured Products</h2>
        <p>Check out our latest products!</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>