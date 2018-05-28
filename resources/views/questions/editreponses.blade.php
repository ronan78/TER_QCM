@extends('layout') @section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier Réponses</h2>
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
<script src="/js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i={{$reponses->count()}}-1;  
      console.log(i);


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td style="width:5%"> <label class="col-sm-2 col-form-label"> Intitulé </label> </td><td style="width:70%"><input type="text" required name="intitule_rep[]" placeholder="Entrer une réponse" class="form-control name_list" /></td> <td>  <input required type="radio" name="correct['+i+']" value="1" /> <i class="fas fa-check"></i>  <label class="radio-inline col-form-label"> <input type="radio" name="correct['+i+']" value="0" /> <i class="fas fa-times"></i> </label> </td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

      $( "#updatereponses" ).submit(function( event ) {
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
        } else if (multi == 0 && nombretrue.length == 0){
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

<form id="updatereponses" method="post" action="{{action('ReponseController@update', $id)}}">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
    


    <div class="form-group row">
        <label for="multi" class="col-sm-2 col-form-label">Type de choix</label>
        <div class="col-sm-7">
            <label class="radio-inline col-form-label">
                <input id="multi" type="radio" @if($question->multi == 0)checked @endif name="multi" value="0" required> Unique
            </label>
            <label class="radio-inline col-form-label">
                <input id="multi" type="radio" @if($question->multi == 1)checked @endif name="multi" value="1" required> Multiple
            </label>
        </div>
        <button type="button" name="add" id="add" class="btn btn-success pull-right">Ajouter un champ  </button>
    </div>

    <div class="alert alert-warning" id="errorunique" role="alert" style="display:none;" > <a href="#" class="close alert-close" aria-label="close">&times;</a>  <strong>Question à choix unique, Veuillez choisir une seule bonne réponse. </strong></div>
    <div class="alert alert-warning" id="errormulti" role="alert" style="display:none;" > <a href="#" class="close alert-close" aria-label="close">&times;</a>  <strong> Question à choix multiple, Veuillez choisir plusieurs bonnes réponses. </strong></div>


    <div class="table-responsive">  
                <table class="table table-borderless" id="dynamic_field">  
                    @foreach($reponses as $index => $reponse)
                        <tr>
                            <input type="hidden" name="id_rep[]" value="{{$reponse->id_rep}}">
                            <td style="width:5%"> <label for="intitule_rep" class="col-sm-2 col-form-label">Intitulé</label> </td>
                            <td style="width:70%"> <input type="text" class="form-control" value="{{$reponse->intitule_rep}}" name="intitule_rep[]"  required> </td>  
                            <td style="width:15%">
                                <label class="radio-inline col-form-label"> <input type="radio" @if($reponse->correct == 1) checked @endif name="correct[{{$index}}]" value="1" /> <i class="fas fa-check"></i> </label>
                                <label class="radio-inline col-form-label"> <input type="radio" @if($reponse->correct == 0) checked @endif name="correct[{{$index}}]" value="0" /> <i class="fas fa-times"></i> </label> 
                            </td>
                            <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>
                        </tr> 
                    @endforeach 
                </table>    
            </div>
       
                    
    
   
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary" style="margin-left:38px">Mettre à jour</button>
        &nbsp
        <a class="btn btn-secondary" href="{{ route('questions.index') }}"> Annuler</a>
    </div>

</form>





@endsection