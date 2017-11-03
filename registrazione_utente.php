<?php

include_once 'include/db_connection.php';

include_once 'include/header.php';

?>

<h2>Registrazione nuovo utente</h2>
<form id="registrazione" class="form-horizontal" method="post" action="azioni.php">
    <div class="form-group">
        <label for="input_nome_utenti" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="input_nome_utenti" name="input_nome_utenti" placeholder="nome">
        </div>
    </div>
    <div class="form-group">
        <label for="input_cognome_utenti" class="col-sm-2 control-label">Cognome</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="input_cognome_utenti" name="input_cognome_utenti" value="" placeholder="cognome">
        </div>
    </div>
    <div class="form-group">
        <label for="input_email_utenti" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="input_email_utenti" name="input_email_utenti" value="" placeholder="email">
        </div>
    </div>
    <div class="form-group">
        <label for="input_telefono_utenti" class="col-sm-2 control-label">Telefono</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="input_telefono_utenti" name="input_telefono_utenti" value="" placeholder="numero di telefono">
        </div>
    </div>
    <div class="form-group">
        <label for="input_username_utenti" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="input_username_utenti" name="input_username_utenti" value="" placeholder="username">
        </div>
    </div>
    <div class="form-group">
        <label for="input_password_utenti" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="input_password_utenti" name="input_password_utenti" value="" placeholder="password">
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Categoria</label>
        <div class="col-sm-10">
        <label class="radio-inline">
            <input type="radio" name="categoria" id="categoria_studente" value="studente"> Studente
            </label>
            <label class="radio-inline">
                <input type="radio" name="categoria" id="categoria_docente" value="docente"> Docente
            </label>
            <label class="radio-inline">
                <input type="radio" name="categoria" id="categoria_altro" value="altro" checked>  Altro
            </label>
        </div>
    </div>
    <div class="form-group" style="text-align:center">
        <div class="col-sm-offset-2 col-sm-10">
        <button style="background-color: royalblue; color:white" type="submit" class="btn btn-default">Registrati</button>
        </div>
    </div>
</form>


<?php

include_once 'include/footer.php';

?>

<script>

$(document).ready(function() {
            $("#registrazione").on("submit", function(event) {
                event.preventDefault();
                var nome = jQuery("input[name='input_nome_utenti']").val();
                var cognome = jQuery("input[name='input_cognome_utenti']").val();
                var telefono = jQuery("input[name='input_telefono_utenti']").val();
                var email = jQuery("input[name='input_email_utenti']").val();
                var username = jQuery("input[name='input_username_utenti']").val();
                var password = jQuery("input[name='input_password_utenti']").val();
                var categoria = $('input[name=categoria]:checked').val();
                console.log(categoria);
               if (nome == "" || cognome == "" || telefono == "" || email == "" || username == "" || password =="") {
                    alert("Inserisci tutti i dati");
                
               }
                else {
                    jQuery(this).off("submit").submit();            //disabilita il submit (contrario di on) altrimenti avrebbe rifatto la proc.
                }
            });
        });

</script>