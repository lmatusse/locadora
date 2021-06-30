<?php
include 'db.php';
$accao='adicionar';
$codigo=$_GET['id_filme'];
    $stmt=$con->prepare('SELECT filme.id as codigoF , filme.titulo, filme.genero as genero, filme.duracao
	FROM filme where id=?');
     $stmt->bindParam(1, $codigo);
     $stmt->execute();
    $filmes=$stmt->fetch(PDO::FETCH_ASSOC);
    $id_locacao="";
    $locatario="";
    $data_locacao="";
    $data_devolucao="";
    $nome="";
    $morada="";
    $contactos="";
    $bi="";
   $estado="nao devolvido";
    $codigoF=$filmes['codigoF'];
    $titulo=$filmes['titulo'];
    $genero=$filmes['genero'];
	include 'form.php';

?>