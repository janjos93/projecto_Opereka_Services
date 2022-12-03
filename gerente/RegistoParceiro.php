<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';


if (isset($_POST['gravar'])) {
 

$nome_parceiro=$_POST['nome_parceiro'];
$cidade=$_POST['cidade'];
$endereco=$_POST['endereco'];
$email=$_POST['email'];
$contacto=$_POST['contacto'];


$insert=$pdo->prepare("insert into parceiro (nome_parceiro, cidade, endereco, email, contacto) VALUES (:nome_parceiro, :cidade, :endereco, :email, :contacto)");

$insert->bindParam(':nome_parceiro',$nome_parceiro);
$insert->bindParam(':cidade',$cidade);
$insert->bindParam(':endereco',$endereco);
$insert->bindParam(':email',$email);
$insert->bindParam('contacto',$contacto);


if ($insert->execute()) {
 
echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Gravacao de parceiro:",
  text: "Gravado com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>';
}else{
  echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "  ",
  text: "Falha ao Cadastrar!",
  icon: "error",
  button: "Ok...!",
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
                  <h4><b> Painel de Gerente</h4>
                <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?></b>
                
                </div>
                 
            
            </div>
          </div>

          
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Registo de Parceiro</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome do Parceiro</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Parceiro" name="nome_parceiro"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cidade</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Cidade" name="cidade">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereço </label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Parceiro" name="endereco">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email do Parceiro" name="email">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Contacto</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contacto do Parceiro" name="contacto">
                    </div>
                    
                    <button type="submit" name="gravar" class="btn btn-primary mr-2">Cadastrar</button>
                    <button  type="reset" class="btn btn-primary mr-2">Limpar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
 
        
      
          
        <!-- content-wrapper ends -->



<?php

include_once'footergerente.php'

?>