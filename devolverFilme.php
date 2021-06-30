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
    form
    {
        float:left;
        text-align:left;
        
        width:100%;
        padding:10px;
        margin:10px;
        
    }
    button
	{
		padding:10px;
    color:white;
    background:black;
    border-radius: 5px;
	}
    .impressao
    {
        font-weight: bold;
    }
    legend
    {
        font-weight: bold;

    }
    fieldset
    {
        border:2px solid;
    }
    </style>
    </head>
    <body>
    <h1>Sistema de Gestao de Filmes</h1>
    <div class="espaco">
    </div>
    <h3>Devolução de Filmes</h3>
    <br><br><br>
    <br><br><br>
	
<?php 
    if ($_GET) {
    include 'db.php';
    $id_locacao=$_GET['id_locacao'];
    $locacoees = $con ->query("select lo.id as id_locacao, l.id as id_locatario, f.id as codigoF, l.nome,
    f.titulo, estado, titulo from filme f, locacao lo, locatario l where f.id=lo.filme and lo.locatario=l.id and 
    lo.id=$id_locacao")->fetchAll();
?>
<?php 
    foreach($locacoees as $locacao){
?>
        
    <form method="post" action="devolver.php">
        <fieldset><legend>Dados da Devolução</legend>
            <br>
            <label >Nome do Locatário:</label>
            <label class="impressao" for=""> <?=$locacao['nome']?> <br><br></label>
            <label >Título do Filme:</label>
            <label class="impressao"><?=$locacao['titulo']?></label><br><br>
            <label >Código da Locação:</label>
            <input type="number"  name="id_locacao" value="<?=$locacao['id_locacao']?>">
            <?php $accao="actualizar";?>
            <input type="hidden" id="" name="accao" value="<?=$accao ?>">  <br><br>
            <input type="hidden" name="id_locatario"  value="<?=$locacao['id_locatario']?>"> 
            <input type="hidden" name="codigoF" value="<?=$locacao['codigoF']?>">  
            <label >Estado:</label>
            <label class="impressao"><?=$locacao['estado']?></label><br><br>
            <?php $estado="devolvido";?>
            <input type="hidden" name="estado" value="<?=$locacao['estado']?>">  <br><br>
            <input type="text" name="data_devolucao"   value="<?=$locacao['now()']?>" hidden="true"> <br>
            <button type="submit">Devolver</button>
            <br><br>
        </fieldset><br>
    </form>
<?php
}
?>
<?php
}
?>