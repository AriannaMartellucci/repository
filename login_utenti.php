<?php

include_once 'include/header.php';

?>

<main>
        <!-- cerca libro -->
        <h2>Entra nella tua area riservata</h2>
        <h4>
            <?php if(isset($_GET['registrazione']) && $_GET['registrazione'] =="completata") {
        echo 'Registrazione completata. <br/> Inserire nome utente e password';
    };
    ?></h4><br/><br/>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="input_username_utenti" class="col-sm-2 control-label">Username</label><span id="username_errata"></span>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="input_username_utenti" name="input_username_utenti" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label><span id="password_errata"></span>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="input_password_utenti" name="input_password_utenti" value="" placeholder="Password">
                </div>
            </div>
            <div style="text-align:center">
                <a href="#"><p>Password dimenticata?</p></a>
                <a href="registrazione_utente.php"><p>Non sei ancora registrato?</p></a>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">cerca</button>
                </div>
            </div>
        </form>

        <aside>

        </aside>

        <article>
            <section>

            </section>
        </article>
    </main>

    <?php

    include_once 'include/footer.php';


   

    ?>
<script>
    $('form').on('submit',function(event){
        event.preventDefault();

        var username_utente = $('#input_username_utenti').val();
        var password_utente = $('#input_password_utenti').val();

        var data = {
            username: username_utente,
            password: password_utente
    };


    var url ="http://localhost:8888/biblioteca/check_utenti.php";
    $.ajax({
        url: url,
        type: "POST",
        data: JSON.stringify(data),
        processData: false,
        contentType: "application/json; charset=UTF-8",
        success: function(res){
            var utenti = JSON.parse(res);
            console.log(utenti);
    
            $.each(utenti, function (index, utente) {
               if(utente.username == username_utente && utente.password == password_utente){
                
                    localStorage.setItem('username', utente.username);
                    localStorage.setItem('nome', utente.nome);
                    localStorage.setItem('cognome', utente.cognome);
                    localStorage.setItem('tessera', utente.tessera);
                        
                    location.href='areariservata_utenti.php';
               }else if(utente.username == username_utente && utente.password != password_utente){
                    $('#password_errata').text('password errata');
                    $('#username_errata').text('');
               } else if(utente.username != username_utente && utente.password == password_utente){
                    $('#username_errata').text('username errata');
                    $('#password_errata').text('');
               } else if(utente.username != username_utente && utente.password != password_utente){
                    $('#username_errata').text('username errata');
                    $('#password_errata').text('password errata');
               }
            
            });


        },
        error: function (err) {
            console.log(err);
            
        }
    });
    })
    

</script>