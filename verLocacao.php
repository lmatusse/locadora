<!DOCTYPE html>
<html>
<head>
	<title>Ver Detalhes</title>
	<link rel="stylesheet" type="text/css" href="./css/estiloI.css"> 
	<style>
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
	}
	
	</style>
</head>
<body>
	<h1>Sistema de Gestao de Filmes</h1>
	<div class="espaco">
<p></p>
</div>
	<?php 
	include 'db.php';
	?>
	<?php
    if ($_GET) 
    {
		$id_locacao=$_GET["id_locacao"];
		$stmt=$con->prepare('SELECT lo.id as codigoL, f.titulo, f.sinopse, genero, duracao, estado, nome FROM filme f, locacao lo, locatario l WHERE f.id=lo.filme and lo.locatario=l.id and  lo.id =? ');
		$id_locacao=$_GET["id_locacao"];
		$stmt->bindParam(1,$id_locacao);
		$stmt->execute();
		$locacoes=$stmt->fetchAll();
		
	}
    ?>
   <h3> Detalhes da locacao : <label><?php echo $locacoes[0]['titulo'];?></label></h3><br><br><br><br><br><br>
    <table border="1" style="width: 95% ">
         <th>Titulo</th>
         <th>Sinopse</th>
		 <th>Genero</th>
 		<th>Duracao</th>
         <th>Estado</th>
         <th>Nome</th>
 	</tr>

 	<?php 
 		foreach ($locacoes as $locacao) {
 	?>
	<tr>
		
		<td><?php echo $locacao['titulo']; ?></td>
		<td><?php echo $locacao['sinopse']; ?></td>
		<td><?php echo $locacao['genero']; ?></td>
		<td><?php echo $locacao['duracao']; ?></td>
		<td><?php echo $locacao['estado']; ?></td>
		<td><?php echo $locacao['nome']; ?></td>
        <?php
	 }
	 	?>
</table><br><br>
<a href="principal.php">Ver todas Listas</a>&nbsp;
<a href="index.php">Pagina Inicial</a>