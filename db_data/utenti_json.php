<?php

include_once '../include/db_connection.php';



$JSON = json_decode(file_get_contents('php://input'),true);
$tessera = $JSON['tessera'];


$query = "SELECT * FROM utenti
          WHERE utenti.numero_tessera = ?";
$bound = array($tessera);

$stmt = $db -> prepare($query);            //preparazione riga sql
$stmt -> execute($bound);

$num = $stmt -> rowCount();    

$row = $stmt->fetch(PDO::FETCH_ASSOC);               
    


$utente = array(
    'tessera' => $row['numero_tessera'],
    'nome' => $row['nome'],
    'cognome' => $row['cognome'],
    'telefono' => $row['telefono'],
    'email' => $row['email'],
    'data_registrazione_utenete' => $row['data_registrazione_utente'],
    'data_nascita' => $row['data_nascita'],
    'luogo_nascita' => $row['luogo_nascita'],
    'sesso' => $row['sesso'],
    'indirizzo' => $row['indirizzo'],
    'citta' => $row['citta'],
    'provincia' => $row['provincia'],
    'stato' => $row['stato'],
    'id_categoria' => $row['id_categoria'],
    'username' => $row['username'],
    'passwd' => $row['passwd']
);

    header('Content-Type: application/x-json');
    echo json_encode($utente);


//abbiamo creato un file json che sarà a disposizione di tutti i front-end per recuperare i dati e presentali come vuole
// $utenti = array();
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {                
    
//     $numero_tessera = $row['numero_tessera'];
//     $nome = $row['nome'];
//     $cognome = $row['cognome'];
//     $telefono = $row['telefono'];
//     $email = $row['email'];
//     $data_registrazione_utenete = $row['data_registrazione_utente'];
//     $data_nascita = $row['data_nascita'];
//     $luogo_nascita = $row['luogo_nascita'];
//     $sesso = $row['sesso'];
//     $indirizzo = $row['indirizzo'];
//     $citta = $row['citta'];
//     $provincia = $row['provincia'];
//     $stato = $row['stato'];
//     $id_categoria = $row['id_categoria'];
//     $username = $row['username'];
//     $passwd = $row['passwd'];


//    $utente = array();
   
//    $utente['numero_tessera'] = $numero_tessera;
//    $utente['nome'] = $nome ;
//    $utente['cognome'] = $cognome ;
//    $utente['telefono'] = $telefono ;
//    $utente['email'] = $email ;
//    $utente['data_registrazione_utente'] = $data_registrazione_utenete ;
//    $utente['data_nascita'] = $data_nascita ;
//    $utente['luogo_nascita'] = $luogo_nascita ;
//    $utente['sesso'] = $sesso;
//    $utente['indirizzo'] = $indirizzo ;
//    $utente['provincia'] = $provincia;
//    $utente['stato'] = $stato;
//    $utente['id_categoria'] = $id_categoria;
//    $utente['username'] = $username;
//    $utente['passwd'] = $passwd;

//    array_push($utenti, $utente);
// }

// header('Content-Type: application/x-json');
// echo json_encode($utenti);
// exit;

?>