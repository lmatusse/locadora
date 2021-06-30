
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Bem vindo ao Sistema</title>
    <link rel="stylesheet" type="text/css" href="./css/estiloF.css">
    <style>
		form
    {
        font-weight: bold;

    }
    .butao
	{
		padding:10px;
    color:white;
    background:black;
    border-radius: 5px;
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
	<h3>Cadastro de Filme</h3>
	<br><br><br><br><br>
	<form method="post" action="inserirfilme.php" enctype="multipart/form-data">	
		<fieldset><br>
			<legend>Insira os dados correspondentes</legend><br>
			<label for="titulo">Titulo: </label>
			<input type="text"  name="titulo" id="titulo" rows="5" style="width: 400px;"><br><br>
			<p>
				<label for="sino">Sinopse</label>	</p>
				<textarea name="sinopse" id="sinopse" rows="5"  style="width: 500px;">			
				</textarea>
			</p>
			<br>
			<p>			
				<label for="ele">Elenco</label></p>
				<textarea name="elenco" id="elenco" rows="5"  style="width: 500px;">			
				</textarea>
			</p>
			<br>
			<p>	
				<label for="data">Data de Lancamento:</label>
				<input type="date" style="width: 400px" name="data" id="data"><br><br>
			</p>
			<br>
			<p>	
				<label>Genero</label>
				<select name="genero" style="width: 400px">
				<?php 
					$options= array('accao','aventura','comedia','documentario','faroeste','fantasia','guerra','thriller'
					,'romance','animacao','crime','drama','sci-fi');
						foreach ($options as $g)
						{
							if ($tipo==$g)
							{
								$selected='selected';
							}
							else
							{
								$selected='';
							}
							echo "<option ".$selected.">".$g."</option>";
						}
				?>
				</select>
			</p>
			<br>
			<p>
				<label for="duracao">Duracao</label>
				<input type="number" name="duracao">
			</p><br>
		<input type="submit" class="butao" value="Gravar"><br>
		</fieldset>
	</form>
	<br>
	<a class="inicial" href="index.php">Home</a>
	<br><br>
	</body>
</html>