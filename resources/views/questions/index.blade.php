@extends('layout')


@section('content')
    <div class="row">
            <div class=" col-md-5">
                <h2>Gestion des Questions</h2>
            </div>
            <div class="col-md-3"></div>
            <div class=" col-md-4">
                <a class="btn btn-success" href="{{ route('questions.create') }}"> Ajouter une question</a>
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
            <th>Niveau</th>
            <th>Type de choix</th>
            <th>Code</th>
            <th>Catégorie</th>
            <th width="23%" colspan="3" class="text-center action">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($questions as $question)
    <tr>
        <td>{{ $question->intitule_q}}</td>
        <td>{{ $question->niveau}}</td>
        <td> @if ($question->multi == 0) Unique @else Multiple @endif  </td>
        <td>{{ $question->code}}</td>
        <td>{{ $question->categorie->nom}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('questions.show',$question->id_q) }}">Voir</a>
            </td>
            <td>
            <a class="btn btn-primary" href="{{ route('questions.edit',$question->id_q) }}">Modifier</a>
            </td>
            <td>
            
            <form onsubmit="return confirm('Etes vous sûr de vouloir supprimer cette Question ?');" action="{{ route('questions.destroy',[$question->id_q]) }}"
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

    


    {!! $questions->links() !!}
    
@endsection