<?php

include_once 'include/db_connection.php';

include_once 'include/header.php';

$query = 'SELECT *
    FROM libro, casa_editrice
    WHERE casa_editrice.id_casaeditrice = libro.id_casaeditrice';

$stmt = $db->prepare($query);
$stmt->execute();


$libro = '';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $immagine = $row['immagine'];
    $titolo = $row['titolo'];
    $lingua = $row['lingua'];
    $annopubbl = $row['anno_pubblicazione'];
    $edizione = $row['edizione'];
    $isbn = $row['ISBN'];
    $casaeditrice = $row['denominazione'];
    $id_libro = $row['id_libro'];

    $query_autori = 'SELECT autore.nome, autore.cognome
    FROM autore, libro_autore, libro
    WHERE libro_autore.id_autore = autore.id_autore
    AND libro_autore.id_libro = libro.id_libro
    AND libro.id_libro = ?
    ';

    $bound_autori = array($id_libro);

    $stmt_autori = $db->prepare($query_autori);
    $stmt_autori->execute($bound_autori);

    $autori = "";
    $i=0;
    $num = $stmt_autori->rowCount();
    while($row_autori = $stmt_autori->fetch(PDO::FETCH_ASSOC)){
        $nomeautore = $row_autori['nome'];
        $cognomeautore = $row_autori['cognome'];

        
        
        $autori .= $nomeautore.' '.$cognomeautore.'';
        if($i<$num-1){
            $autori.=', ';
        }
        $i++;
    } 


    $query_disponibilita = 'SELECT *
        FROM prestiti, libro
        WHERE libro.id_libro = prestiti.id_libro
        AND prestiti.id_libro = ?
        AND data_consegna > ?';

    $bound_disponibilita = array($id_libro,date("Y,m,d"));

    $stmt_disponibilita = $db->prepare($query_disponibilita);
    $stmt_disponibilita->execute($bound_disponibilita);

    $row_disponibilita = $stmt_disponibilita->fetch(PDO::FETCH_ASSOC);

    $num = $stmt_disponibilita->rowCount();

    if($num>0){
        $disponibilita = 'LIBRO NON DISPONIBILE';
        $disp = false;
    }else{
        $disponibilita = 'LIBRO DISPONIBILE';
        $disp = true;
        }
    

    $libro .= '
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <img src="img/'.$immagine.'" alt="">
            <div class="caption">
                <h3>'.$titolo.'</h3>
                <p>scritto da: '.$autori.' </p>
                <p>casa editrice: '.$casaeditrice.'</p>
                <p>edizione: '.$edizione.'</p>
                <p>scritto in: '.$lingua.'</p>
                <p>pubblicato il: '.$annopubbl.'</p>
                <p class="disp">'.$disponibilita.'</p>
                <a href="#" id="mostraprofilo" class="btn btn-primary" role="button">dettaglio</a> ';
                if($disp == true){
                   $libro .= '<a href="#" class="affitta btn btn-default" role="button">Affitta</a>
                   
                                </div>
                                </div>
                            </div>
                            ';
                }else{
                    $libro .= '
                                </div>
                                </div>
                            </div>
                            ';
                }
                


                
    
   

}


?>




<!-- disegna pannello -->
<div class="row">
    <div class="col-md-4">
        <h1> Catalogo </h1>
        <div class="row">
        <?php echo $libro ?>
        </div>
    </div>
</div>


<?php
include_once 'include/footer.php';
?>

<script>
$(document).ready(function(){

    var tessera = localStorage.getItem('tessera');
    if(tessera==null){
        $('.affitta').hide();
    }else{
        $('.affitta').show();
    }
});


</script>