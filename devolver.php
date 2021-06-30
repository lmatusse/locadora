<?php

	$accao="actualizar";
		
		include 'db.php';

			
			
           		$id_locacao=$_POST["id_locacao"];
                $id_locatario=$_POST["id_locatario"];
			    $id_locacao=$_POST["id_locacao"];
			    $codigoF=$_POST["codigoF"];
				$estado=$_POST["estado"];
				$data_devolucao=$_POST["data_devolucao"];
                $id_locatario=$_POST["id_locatario"];
                $stm= $con->prepare("update locacao set filme=?, locatario=?,estado='devolvido',
				data_devolucao=noW() where id=?");
                $stm->bindParam("iisii", $codigoF,$id_locatario,$estado,$id_locacao);
                $stm->bindParam(1,$codigoF);
                $stm->bindParam(2,$id_locatario);
                $stm->bindParam(3,$id_locacao);
			    if($stm->execute())
			    {
				   header ('Location: verLocacao.php?id_locacao='.$id_locacao);
			    }
        
		
	
?>