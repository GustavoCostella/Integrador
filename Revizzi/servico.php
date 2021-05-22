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
      <button type="button" class="btn btn-success d-flex align-items-center" data-toggle="modal" data-target="#criarnovoser">
        Novo Serviço
      </button>
      <div class="modal fade" id="criarnovoser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Serviço</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form name="registraServico" action="includes/regSer.php" method="post">
                <div class="form-group"> 
                  <input type="text" name="nomeserv" id = "nome" placeholder="Nome do Serviço">
                </div>
                <div class="form-group">
                  <input type="text" name="pecas" id ="pecas" placeholder="Peças usadas">   
                </div>
                <div class="form-group">
                  <input type="text" name="marca" id="marca" placeholder="Marca do Carro">
                </div>
                <div class="form-group">
                  <input type="text" name="modelo" id="modelo" placeholder="Modelo do Carro">
                </div>
                <div>
                  <legend>Data da Realização:</legend>
                  <input id="datetime" type="date" name="dataS">
                </div>
                <div class="label-group">
                  <label>Status do Serviço
                    <select name="servico">
                      <option value="0">Selecione</option>
                      <option value="1">Aguardando Cliente</option>
                      <option value="2">Aberto</option>
                      <option value="3">Fechado</option>
                    </select>
                  </label>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" name="registraServico">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<div class="table-responsive-sm">
 <?php  
  $resultado = "SELECT * FROM ordemserv";
  $query_run = mysqli_query($conexao, $resultado);

  ?>
  <table class="table">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Serviço</th>
      <th scope="col">Peças</th>
      <th scope="col">Carro</th>
      <th scope="col">Data Serviço</th>
      <th scope="col">Status</th>
      <th scope="col">Edita</th>
      <th scope="col">Exclui</th>
    </tr>
  </thead>
  <tbody>
     <?php 
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
              $date = date_create($row['data']);
              $servico = $row['status_serv'];
            ?>
            <tr>
             <td><?php echo $row['nomeserv'];?></td>
             <td><?php echo $row['pecas'];?></td>
             <td><?php echo $row['nome_carro'];?></td>
             <td><?php echo date_format($date, 'd/m/Y')?></td>
             <td><?php  if ($servico == 1) {
                echo "Aguardando";
              }else if ($servico == 2) {
                echo "Aberto";
              }
              else{
                echo "Fechado";
              };?></td>
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
</table>
  </table>
</div>
<?php 
  include('includes/footer.php')

 ?>