<?php
	session_start();
	$conexao = mysqli_connect("localhost", "root", "", "revizzi") or die ('Não foi possivel conectar');
	if(isset($_POST['registraAgendamento']))
	{
		$nome = $_POST['nome'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$data = $_POST['dataM'];
		$datam = date('Y-m-d', strtotime(str_replace('/', '-', $data)));
	
	if(isset($_POST['assunto']) && is_numeric($_POST['assunto'])){
		$assunto = $_POST['assunto'];
	}else{
		$assunto = 0;
	}

	$query = "INSERT INTO agendamento (nomecli, data, marca_carro, modelo, assunto) VALUES ('$nome', '$datam', '$marca', '$modelo', '$assunto')";
	$query_run = mysqli_query($conexao, $query);


	if($query_run){
		$_SESSION['status'] = "Adicionado";
        $_SESSION['status_code'] = "success";
        header('Location: ../agendamento.php');
	}
	else{
		$_SESSION['status'] = "Não adicionado";
        $_SESSION['status_code'] = "error";
        header('Location: ../agendamento.php');  
	}
}

?>