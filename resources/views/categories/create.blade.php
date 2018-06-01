@extends('layout')


@section('content')

@if ((session('errors')))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>{{ (session('errors')) }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        </div>
    @endif
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter une Catégorie</h2>
            </div>
        
        </div>
    </div>

    


    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Il y a eu un problème avec vos entrées.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(array('route' => 'categories.store','method'=>'POST')) !!}
         @include('categories.form')
    {!! Form::close() !!}


@endsection