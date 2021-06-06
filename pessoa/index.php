<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Relacionamento 1xN</title>
<meta charset="UTF-8" >
</head>
<body>
	<h1>Pessoa</h1>
	<?php
	
	
	include("../banco_dados_conexao.php");
	
	try {
	
		$dbh = new PDO( $dsn );
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare('SELECT * from pessoa');
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		echo "<table border=1>";
		
		// escrevendo cabeçalho a partir dos índices do vetor FETCH_ASSOC
		echo "<tr>";
		foreach($result[0] as $index=>$values) {
			echo "<td> $index </td> ";
		}
		echo "</tr>";
		
		// escrevendo resultado do SELECT
		foreach($result as $row) {
			echo "<tr>";
			foreach($row as $value){
				echo "<td> $value </td> ";
			}
			echo "<td><a href='excluir.php?cpf=".$row["cpf"]."'>Excluir</a></td>";
			echo "<td><a href='alterar_formulario.php?cpf=".$row["cpf"]."'>Alterar</a></td>";
			echo "</tr>";
		}
		
		$dbh = null;
		
		echo "</table>";
		
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}

	
	?>
	

	<br>
	<a href='cadastro_formulario.php'>Cadastrar</a>
	<br><br>
	<a href='../index.php'>Voltar</a>

</body>
</html>
