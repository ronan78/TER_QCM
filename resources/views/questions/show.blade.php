@extends('layout')

@section('content')




    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            
                <h2> Détails de la question</h2>
            </div>
            
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Intitulé de la question :</strong>
                {{ $question->intitule_q}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Niveau :</strong>
                {{ $question->niveau}}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type de choix :</strong>
                @if($question->multi == 0) Unique @else Multiple @endif
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code :</strong>
                {{ $question->code}}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Catégorie :</strong>
                {{ $question->categorie->nom}}
            </div>
        </div>

        
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Réponses</h2>
            </div>
            
        </div>
    </div>
    @foreach($question->reponse as $reponse)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{$reponse->intitule_rep}}</strong>
                    @if ($reponse->correct == 1) <i class="fas fa-check"></i> @elseif ($reponse->correct == 0)<i class="fas fa-times"></i> @endif
                </div>
            </div>

        </div>
    @endforeach

    <div class="text-center">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Retour</a>
            </div>
@endsection