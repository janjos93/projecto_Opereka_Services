<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';

$id_cliente=$_GET['id_cliente'];

 $select=$pdo->prepare("SELECT id_cliente, nome_cliente, apelido, contacto, endereco from Cliente where id_cliente=$id_cliente");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

// variaveis da base de dados
$clienteid_bd=$row['id_cliente'];
$clientenome_bd=$row['nome_cliente'];
$clienteapelido_bd=$row['apelido'];
$clientecontacto_bd=$row['contacto'];
$clienteendereco_bd=$row['endereco'];
 

if (isset($_POST['atualizarcliente'])) {
	 
	 // variaveis a serem levadas no formaulario (as que estao abaixo)
$nome_cliente=$_POST['nome_cliente'];
$apelido=$_POST['apelido'];
$contacto=$_POST['contacto'];
$endereco=$_POST['endereco'];


$update=$pdo->prepare("UPDATE cliente set nome_cliente=:nome_cliente,apelido=:apelido,contacto=:contacto,endereco=:endereco where id_cliente=$clienteid_bd");

$update->bindParam(':nome_cliente',$nome_cliente);
$update->bindParam(':apelido',$apelido);
$update->bindParam(':contacto',$contacto);
$update->bindParam(':endereco',$endereco);


if ($update->execute()) {

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
 title: "Actualização  de Cliente:",
  text: " Cliente Atualizado com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>';
}else{

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Actualização de Cliente:",
  text: "Falha ao actualizar o cliente!",
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
                  <h3> Painel de Atendente</h3>
                 <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?>
                
                </div>
                 
            
            </div>
          </div>

          
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Actualização de Cliente</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome do Cliente</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Cliente" name="nome_cliente" value="<?php echo $clientenome_bd; ?>"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apelido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Apelido do Cliente" name="apelido" value="<?php echo $clienteapelido_bd?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contacto </label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contacto do Cliente" name="contacto" value="<?php echo $clientecontacto_bd?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereco</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Cliente" name="endereco" value="<?php echo $clienteendereco_bd?>">
                    </div>
                      
                    
                    <button type="submit" name="atualizarcliente" class="btn btn-primary mr-2">Actualizar</button>
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