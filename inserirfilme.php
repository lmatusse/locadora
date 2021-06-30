<?php
include "db.php";
		$titulo=$_POST['titulo'];
		$sinopse=$_POST['sinopse'];
		$elenco=$_POST['elenco'];
		$data=$_POST['data'];
		$genero=$_POST['genero'];
		$duracao=$_POST['duracao'];
		
		
		$stmt = $con->prepare('insert into filme (titulo, sinopse, elenco, data_lancamento, genero, duracao)
		 values (?,?, ?, ?,?,?)');
		$stmt->bindParam(1, $titulo);
		$stmt->bindParam(2, $sinopse);
		$stmt->bindParam(3, $elenco);
		$stmt->bindParam(4, $data);
		$stmt->bindParam(5, $genero);
		$stmt->bindParam(6, $duracao);



			if ($stmt->execute()) {
				header('Location: index.php');
			}
		
 ?>

 

    ?>