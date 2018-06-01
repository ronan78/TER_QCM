@extends('layout')


@section('content')



    <div class="container">
        <br>
        <br>
        <center>
        <div class="wrapper">
      <div class="panel">
        <div class="panel-header">
          <h3 class="title">Statistiques</h3>
 
          
        </div>
 
        <div class="panel-body">
          <div class="categories">
            <div class="category">
              <span >Catégories</span>
              <span class="text-primary">{{$categories}}</span>
            </div>
            <div class="category">
              <span>Questions</span>
              <span class="text-primary">{{$questions}}</span>
            </div>
            <div class="category">
              <span>Réponses</span>
              <span class="text-primary">{{$reponses}}</span>
            </div>
          </div>
 
      </div>
      </center>
    </div>


@endsection