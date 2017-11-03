<?php

include_once 'include/db_connection.php';

// echo "aiuto";


$JSON = json_decode(file_get_contents('php://input'),true);


$username = $JSON['username'];
$password = $JSON['password'];
// echo $username;
// $username= "ciao";
// $password= "pippo";

$query = "SELECT utenti.username, utenti.passwd, utenti.nome, utenti.cognome, utenti.numero_tessera
    FROM utenti
    WHERE utenti.username = ?
    OR utenti.passwd = ?";
$bound = array($username, $password);

$stmt = $db -> prepare($query);            //preparazione riga sql
$stmt -> execute($bound);

$num = $stmt -> rowCount(); 
$i=0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

$nome = $row['nome'];
$cognome = $row['cognome'];
$tessera = $row['numero_tessera'];
$username_db = $row['username'];
$password_db = $row['passwd'];


$record[$i] = array(
                     'username' => $username_db ,
                     'password' => $password_db,
                     'nome' => $nome,
                     'cognome' => $cognome,
                     'tessera' => $tessera);
$i++;

}
// print_r($record);
if($num > 0){
        $response = $record;
}else{
    $response = array('esito' => false);
}
// print_r($response);


// header('Content-Type: application/x-json'); //se fai header non puoi mandare ad output niente prima (eliminare tutti i echo)
echo json_encode($response);

?>




