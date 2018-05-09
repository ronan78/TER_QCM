


<script type="text/javascript">
        $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(' <div class="col-sm-10"> <input type="text" name="reponses[]" class="form-control"><a href="#" class="remove_field col-sm-2">Supprimer</a></div>'); //add input box
        }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove() ; x--;
        })
        });
    </script>


    <button class="add_field_button">Ajouter une réponse</button>
    <div class="input_fields_wrap">
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="text" name="reponses[]" class="form-control">
            </div>
        </div>
    </div>