<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom:</strong>
            {!! Form::text('nom', null, array('placeholder' => 'Nom de la catégorie','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Intitulé de la catégorie:</strong>
            {!! Form::text('intitule_c', null, array('placeholder' => 'Intitulé de la catégorie (optionnel)','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Valider</button>
            &nbsp
                <a class="btn btn-secondary" href="{{ route('categories.index') }}"> Annuler</a>
           
    </div>
    
</div>