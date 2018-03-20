<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>QCM Manager</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/delete-modal.css" rel="stylesheet">

</head>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"> <a href="{{ url('/') }}">QCM Manager</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ url('/categories') }}">Catégories</a>
            <a class="p-2 text-dark" href="{{ url('/questions') }}">Questions</a>
            <a class="p-2 text-dark" href="{{ url('/reponses') }}">Réponses</a>
        </nav>
    </div>

<body>

    <div class="container">
        @yield('content')
    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/app.js') }}"></script>


    <footer class="text-center">© Vegapunk - TER 2018</footer>
</body>

</html>