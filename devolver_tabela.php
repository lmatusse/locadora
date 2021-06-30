
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Bem vindo ao Sistema</title>
    <link rel="stylesheet" type="text/css" href="./css/estiloI.css">
    <style>
        td
		{
			text-align: center;
		}
	.espaco
	{
		background:#1C1C1C;
		padding: 20px;
	}
	table{
		top:1%;
	}
	h4
	{
		text-align:center;
	}
	.home
    {
        text-decoration: none;
        border:2px solid white;
        background:black;
        color: white;
        padding:6px;
		border-radius:8px;
		float:left;
		font-weight:bold;
	}
	.home:hover
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
    <h3>Filmes não devolvidos</h3>
    <br><br><br>
	<h4>Filmes não Devolvidos e os seus respectivos Locatarios</h4><hr><br><br><br>
<?php
include 'db.php';

	$stmt=$con->prepare('SELECT distinct locacao.filme ,filme.id as 
	codigoF, locacao.id as id_locacao, nome, filme.titulo, filme.genero, estado
	 FROM filme, locacao, locatario WHERE filme.id=filme and locatario.id= locatario
	  and estado like "nao devolvido" ');
	
	$stmt->execute(); 
	$filmes = $stmt->fetchAll();
?>

	<table border="1" style="width: 1000px ">
		<th>Nome</th>
 		<th>Titulo</th>
		 <th>Genero</th>
		 <th>Estado</th>
 		<th>Operacoes</th>

<?php 
 		foreach ($filmes as $film) {
?>
	<tr>
		<td><?php echo $film['nome']; ?></td>
		<td><?php echo $film['titulo']; ?></td>
		<td><?php echo $film['genero']; ?></td>
		<td><?php echo $film['estado']; ?></td>
		
		<td>
			<a  href="ver.php?id_filme=<?php echo $film['codigoF']; ?>"><img class="icon" src="./icons/see.png" class="action-button" title="Ver Filme"></a>&nbsp;  &nbsp;
			<a href="devolverFilme.php?id_locacao=<?php echo $film['id_locacao'];?>"><img class="icon" class="action-button" src="./icons/edit.png" title="Devolver filme"></a>&nbsp;  &nbsp;
		</td>
	</tr>
	
	<?php
		}
	?>
	</table>
<br><br><br><br><br>
	</body>
</html>