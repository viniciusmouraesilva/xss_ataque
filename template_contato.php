<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastrar Produtos</title>
	<style>
	
		body {
			width: 500px;
			margin: 0 auto;
			font-size: 1.32em;
		}
		
		table {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
		th, td {
			border: 1px solid black;
			padding: 5px;
			background-color: tomato;
		}
	</style>
</head>
<body>
	<h1>Contato</h1>
	<hr>
	<form method="POST">
		<label>Nome
			<p><input type="text" name="nome" value="<?php echo $nome ?>"></p>
		</label>
		
		<label>Email
			<p><input type="text" name="email" value="<?php echo $email; ?>"></p>
		</label>
		
		<label><p>Descrição do Contato</p>
			<textarea name="mensagem" cols="40" rows="5"><?php echo $mensagem; ?></textarea>
		</label>
		
		<p><input type="submit" value="Enviar"></p>
	</form>
	<table>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Mensagem</th>
		</tr>
		<?php  ?>
		
		<?php foreach($contatos as $contato): ?>
				<tr>
					<td><?php echo $contato['nome']; ?></td>
					<td><?php echo $contato['email']; ?></td>
					<td><?php echo $contato['mensagem']; ?></td>
				</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>