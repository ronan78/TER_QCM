@extends('layout') @section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier Catégorie</h2>
        </div>

    </div>
</div>
<br> @if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> il y a eu un problème avec vos entrées.
    <br>
    <br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{action('CategorieController@update', $id)}}">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
    <div class="form-group row">
        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nom" value="{{$categorie->nom}}">
        </div>

    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="margin-left:38px">Mettre à jour</button>
        &nbsp
        <a class="btn btn-secondary" href="{{ route('categories.index') }}"> Annuler</a>
    </div>

</form>





@endsection