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
<h2>Loacacao de Filme</h2><br><br><br><br>
<?php
include 'db.php';
?>
<hr><br>
<h4>Locação de um filme para um Locarario existente</h4> <br>
<form action="alugarV1.php" method="post" >
<fieldset><br>
<legend>Insira os dados</legend>
<fieldset> <br>
<input type="hidden" name="accao" value="">
    <input type="number" name="id_locacao" hidden="true" value="">
    <input type="numer" name="codigoF" value="" hidden="true">
    <input type="number" name="id_locatario" hidden="true" value="">
    <label for="locatrio">Locatários Existentes</label>
    <select name="id_locatario">
        <?php
        include 'db.php';
        $stm=$con->prepare("select * from locatario");
        $stm->execute();
        $locatarios=$stm->fetchAll(PDO::FETCH_OBJ);
        foreach ($locatarios as $locatario) 
        {
            $id_locatario=$locatario->id;
            echo"<option value=$id_locatario>$locatario->nome</option>";
        }
            ?>
          </select>
        </p>
      <label for="filme">Filmes disponiveis:</label><br>
      <select name="codigoF">
        <?php
          include 'db.php';
  $stmt=$con->prepare("Select * from filme");
  $stmt->execute();
  
  $filmes=$stmt->fetchAll(PDO::FETCH_OBJ);
  foreach ($filmes as $filme) {
    $codigoF=$filme->id;

        echo"<option value=$codigoF>$filme->titulo -- ||--  $filme->genero--  || --
        $filme->duracao</option>";}
             

        ?>
      </select>
    </p>
        <input type="date" id="data_locacao" hidden="true" name="data_locacao" value=""><br><br>
        <input type="date" id="data_devolucao" name="data_devolucao" hidden="true" value=" "><br><br>
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
<a class="inicial" href="index.php">Home</a>

<br><br><br>