<?php
include "db.php";
?>
<?php
$accao="adicionar";
if($_POST)
{
	$estado=$_POST["estado"];
	$data_locacao=$_POST["data_locacao"];
	$data_devolucao=$_POST["data_devolucao"];
	$codigoF=$_POST["codigoF"];
    $id_locatario=$_POST["id_locatario"];
    $id_locacao=$_POST["id_locacao"];
	$l_stmt =$con->prepare('insert into locacao (filme, locatario,estado, data_locacao) 
	values(?,?,?,now())');
        $l_stmt->bindParam(1,$codigoF);
        $l_stmt->bindParam(2,$id_locatario);
		$l_stmt->bindParam(3,$estado);
		if ($l_stmt->execute()) {
			header('Location: ver.php?id_filme='.$codigoF);


	}
}
	?>

	
		
		
		
	
	

