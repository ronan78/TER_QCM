@extends('layout')


@section('content')



    <div class="container">
        <br>
        <br>
        <div class="card-deck text-center">
            <div class="card border-secondary mb-3" >
                <div class="card-header">Gestion des Catégories</div>
                <div class="card-body text-secondary">
                    <div class="card-body">

                        <a href="{{ url('/categories ') }}" class="btn btn-lg btn-block btn-primary">Gérer</a>
                    </div>
                </div>


            </div>
            <div class="card border-secondary mb-3" >
                <div class="card-header">Gestion des Questions</div>
                <div class="card-body text-secondary">
                    <div class="card-body">

                        <a href="{{ url('/questions ') }}" class="btn btn-lg btn-block btn-primary">Gérer</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection