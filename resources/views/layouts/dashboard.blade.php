<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<header>
    <div class="d-flex justify-content-center w-100">
        <h1 class="display-4 text-primary mb-4">Vendors Summary</h1>
    </div>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>
