<!DOCTYPE html>
<html>
<head>
	<title>Ver Contactos</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
	<?php 

    if ($_GET["id_filme"]) 
    {
		include 'db.php';
        $stmt=$con->prepare('SELECT filme.titulo AS titulo,  filme.sinopse AS sinospe, elenco, data_lacamento, genero, duracao FROM filme, locacao WHERE filme.id=locacao.filme and filme.id=? ');
        $stmt->bindParam(1, $_GET['id_filme']);
        $stmt->execute();
        $filme=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <h3> Detalhes do Filme : <label><?php echo $filme[0]['id_filme'];?></label></h3>
    <table border="1" style="width: 800px ">
	 <tr><th>ID</th>
	 <th>ID</th>
         <th>Titulo</th>
         <th>Sinopse</th>
         <th>elenco</th>
         <th>Data do lacamento</th>
		 <th>Genero</th>
 		<th>Duracao</th>
 		<th>Estado</th>
 	</tr>

 	<?php 
 		foreach ($filmes as $film) {
 	?>
	<tr>
		<td><?php echo $film['codigoF']; ?></td>
		<td><?php echo $film['codigoL']; ?></td>
		<td><?php echo $film['titulo']; ?></td>
		<td><?php echo $film['genero']; ?></td>
		<td><?php echo $film['duracao']; ?></td>
		<td><?php echo $film['estado']; ?></td>
        <?php
	 }
	 ?>
</table>
