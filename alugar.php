<?php
include "db.php";
?>
<?php
$accao="adicionar";

if($_POST)
{
	
	$nome=$_POST["nome"];
	$morada=$_POST["morada"];
	$contactos=$_POST["contactos"];
	$bi=$_POST["bi"];
	$estado=$_POST["estado"];
	$data_locacao=date('y/m/d');
	$data_devolucao=$_POST["data_devolucao"];
	$codigoF=$_POST["codigoF"];
	$id_locatario=$_POST["id_locatario"];
	
	$stmt=$con->prepare('insert into locatario (id, nome, identidade, morada, contactos) values(?,?,?,?,?)');
	$stmt->bindParam(1,$locacao);
	$stmt->bindParam(2,$nome);
	$stmt->bindParam(3,$bi);
	$stmt->bindParam(4,$morada);
	$stmt->bindParam(5,$contactos);
	if($stmt->execute())
	{
			
		$l_stmt =$con->prepare('insert into locacao (filme, locatario,estado, 
		data_locacao) values(?,last_insert_id(),?,now())');
		$l_stmt->bindParam(1,$codigoF);
		$l_stmt->bindParam(2,$estado);
		if ($l_stmt->execute()) {
			header('Location: ver.php?id_filme='.$codigoF);


	}
}
}?>
