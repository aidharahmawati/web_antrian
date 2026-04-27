<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-auth {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
        }

        .card-auth .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            border-radius: 8px;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>