<?php
	try{
		$pdo = new PDO("mysql:dbname=xss;host=localhost;utf8mb4","root","");
	}catch(PDOException $ex){
		echo $ex->getMessage();
	}
	
	$query = "SELECT * FROM contato";
	
	$resu = $pdo->query($query);
	
	$contatos = [];
	
	while($contato = $resu->fetch(PDO::FETCH_ASSOC)){
		$contatos[] = $contato;
	}
	
	$tem_erro = false;
	
	$nome = array_key_exists('nome',$_POST)?$_POST['nome']:"";
	$email =  array_key_exists('email',$_POST)?$_POST['email']:"";
	$mensagem = array_key_exists('mensagem',$_POST)?$_POST['mensagem']:"";
	
	//se o formulário foi enviado por metódo POST
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		//receber valores enviados do formulário
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		
		if(mb_strlen(trim($nome))<2){
			$tem_erro = true;
			echo "Nome precisa de dois caracteres.";
		}
		
		//atualizar a página
		if(!$tem_erro){	
			
			$sql = "INSERT INTO contato(nome,email,mensagem) 
			VALUES ('$nome','$email','$mensagem')";
			
			$pdo->query($sql);
				
			header("Location:index.php");
			exit;
		}
	}
	
	require 'template_contato.php';
