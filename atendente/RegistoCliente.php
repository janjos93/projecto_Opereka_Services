<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';


if (isset($_POST['cadastrocliente'])) {
 

$nome_cliente=$_POST['nome_cliente'];
$apelido=$_POST['apelido'];
$contacto=$_POST['contacto'];
$endereco=$_POST['endereco'];

$insert=$pdo->prepare("insert into cliente (nome_cliente, apelido, contacto, endereco) VALUES (:nome_cliente, :apelido, :contacto, :endereco)");

$insert->bindParam(':nome_cliente',$nome_cliente);
$insert->bindParam(':apelido',$apelido);
$insert->bindParam(':contacto',$contacto);
$insert->bindParam(':endereco',$endereco);
 
if ($insert->execute()) {
 
echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Cadastro de Cliente:",
  text: "Cliente Gravado com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>';
 
}else{
  echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: " Cadastro de Cliente ",
  text: "Falha ao Cadastrar Novo Cliente!",
  icon: "error",
  button: "FEITO!",
});


  });


</script>';
}
}

?>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                 <h4><b> Painel de Atendente</h4>
                <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?></b>
                
                </div>
                 
            
            </div>
          </div>

          
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Registo de Cliente</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome do Cliente</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Cliente" name="nome_cliente"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apelido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Apelido do Cliente" name="apelido">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contacto </label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contacto do Cliente" name="contacto">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereco</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Cliente" name="endereco">
                    </div>
                      
                    
                    <button type="submit" name="cadastrocliente" class="btn btn-primary mr-2">Cadastrar</button>
                    <button  type="reset" class="btn btn-primary mr-2">Limpar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
 
        
      
          
        <!-- content-wrapper ends -->


<?php 
include_once'footer.php'
?>

