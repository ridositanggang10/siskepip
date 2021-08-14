<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>siskepip | landing page</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/landing_page/assets/css/landing_page.css')}}">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('admin/dist/img/Logo-F.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('admin/dist/img/Logo-F.png')}}">
</head>

<body class="min-vh-100 d-flex flex-column">

    <header>
        <div class="container">
            <nav class="navbar navbar-dark bg-transparenet">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('user/landing_page/assets/images/Logo_V7.png')}}" alt="logo">
                </a>
            </nav>
        </div>
    </header>
    <main class="my-auto">
        <div class="container">
            <h1 class="page-title">Masyarakat adalah Keluarga</h1>
            <p class="page-description">Kesejahteraan masyarakat adalah kebahagiaan tersendiri dari pekerjaan saya. Karena kepercayaan mereka adalah sebuah kekuatan kami.
            </p>

            <a href="{{url('/login')}}" class="main-button-slider">Masuk</a>
        </div>
    </main>
</body>

</html>