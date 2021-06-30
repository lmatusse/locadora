<style>
*
{
	margin:0;
	padding:0;
}
body{
		position:relative;
		background:#FFFAF0;
	}
	.icon
	{
		width:60px;
		height:60px;
	}
	form
	{
		
		position:relative;
		top:6%;
		background:(135,206,250);
		padding:10px;
    margin:1;
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
	input:focus
	{
		color: white;
		background:#00FA9A;
		
	}
	input[type=text]
	{
		height:30px;
    color: black;
	}
	h2
	{background:#A9A9A9;
		padding:7px;
    text-align:center;
	}
	button
	{
		padding:10px;
    color:white;
    background:black;
    border-radius: 5px;
	}
  h4
  {
    text-align:center;

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
</style>
<h1>Sistema de Gestao de Filmes</h1>
<div class="espaco">
<p></p>
</div>
<h2>Locação de Filme</h2><br><br><br><br>
<?php
include 'db.php';
?>
<p style="color: black;">Titulo : <?=$titulo?></p>
<p style="color: black;">Genero  : <?=$genero?></p>
<hr><br>
<h4>Locação de um filme para um novo locatário</h4> <br>
<form action="alugar.php" method="post" >
<fieldset><br>
<legend>Insira os dados</legend>
<fieldset> <br>
<input type="hidden" name="accao" value="<?=$accao?>">
    <input type="hidden" name="id_locacao" value="<?=$id_locacao?>">
    <input type="numer" name="codigoF" value="<?=$codigoF?>" hidden="true">
    <input type="number" name="id_locatario" hidden="true" value="<?=$id_locatario?>">
    <label name="nome">Nome:</label>
	<input type="text" id="nome" name="nome" placeholder="insira o nome completo" value="<?=$nome?>" required=""><br><br>
    <label name="morada">Morada:</label>
	<input type="text" id="morada" name="morada" placeholder="insira o sua morada" required="Preencha o campo" value="<?=$morada?>"><br><br>
    <label name="contactos">Contactos:</label>
	<input type="text" id="contactos" name="contactos" placeholder="insira seus contactos" required="Preencha o campo" value="<?=$contactos?>"><br><br>
    <label name="bi">Identidade:</label>
	<input type="text" id="bi" name="bi" placeholder="insira o seu numero de BI" value="<?=$bi?>" required="Preencha o campo"><br><br>
	<input type="date" id="data_locacao" hidden="true" name="data_locacao" value="<?=$data_locacao?>"><br><br>
    <input type="date" id="data_devolucao" name="data_devolucao" hidden="true" value="<?=$data_devolucao?> "><br><br>
  	<?php $estado="nao devolvido";?>
  	<input type="hidden" name="estado" value="<?=$estado;?>">
	</fieldset><br>
	<button type="submit">Emitir</button> &nbsp;
	<button type="reset">Limpar campos</button><br>
	<br>
    </fieldset>
<br>
</form>
<br><br>
<br><br>
<a  href="locatarioExis.php">Locatario Existente</a><br><br><br>
<a  href="index.php">Home</a>
<br><br><br><br><hr>


