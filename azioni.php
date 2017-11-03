<?php
include_once 'include/db_connection.php';

if(isset($_POST['azione'])&& $_POST['azione']=='completa_profilo'){
    $id = $_POST['id'];
    completaProfilo($db,$id);
}else{
registrazione($db);
}



function registrazione($db) {
    $nome = $_POST['input_nome_utenti'];
    $cognome = $_POST['input_cognome_utenti'];
    $email = $_POST['input_email_utenti'];
    $telefono = $_POST['input_telefono_utenti'];
    $username = $_POST['input_username_utenti'];
    $password = $_POST['input_password_utenti'];
    $categoria = $_POST['categoria'];
    $data_registrazione_utente= date("Y,m,d");

    if ($categoria == "docenti") {
        $categoria = 2;
    } else if ($categoria == "utenti") {
        $categoria = 1;
    } else {
        $categoria =3;
    }

    $query = "INSERT INTO utenti                           
    (nome,cognome,email,username,passwd,telefono,id_categoria,data_registrazione_utente) 
    VALUES           
    (?, ?, ?, ?, ?, ?, ?, ?)";                                //VALORI TABELLA
    $bound = array($nome, $cognome, $email, $username, $password, $telefono, $categoria, $data_registrazione_utente);

    $stmt = $db->prepare ($query);
    $stmt->execute($bound);       //inserire $bound se c'è il $bound(array) altrimenti se non ho $bound va lasciato vuoto

    if ($stmt -> rowCount() == 1) {
    header("location: login_utenti.php?registrazione=completata");
    }
    else {
    echo 'errore';
    }

}

function completaProfilo($db, $id){
    $nome = $_POST['input_nome_utenti'];
    $cognome = $_POST['input_cognome_utenti'];
    $email = $_POST['input_email_utenti'];
    $telefono = $_POST['input_telefono_utenti'];
    $username = $_POST['input_username_utenti'];
    $password = $_POST['input_password_utenti'];
    $datanascita = $_POST['input_datanascita_utenti'];
    $luogonascita = $_POST['input_luogonascita_utenti'];
    $sesso = $_POST['input_sesso_utenti'];
    $indirizzo = $_POST['input_indirizzo_utenti'];
    $citta = $_POST['input_citta_utenti'];
    $provincia = $_POST['input_provincia_utenti'];
    $stato = $_POST['input_stato_utenti'];
    

    
    $query = "UPDATE utenti 
             SET nome = ?,
                    cognome = ?,
                    email = ?,
                    username = ?,
                    passwd = ?,
                    telefono = ?,
                    sesso = ?,
                    data_nascita = ?,
                    luogo_nascita = ?,
                    indirizzo = ?,
                    citta = ?,
                    provincia = ?,
                    stato = ?
                 WHERE numero_tessera = ?     
                 ";    
    $bound = array($nome, $cognome, $email, $username, $password, $telefono, $sesso, $datanascita, $luogonascita, $indirizzo, $citta, $provincia, $stato, $id);

    $stmt = $db->prepare ($query);
    $stmt->execute($bound);       //inserire $bound se c'è il $bound(array) altrimenti se non ho $bound va lasciato vuoto

    header("location: areariservata_utenti.php");
}
?>