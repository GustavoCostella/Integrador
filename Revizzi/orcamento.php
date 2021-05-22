<?php 
session_start();
include ('includes/header.php');
include ('includes/scripts.php');
include ('includes/sidenav.php');
include ('classes/conexao.php');
?>
<?php  
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
      echo'<h2>'.$_SESSION['status'].'</h2>';
      unset($_SESSION['status']);
    }

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
      echo'<h2 class = "bg-info">'.$_SESSION['status'].'</h2>';
      unset($_SESSION['status']);
    }
  ?>
<button type="button" class="btn btn-success d-flex align-items-center" data-toggle="modal" data-target="#criarnovoor">
  Novo Orçamento
</button>
<div class="modal fade" id="criarnovoor" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Orçamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="registraOrcamento" action="includes/regOr.php" method="post">
          <div class="form-group form-control-lg d-flex justify-content-center"> 
            <input type="text" name="CPF" id = "CPF" placeholder="CPF">
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="nome" id ="nome" placeholder="Nome do Cliente">   
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="ender" id="ender" placeholder="Endereço">
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="tel" id="tel" placeholder="Telefone">
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="nomeser" id="ser" placeholder="Nome do Serviço">
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="placa" id="placa" placeholder="Placa do Carro">
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="pecas" id="pecas" placeholder="Peças Usadas">
          </div>
          <div class="form-group form-control-lg d-flex justify-content-center">
            <input type="text" name="preco" id="preco" placeholder="Preço do Serviço">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" name="registraOrcamento">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="table-responsive-sm">
  <?php  
  $resultado = "SELECT * FROM orcamento";
  $query_run = mysqli_query($conexao, $resultado);

  ?>
  <table class="table">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">CPF</th>
      <th scope="col">Nome do Cliente</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Nome Ser.</th>
      <th scope="col">Placa</th>
      <th scope="col">Peças Usadas</th>
      <th scope="col">Preço</th>
      <th scope="col">Edita</th>
      <th scope="col">Exclui</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
              $preco = number_format($row['preco'], 2, ',', '.'); ;
              if(strlen($row['cpf'])==11){
                $bloco_1 = substr($row['cpf'],0,3);
                $bloco_2 = substr($row['cpf'],3,3);
                $bloco_3 = substr($row['cpf'],6,3);
                $dig_verificador = substr($row['cpf'],-2);
                $cpf_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."-".$dig_verificador;
                  
              }
            ?>
            <tr>
             <td><?php echo $cpf_formatado;?></td>
             <td><?php echo $row['nome'];?></td>
             <td><?php echo $row['endereco'];?></td>
             <td><?php echo $row['telefone'];?></td>
             <td><?php echo $row['nomeser'];?></td>
             <td><?php echo $row['placa'];?></td>
             <td><?php echo $row['pecas'];?></td>
             <td><?php echo 'R$:' .$preco;?></td>
             <td><button type="submit" class="btn btn-success">Editar</button></td>
             <td><button type="submit" class="btn btn-danger">Excluir</button></td>
           </tr>
           <?php
         }
       }
       else{
        echo "Dados Não Encontrados";
      }
      ?>
  </tbody>
</table>
  </table>
</div>
<?php 
  include('includes/footer.php')

 ?>