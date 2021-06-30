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
        <h2>Filmes alugados por uma pessoa</h2><br><br><br>
        <form action="filme_pessoa.php" method="get">
            <label for="locatrio">Pesquisa o locatario</label>
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
            <button>Prcurar</button>
        </form>
        <br><br><br>
        <?php
            if($_GET)
                {
                    include 'db.php';
                    $id_locatario=$_GET['id_locatario'];
                    $stmt=$con->prepare('SELECT distinct f.id as codigoF, l.id as id_locatarioo, 
                    f.titulo,f.duracao, elenco, genero, l.nome, f.data_lancamento FROM filme f, 
                    locacao lo, locatario l where l.id=lo.locatario and lo.filme=f.id and l.id = ?');
                    $stmt->bindParam(1,$id_locatario);
                    $stmt->execute();
                    $filmes=$stmt->fetchAll();
        ?>
        <?php
            if(empty($filmes))
            {
                echo "<h3 style='color:red; text-transform: uppercase;'> Este Locataria nao Alugou Filme</h3>";

            }
            else{
                ?>
                <h3>Lista dos alugados por : <?php echo $filmes[0]['nome'] ?></h3>
                <br><br><br>
                <table border="1" style="width: 100% ">
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Data de Lacamento</th>       
                    <?php 
                        foreach ($filmes as $film)
                        {
                    ?>
                
                    <tr>
                        <td><?php echo $film['titulo']; ?></td>
                        <td><?    echo $film['genero'];?>  </td>
                        <td><?php echo $film['data_lancamento']; ?></td>
                    <?php
                        }
                    ?>
                </table><br><br> <br><br><br> <br>
                <a href="principal.php">Ver todas Listas</a>
                <a href="index.php">Home</a>
    </body>
        <?php
            }
        ?>
        <?php
            }
        ?>
        

                
        
        