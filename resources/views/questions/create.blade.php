@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ajouter une Question</h2>
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

<form id="questionform" method="post" action="{{action('QuestionController@store')}}">
    {{csrf_field()}}
    <div class="form-group row">
        <label for="intitule_q" class="col-sm-2 col-form-label">Intitulé</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="intitule_q" required>
        </div>

    </div>
    <div class="form-group row">
        <label for="niveau" class="col-sm-2 col-form-label">Niveau</label>
        <div class="col-sm-10">
        <select id="niveau" name="niveau" class="form-control" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        </div>

    </div>

    <div class="form-group row">
        <label for="multi" class="col-sm-2 col-form-label">Type de choix</label>
        <div class="col-sm-10">
            <label class="radio-inline col-form-label"> <input id="multi" type="radio" name="multi" value="0" required> Unique</label>
            <label class="radio-inline col-form-label"> <input id="multi" type="radio" name="multi" value="1" required> Multiple</label>
        </div>

    </div>

    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Code</label>
        <div class="col-sm-10">
            <textarea rows="4" cols="50" class="form-control" name="code" >
            </textarea>
        </div>

    </div>

    <div class="form-group row">
    <label for="id_cat" class="col-sm-2 col-form-label">Catégorie</label>
        <div class="col-sm-10">
        <select id="id_cat" name="id_cat" class="form-control" required>
            @foreach($categories as $categorie)
                <option value="{{$categorie->id_cat}}">{{$categorie->nom}}</option>
            @endforeach
        </select>
        </div>

    </div>
    <br>
 
    <h3>Réponses</h3>
    <div class="alert alert-warning" id="errorunique" role="alert" style="display:none;" > <a href="#" class="close alert-close" aria-label="close">&times;</a>  <strong>Question à choix unique, Veuillez choisir une seule bonne réponse. </strong></div>
    <div class="alert alert-warning" id="errormulti" role="alert" style="display:none;" > <a href="#" class="close alert-close" aria-label="close">&times;</a>  <strong> Question à choix multiple, Veuillez choisir plusieurs bonnes réponses. </strong></div>
    <script src="/js/jquery.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=0;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td style="width:75%"><input type="text" name="reponses[]" placeholder="Entrer une réponse" class="form-control name_list" required /></td> <td style="width:15%"> <label class="radio-inline col-form-label"> <input required type="radio" name="correct['+i+']" value="1" /> <i class="fas fa-check"></i> </label> <label class="radio-inline col-form-label"> <input type="radio" name="correct['+i+']" value="0" /> <i class="fas fa-times"></i> </label> </td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

      $( "#questionform" ).submit(function( event ) {
        event.preventDefault();
        var multi = $("#multi:checked").val();
        var correct = [];
        
        //var correct = $('input[name="correct[0]"]:checked').val();
        console.log(multi);

        for (var j =0; j<i+1 ; j++){
            correct.push($('input[name="correct['+j+']"]:checked').val());
        }

         var nombretrue = jQuery.grep(correct, function (n, z) {
            return (n == 1);
            
        });

        

        if(multi == 0 && nombretrue.length > 1){
            console.log("choix unique error");
            $('#errormulti').hide();
            $('#errorunique').show();
        }
        else if (multi == 0 && nombretrue.length == 0){
            console.log("choix unique error");
            $('#errormulti').hide();
            $('#errorunique').show();
        }  
        else if (multi == 1 && nombretrue.length < 2){
            console.log("choix multi error");
            $('#errorunique').hide();
            $('#errormulti').show();
        } else {
            this.submit();
        }
        console.log(correct);
        console.log(nombretrue.length);
});

    $(function() {
   $(document).on('click', '.alert-close', function() {
       $(this).parent().hide();
   })
});

    });

    

    
</script>


<div class="reponse"> 
    <div class="form-group">


            <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="table-responsive">  
                <table class="table table-borderless" id="dynamic_field">  
                    <tr>  
                        <td style="width:75%"><input type="text" name="reponses[]" placeholder="Entrer une réponse" class="form-control name_list" /></td>  
                        <td style="width:15%">
                            <label class="radio-inline col-form-label"> <input required type="radio" name="correct[0]" value="1" /> <i class="fas fa-check"></i> </label>
                            <label class="radio-inline col-form-label"> <input type="radio" name="correct[0]" value="0" /> <i class="fas fa-times"></i> </label> 
                        </td>
                        <td style="width:10%"><button type="button" name="add" id="add" class="btn btn-success">Ajouter un champ  </button></td>  
                    </tr>  
                </table>    
            </div>

 
    </div> 
</div>



    


    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="margin-left:38px">Ajouter</button>
        &nbsp
        <a class="btn btn-secondary" href="{{ route('questions.index') }}"> Annuler</a>
    </div>

</form>





@endsection