<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Bem vindo ao Sistema</title>
    <link rel="stylesheet" type="text/css" href="./css/estiloI.css">
    <style type="text/css">
   h2
	{
		background:#A9A9A9;
        padding:7px;
        text-align:center;
		
    }
    td
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
    }
    </style>
    </head>
    <body>
        <h1>Sistema de Gestao de Filmes</h1>
        <div class="espaco">
        </div>
        <h2>Locatarios que alugaram um determinado filme</h2><br><br><br>

        <form action="pessoa_filme.php" method="get">
            <label for="filme">Pesquisa o filme</label>
            <select name="codigoF">
                <?php
                include 'db.php';
                $stm=$con->prepare("select * from filme");
                $stm->execute();
                $filmes=$stm->fetchAll(PDO::FETCH_OBJ);
                foreach ($filmes as $filme) 
                {
                    $codigoF=$filme->id;
                    echo"<option value=$codigoF>$filme->titulo</option>";
                }
                ?>
            </select>

            </p>
            <button>Prcurar</button>
        </form>
        <br><br><br>
        <?php
            if($_GET)
                {
                    include 'db.php';
                    $codigoF=$_GET['codigoF'];

                    $stmt=$con->prepare('SELECT distinct l.id as id_locatario, nome, morada, identidade FROM filme f, 
                    locacao lo, locatario l where l.id=lo.locatario and lo.filme=f.id and f.id = ?');

                    $stmt->bindParam(1,$codigoF);
                    $stmt->execute();
                    $filmes=$stmt->fetchAll();
        ?>
                <h3>Lista dos filmes</h3>
                <br><br><br>
                <table border="1" style="width: 100% ">
                    <th>Nome</th>
                    <th>identidade</th>
                    <th>Morada</th>
                    
                    
        <?php 
            foreach ($filmes as $film)
            {
        ?>
                
                    <tr>
                        <td><?php echo $film['nome']; ?></td>
                        <td><?php echo $film['identidade']; ?></td>
                        <td><?php echo $film['morada']; ?></td>
                       
        <?php
            }
        ?>
                </table><br><br> <br><br><br> <br>
                <a href="principal.php">Ver todas Listas</a> &nbsp;&nbsp;
                <a href="index.php">Home</a>
            </body>
        <?php  
            } 
        ?>
        