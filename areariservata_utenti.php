<?php
include_once 'include/header.php';
?>

<div class="row">
    <div class="col-md-6">

        <!-- disegna pannello -->
        <h1> </h1>
        <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="thumbnail">
            <img src="" alt="...">
            <div class="caption">
                <h3> </h3>
                <p></p>
                <a href="#" id="mostraprofilo" class="btn btn-primary" role="button">modifica profilo</a> <a href="#" class="btn btn-default" role="button">Button</a>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- form profilo completo -->
    <div class="col-md-6 col-sm-12">
        <form id="profilo_completo" class="form-horizontal" method="post" action="azioni.php">
        
        <input type="hidden" name="azione" value='completa_profilo'>
        <input id="idnascosto" type="hidden" name="id">
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
                <label for="input_datanascita_utenti" class="col-sm-2 control-label">Data di nascita</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_datanascita_utenti" name="input_datanascita_utenti" value="" placeholder="data di nascita">
                </div>
            </div>
            <div class="form-group">
                <label for="input_luogonascita_utenti" class="col-sm-2 control-label">Luogo di nascita</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_luogonascita_utenti" name="input_luogonascita_utenti" value="" placeholder="Luogo di nascita">
                </div>
            </div>
            <div class="form-group">
                <label for="input_sesso_utenti" class="col-sm-2 control-label">Sesso</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_sesso_utenti" name="input_sesso_utenti" value="" placeholder="sesso">
                </div>
            </div>
            <div class="form-group">
                <label for="input_indirizzo_utenti" class="col-sm-2 control-label">Indirizzo</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_indirizzo_utenti" name="input_indirizzo_utenti" value="" placeholder="Indirizzo">
                </div>
            </div>
            <div class="form-group">
                <label for="input_citta_utenti" class="col-sm-2 control-label">Città</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_citta_utenti" name="input_citta_utenti" value="" placeholder="Città">
                </div>
            </div>
            <div class="form-group">
                <label for="input_provincia_utenti" class="col-sm-2 control-label">Provincia</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_provincia_utenti" name="input_provincia_utenti" value="" placeholder="provincia">
                </div>
            </div>
            <div class="form-group">
                <label for="input_stato_utenti" class="col-sm-2 control-label">Stato</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_stato_utenti" name="input_stato_utenti" value="" placeholder="Stato">
                </div>
            </div>

            <div class="form-group" style="text-align:center">
                <div class="col-sm-offset-2 col-sm-10">
                <button id="salvamodifiche" style="background-color: royalblue; color:white" type="submit" class="btn btn-default">salva modifiche</button>
                </div>
            </div>
        </form>
    </div>





<?php
include_once 'include/footer.php';
?>


<script>

//recupera id dal localStorage
var tessera = localStorage.getItem("tessera");
console.log(tessera);

if(tessera == null){
    location.href="login.php";
}else{
    // mandare sempre chiave valore!!!
    var data = {
        tessera : tessera
    };

    var url ="http://localhost:8888/biblioteca/db_data/utenti_json.php";
    jQuery.ajax({
        url: url,
        type: "POST",
        data: JSON.stringify(data),
        processData: false,
        contentType: "application/json; charset=UTF-8",
        success: function(utente){
            $('h1').text(`Area riservata di ${utente.nome}`);
            $('h3').text(utente.nome);
            $('p').html(`
            ${utente.nome}  <br>
            ${utente.cognome}  <br>
            ${utente.email}  <br>
            ${utente.telefono}  <br>
            `);
            // modifica profilo 
            $('#profilo_completo #input_nome_utenti').val(`${utente.nome}`);
            $('#profilo_completo #input_cognome_utenti').val(`${utente.cognome}`);
            $('#profilo_completo #input_telefono_utenti').val(`${utente.telefono}`);
            $('#profilo_completo #input_email_utenti').val(`${utente.email}`);
            $('#profilo_completo #input_username_utenti').val(`${utente.username}`);
            $('#profilo_completo #input_password_utenti').val(`${utente.password}`);
            $('#profilo_completo #input_datanascita_utenti').val(`${utente.data_nascita}`);
            $('#profilo_completo #input_luogonascita_utenti').val(`${utente.luogo_nascita}`);
            $('#profilo_completo #input_sesso_utenti').val(`${utente.sesso}`);
            $('#profilo_completo #input_indirizzo_utenti').val(`${utente.indirizzo}`);
            $('#profilo_completo #input_citta_utenti').val(`${utente.citta}`);
            $('#profilo_completo #input_provincia_utenti').val(`${utente.provincia}`);
            $('#profilo_completo #input_stato_utenti').val(`${utente.stato}`);
            
            // passiammo id hidden alla form
            console.log('leggo prima di id nascosto'+tessera)
            $('#idnascosto').attr('value',tessera);
           

            // // slide-down modifca profilo
            $('#profilo_completo').hide();
            $('#mostraprofilo').on('click', function(){
                $('#profilo_completo').toggle();
            });
            
            $('#salvamodifiche').on('click', function(){
                $('#profilo_completo').hide();
            });
            
            
        },
        error: function (err) {
            console.log(err);
            
        }
    });
    
}


    




</script>

