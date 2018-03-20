@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Détails Catégorie</h2>
            </div>
            
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $categorie->nom}}
            </div>
        </div>
    </div>

    <div class="text-center">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Retour</a>
            </div>
@endsection