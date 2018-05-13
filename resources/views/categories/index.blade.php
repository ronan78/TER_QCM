@extends('layout')


@section('content')
    <div class="row">
            <div class=" col-md-5">
                <h2>Gestion des Catégories</h2>
            </div>
            <div class="col-md-3"></div>
            <div class=" col-md-4">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Ajouter une catégorie</a>
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
            <th>Nom</th>
            <th>Intitulé</th>
            <th width="23%" colspan="3" class="text-center action">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($categories as $categorie)
    <tr>
        <td>{{ $categorie->nom}}</td>
        <td>{{ $categorie->intitule_c}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('categories.show',$categorie->id_cat) }}">Voir</a>
            </td>
            <td>
            <a class="btn btn-primary" href="{{ route('categories.edit',$categorie->id_cat) }}">Modifier</a>
            </td>
            <td>
            
            <form onsubmit="return confirm('Etes vous sûr de vouloir supprimer cette catégorie ?');" action="{{ route('categories.destroy',[$categorie->id_cat]) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE" />
                <button class="btn btn-danger" type="submit">Supprimer </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>

    


    {!! $categories->links() !!}
    
@endsection