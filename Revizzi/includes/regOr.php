<?php
	session_start();
	include('../classes/conexao.php');
	if(isset($_POST['registraOrcamento']))
	{
		$cpf = $_POST['CPF'];
		$nome = $_POST['nome'];
		$ender = $_POST['ender'];
		$tel = $_POST['tel'];
		$serv = $_POST['nomeser'];
		$placa = $_POST['placa'];
		$pecas = $_POST['pecas'];
		$preco = $_POST['preco'];

	$query = "INSERT INTO orcamento (cpf, nome, endereco, telefone, nomeser, placa, pecas, preco) VALUES ('$cpf', '$nome', '$ender', '$tel', '$serv', '$placa', '$pecas', '$preco')";
	$query_run = mysqli_query($conexao, $query);


	if($query_run){
		$_SESSION['status'] = "Adicionado";
        $_SESSION['status_code'] = "success";
        header('Location: ../orcamento.php');
	}
	else{
		$_SESSION['status'] = "Não adicionado";
        $_SESSION['status_code'] = "error";
        header('Location: ../orcamento.php');  
	}
}

?>