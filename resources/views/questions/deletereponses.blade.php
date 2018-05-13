@extends('layout') @section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Supprimer Réponses</h2>
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


      $( "#deletereponse" ).submit(function( event ) {
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

    
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="multi" class="col-sm-2 ">Type de choix</label>
        <div class="col-sm-5">
            <strong>
                @if($question->multi == 0) Unique @else Multiple @endif
            </strong>
        </div>
        <a  class="btn btn-success pull-right" href="{{ route('editreponses', ['id' => $question->id_q]) }}">Modifier les réponses</a>
    </div>

    <div class="alert alert-warning" id="errorunique" role="alert" style="display:none;" > <a href="#" class="close alert-close" aria-label="close">&times;</a>  <strong>Question à choix unique, Veuillez choisir une seule bonne réponse. </strong></div>
    <div class="alert alert-warning" id="errormulti" role="alert" style="display:none;" > <a href="#" class="close alert-close" aria-label="close">&times;</a>  <strong> Question à choix multiple, Veuillez choisir plusieurs bonnes réponses. </strong></div>


    <div class="table-responsive">  
                <table class="table table-borderless" id="dynamic_field">  
    @foreach($reponses as $index => $reponse)
                    <tr>
                        <td style="width:5%"> <label for="intitule_rep" class="col-sm-2">Intitulé</label> </td>
                        <td style="width:70%"> {{$reponse->intitule_rep}} </td>  
                        <td style="width:15%">
                        @if ($reponse->correct == 1) <i class="fas fa-check"></i> @elseif ($reponse->correct == 0)<i class="fas fa-times"></i> @endif    
                        </td>
                        <td>
                            <form id="#deletereponse" onsubmit="return confirm('Etes vous sûr de vouloir supprimer cette réponse ?');" action="{{ route('deletereponse',['id'=>$reponse->id_rep,'id_q'=>$reponse->id_q]) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button class="btn btn-danger" type="submit">Supprimer </button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach 
                </table>    
            </div>
       
                    
    
   
            <div class="text-center">
        <a class="btn btn-primary" href="{{ route('questions.index') }}"> Retour</a>
    </div>





@endsection