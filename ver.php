<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ver Detalhes</title>
	<link rel="stylesheet" type="text/css" href="./css/estiloI.css"> 
	<style>
		td
		{
			text-align: justify;
		}
		
		.espaco
		{
			background:#1C1C1C;
			padding: 20px;
		}
	
		a
		{
			text-decoration: none;
			border:2px solid white;
			background:black;
			color: white;
			padding:10px;
			border-radius:8px;
			font-weight:bold;
		}
		a:hover
	{
		color:black;
		background:#ebe8e8;
		
	}
	</style>
	</head>
	<body>
	<h1>Sistema de Gestao de Filmes</h1>
	<div class="espaco">																			
	</div>
	<?php 
		if ($_GET["id_filme"]) 
		{
			include 'db.php';
			$stmt=$con->prepare('SELECT  DISTINCT filme.id as codigo, filme.titulo AS titulo,  filme.sinopse AS sinopse, elenco, data_lancamento, genero, duracao, estado FROM filme, locacao, locatario WHERE filme.id=locacao.filme and locacao.locatario=locatario.id and filme.id=? ');
			$stmt->bindParam(1, $_GET['id_filme']);
			$stmt->execute();
			$filme=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}
    ?>
    <h3> Detalhes do Filme : <label><?php echo $filme[0]['titulo'];?></label></h3><br><br><br><br><br><br>
    <table border="1" style="width: 100% ">
        <th>Titulo</th>
        <th>Sinopse</th>
        <th>elenco</th>
        <th>Data do lancamento</th>
		<th>Genero</th>
 		<th>Duracao</th>
 		<th>Estado</th>
 	<?php 
		 foreach ($filme as $film) 
		 {
 	?>
		<tr>
		
			<td><?php echo $film['titulo']; ?></td>
			<td><?php echo $film['sinopse']; ?></td>
			<td><?php echo $film['elenco']; ?></td>
			<td><?php echo $film['data_lancamento']; ?></td>
			<td><?php echo $film['genero']; ?></td>
			<td><?php echo $film['duracao']; ?></td>
			<td><?php echo $film['estado']; ?></td>
    <?php
	 	}
	?>
	</table><br><br>
<a class="inic" href="index.php">Home</a>&nbsp;
<a class="inic" href="principal.php">Listas</a>
	</body>
	</html>