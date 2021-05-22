<?php
	session_start();
	$conexao = mysqli_connect("localhost", "root", "", "revizzi") or die ('Não foi possivel conectar');
	if(isset($_POST['registraServico']))
	{
		$nomeSer = $_POST['nomeserv'];
		$pecas = $_POST['pecas'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$data = $_POST['dataS'];
		$dataS = date('Y-m-d', strtotime(str_replace('/', '-', $data)));
	
	
	if(isset($_POST['servico']) && is_numeric($_POST['servico'])){
		$servico = $_POST['servico'];
	}else{
		$servico = 0;
	}

	$query = "INSERT INTO ordemserv (nomeserv, pecas, data, status_serv, marca_carro, nome_carro) VALUES ('$nomeSer', '$pecas', '$dataS', '$servico', '$marca', '$modelo')";
	$query_run = mysqli_query($conexao, $query);


	if($query_run){
		$_SESSION['status'] = "Adicionado";
        $_SESSION['status_code'] = "success";
        header('Location: ../servico.php');
	}
	else{
		$_SESSION['status'] = "Não adicionado";
        $_SESSION['status_code'] = "error";
        header('Location: ../servico.php');  
	}
}

?>