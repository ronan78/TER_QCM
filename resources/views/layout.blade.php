<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Qcm manager for L1 Informatique UVSQ">
    <meta name="author" content="Rostom BOUREGHIT & Ronan D'Amonville & Antoine Fernandez & Yann Richou">
    <link rel="icon" href="">

    <title>QCM Manager</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/all.css">

</head>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <img href="../../public/logo qcm.png"  width="150"/>
        <h5 class="my-0 mr-md-auto font-weight-normal"> <a href="{{ url('/') }}">QCM Manager</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ url('/categories') }}">Catégories</a>
            <a class="p-2 text-dark" href="{{ url('/questions') }}">Questions</a>
        </nav>
    </div>

<body>

    <div class="container">
        @include('flash-message')
        @yield('content')
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/app.js') }}"></script>

<br>
    <footer class="">© Vegapunk - TER 2018</footer>
</body>

</html>