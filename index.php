<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Bem vindo ao Sistema</title>
    <link rel="stylesheet" type="text/css" href="./css/estiloI.css">
    <style>
        .maq
          {
            color:white;
            padding: 5px;
            background-color: black ;
        }
        .botao
	    {
		padding:5px;
        color:white;
        background:black;
        border-radius: 5px;
	    }
    </style>
    </head>
    <body>
    <h1>Sistema de Gestao de Filmes</h1>
    <nav class="menu">
				<ul>
						<li><a class="menu-a" href="novo.php">Novo Filme</a></li>
				

                
						<li><a class="menu-a" href="principal.php">Listas</a></li>
                        <li><a class="menu-a" href="devolver_tabela.php">Devolução</a></li>
    
                    <li>Alugar Filme
					    <ul class="aul">
                            <li><a class="menu-a" href="locatarioExis.php">Locatario Existente</a></li>
                            <li><a class="menu-a" href="locatarioNovo.php">Locatario Nao Existente</a></li>						
                        </ul>
				    </li>
                    <li>Visualização
					    <ul class="aul">
                            <li><a class="menu-a" href="filme_ator.php">Filmes por ator</a></li>
                            <li><a class="menu-a" href="filme_categoria.php">Filmes por Genero</a></li>
                            <li><a class="menu-a" href="filme_pessoa.php">Filmes por locatario</a></li>	
                            <li><a class="menu-a" href="pessoa_filme.php">Locatarios por filme</a></li>					
                        </ul>
				    </li>
                </ul>
    </nav>
                
                <h3>Filmes Disponiveis</h3><br>

    <p>Pesquise um filme pelo seu ator</p><br><br>

    <form method="get" action="filme.php">
        <label for="nome">Nome:</label>
        <input type="text" name="elenco" id="nome">
        <input type="submit" class="botao" value="Procurar">
    </form>
                <br><br><br><br>
    

    <?php include 'db.php'; ?>

    <?php
        $stm=$con->prepare('SELECT filme.id as codigoF, filme.titulo, filme.genero, filme.duracao
        FROM filme');
        $stm->execute(); 
        $filmes = $stm->fetchAll();
    ?>
	<table border="1" style="width: 1000px ">
		<th>Titulo</th>
		<th>Genero</th>
		<th>Duracao</th>
		<th>Operacoes</th>
    <?php 
		foreach ($filmes as $film) 
	    {
    ?>
	    <tr>
            <td><?php echo $film['titulo']; ?></td>
            <td><?php echo $film['genero']; ?></td>
            <td><?php echo $film['duracao']; ?></td>
            <td>
                <a  href="enviarlocacao.php?id_filme=<?php echo $film['codigoF']; ?>"><img class="icon" src="./icons/rent.png" class="action-button" title="Alugar"></a>&nbsp;  &nbsp; &nbsp;  &nbsp;
                <a  href="ver.php?id_filme=<?php echo $film['codigoF']; ?>"><img class="icon" src="./icons/ver.png" class="action-button" title="Ver Filme"></a>
			
		    </td>
			
    <?php
	    }
    ?>
	</table>

    </body>
    <br><br>
    <hr>
    <br>
    <marquee class="maq" behavior=”slide”>O nossso maior valor é a <b>vida</b>, POR FAVOR cumpra com as medidas de preenveção evitando a propagação do COVID-19.</marquee>
</html>
    
	
		
				