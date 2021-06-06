<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>Relacionamento 1xN</title>
<meta charset="UTF-8">
</head>
<body>

	<?php
		include("../banco_dados_conexao.php");
	?>


	<h1>Alterar</h1>
	<form method="post" action="alterar_update.php">
	
		<?php
			try {
			
				$dbh = new PDO( $dsn );
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $dbh->prepare('SELECT * from veiculo where renavam = ?');
				$stmt->bindParam(1, $renavam);
				$renavam = $_GET["renavam"];
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				$marca=$result[0]["marca"];
				$modelo=$result[0]["modelo"];
				$ano=$result[0]["ano"];
				$cor=$result[0]["cor"];
				$cpf_dono=$result[0]["cpf_dono"];
				
				echo "<br>Renavam: <input type='text' name='renavam' value='" . $renavam . "' readonly>";
				echo "<br>Marca: <input type='text' name='marca' value='" . $marca . "'>";
				echo "<br>Modelo: <input type='text' name='modelo' value='" . $modelo . "'>";
				echo "<br>Ano: <input type='text' name='ano' value='" . $ano . "'>";
				echo "<br>Cor: <input type='text' name='cor' value='" . $cor . "'>";

				echo "<br>Proprietário:";
				echo "<select name='cpf_dono'>";
				try {
					$stmt = $dbh->prepare('SELECT cpf,nome from pessoa');
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row) {
						if($cpf_dono==$row["cpf"]) $selected=" selected ";
						else $selected="";
						echo "<option value='".$row["cpf"]."' ".$selected.">".$row["nome"]."</option>";
					}
					$dbh = null;					
				} catch (PDOException $e) {
					print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
					die();
				}

				echo "</select>";
				
				$dbh = null;
	
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}
		?>

	<br><input type="submit" name="alterar" value="Alterar">
	</form>
<br><br><a href="index.php">voltar</a>
</body>
</html>
