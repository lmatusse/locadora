<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Bem vindo ao Sistema</title>
    <link rel="stylesheet" type="text/css" href="./css/estiloI.css">
    <style type="text/css">
	*
	{
		margin:0;
		padding:0;
	}
	
	
	input:focus
	{
		color:white;
		background:green;
	}
	table
	{
		text-align: center;
		position:relative;
		top:10%;
		margin:auto;/*centraliza tabela*/
		
		
	}
	body{
		text-align:center;
	}
	
	h1
	{
		font-family:sans-serif;
		text-align: center;
		color:white;
        font-family: verdana ;
        font-size: 25px;
        background-color: black;
        padding: 10px;
	}	
	.espaco
	{
		background:#1C1C1C;
		padding: 20px;
	}
	
	body
	{
		background:#D3D3D3;
	}
	h2
	{
		background:#A9A9A9;
		padding:7px;
		
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
    </div>
    <h2> Filmes por Ator</h2><br><br><br>
    <form method="get" action="filme_ator.php">
        <label for="nome">Nome:</label>
        <input type="text" name="elenco" id="elenco">
        <input type="submit" value="Procurar">
    </form>
                <br><br><br><br>
    <?php
   
    if($_GET)
    {
        include 'db.php';
        $elenco=$_GET['elenco'];
		$stmt=$con->prepare('SELECT  filme.id as codigoF, filme.titulo, 
		filme.genero, filme.duracao, elenco FROM filme where elenco LIKE ?');
		$stmt->bindParam(1,$elenco);
		$elenco='%'.$elenco.'%';
		$stmt->execute();
		$filmes=$stmt->fetchAll();

	?>

<h3> Nome : <label><?php echo $filme=$_GET["elenco"];?></label></h3><br><br><br>
<table border="1" style="width: 800px ">
    <th>Titulo</th>
    <th>Genero</th>
    <th>Duracao</th>
    
<?php 
foreach ($filmes as $film) 
{
?>
<tr>
    <td><?php echo $film['titulo']; ?></td>
    <td><?php echo $film['genero']; ?></td>
    <td><?php echo $film['duracao']; ?></td>

        
<?php
}
?>
</table><br><br> <br><br><br> <br>
<a href="index.php">Home</a>
</body>
<?php  
} 
?>
