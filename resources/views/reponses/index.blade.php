@extends('layout')


@section('content')
    <div class="row">
            <div class=" col-md-5">
                <h2>Gestion des Réponses</h2>
            </div>
            <div class="col-md-3"></div>
            <div class=" col-md-4">
                <a class="btn btn-success" href="{{ route('reponses.create') }}"> Ajouter une réponse</a>
            </div>
       
    </div>
    <br>

    @if ((session('message')))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ (session('message')) }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
        </div>
    @endif

    <div class="table-responsive">
    <table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Intitulé</th>
            <th>Correct</th>
            <th>Intitulé de la question</th>
            <th width="23%" colspan="3" class="text-center action">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($reponses as $reponse)
    <tr>
        <td>{{ $reponse->intitulé_rep}}</td>
        <td>{{ $reponse->correct}}</td>
        <td>{{ $reponse->question->intitule_q }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('reponses.show',$reponse->id_rep) }}">Voir</a>
            </td>
            <td>
            <a class="btn btn-primary" href="{{ route('reponses.edit',$reponse->id_rep) }}">Modifier</a>
            </td>
            <td>
            
            <form onsubmit="return confirm('Etes vous sûr de vouloir supprimer cette Réponse ?');" action="{{ route('reponses.destroy',[$reponse->id_rep]) }}"
                        method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button class="btn btn-danger" type="submit">
                            Supprimer
                        </button>
                    </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>

    


    {!! $reponses->links() !!}
    
@endsection