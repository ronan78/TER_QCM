@extends('layout') @section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier une question</h2>
        </div>
        <div class="pull-right col-md-5">
                <a class="btn btn-success" href="{{ route('editreponses', ['id' => $question->id_q]) }}"> Modifier les réponses</a>
                <a class="btn btn-danger" href="{{ route('deletereponses', ['id' => $question->id_q]) }}"> Supprimer des réponses</a>
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

<form method="post" action="{{action('QuestionController@update', $id)}}">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
    <div class="form-group row">
        <label for="intitule_q" class="col-sm-2 col-form-label">Intitulé</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$question->intitule_q}}" name="intitule_q"  required>
        </div>

    </div>
    <div class="form-group row">
        <label for="niveau" class="col-sm-2 col-form-label">Niveau</label>
        <div class="col-sm-10">
        <select id="niveau" name="niveau" class="form-control" required>
            <option @if($question->niveau == 1)selected @endif value="1">1</option>
            <option @if($question->niveau == 2)selected @endif value="2">2</option>
            <option @if($question->niveau == 3)selected @endif value="3">3</option>
            <option @if($question->niveau == 4)selected @endif value="4">4</option>
        </select>
        </div>

    </div>

    

    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <textarea rows="4" cols="50" class="form-control" name="code" >
            {{$question->code}}
            </textarea>
        </div>

    </div>

    <div class="form-group row">
    <label for="id_cat" class="col-sm-2 col-form-label">Catégorie</label>
        <div class="col-sm-10">
        <select id="id_cat" name="id_cat" class="form-control" required>
            @foreach($categories as $categorie)
                <option @if($question->id_cat == $categorie->id_cat )selected @endif  value="{{$categorie->id_cat}}">{{$categorie->nom}}</option>
            @endforeach
        </select>
        </div>

    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="margin-left:38px">Mettre à jour</button>
        &nbsp
        <a class="btn btn-secondary" href="{{ route('questions.index') }}"> Annuler</a>
    </div>

</form>





@endsection