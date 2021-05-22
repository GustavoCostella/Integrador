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
<button type="button" class="btn btn-success d-flex align-items-center" data-toggle="modal" data-target="#criarnovoag">
  Novo Agendamento
</button>
<div class="modal fade" id="criarnovoag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="registraAgendamento" action="includes/code.php" method="post">
          <div class="form-group"> 
            <input type="text" name="nome" id = "name" placeholder="Nome do Cliente">
          </div>
          <div class="form-group">
            <input type="brand" name="marca" id ="marca" placeholder ="Marca do Carro">   
          </div>
          <div class="form-group">
            <input type="mod" name="modelo" id="modelo" placeholder="Modelo">
          </div>
          <div class="label-group">
            <label>Asssunto
              <select name="assunto">
                <option value="0">Selecione</option>
                <option value="1">Checagem</option>
                <option value="2">Orçamento</option>
              </select>
            </label>
          </div>
          <div>
            <legend>Data marcada:</legend>
            <input id="datetime" type="date" name="dataM">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary" name="registraAgendamento">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="table-responsive-sm">
  <?php  
  $resultado = "SELECT * FROM agendamento";
  $query_run = mysqli_query($conexao, $resultado);

  ?>
  <table class="table">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Carro</th>
          <th scope="col">Assunto</th>
          <th scope="col">Data marcada</th>
          <th scope="col">Edita</th>
          <th scope="col">Exclui</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if (mysqli_num_rows($query_run) > 0) {
          while ($row = mysqli_fetch_assoc($query_run)) {
              $date = date_create($row['data']);
              $assunto = $row['assunto'];
            ?>
            <tr>
             <td><?php echo $row['nomecli'];?></td>
             <td><?php echo $row['modelo'];?></td>
             <td><?php  if ($assunto == 1) {
                echo"Checagem";
              }else{
                echo "Orçamento";
              };?></td>
             <td><?php echo date_format($date, 'd/m/Y')?></td>
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