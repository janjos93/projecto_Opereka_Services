<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';

$id_parceiro=$_GET['id_parceiro'];

 $select=$pdo->prepare("SELECT id_parceiro,nome_parceiro, cidade, endereco, email, contacto from parceiro where id_parceiro=$id_parceiro");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

// variaveis da base de dados
$parceiroid_bd=$row['id_parceiro'];
$parceironome_bd=$row['nome_parceiro'];
$parceirocidade_bd=$row['cidade'];
$parceiroendereco_bd=$row['endereco'];
$parceiroemail_bd=$row['email'];
$parceirocontacto_bd=$row['contacto'];

if (isset($_POST['atualizarparceiro'])) {
	 
	 // variaveis a serem levadas no formaulario (as que estao abaixo)
$nome_parceiro=$_POST['nome_parceiro'];
$cidade=$_POST['cidade'];
$endereco=$_POST['endereco'];
$email=$_POST['email'];
$contacto=$_POST['contacto'];

$update=$pdo->prepare("UPDATE parceiro set nome_parceiro=:nome_parceiro,cidade=:cidade,endereco=:endereco,email=:email,contacto=:contacto where id_parceiro=$parceiroid_bd");

$update->bindParam(':nome_parceiro',$nome_parceiro);
$update->bindParam(':cidade',$cidade);
$update->bindParam(':endereco',$endereco);
$update->bindParam(':email',$email);
$update->bindParam('contacto',$contacto);

if ($update->execute()) {

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
 title: "Atualizacao de parceiro:",
  text: "Atualizado com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>';
}else{

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "falha de parceiro:",
  text: "falha na Atualizacao!",
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
            <div class="col-md-12 grid-margin stretch-card">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Atualizar de Parceiros</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome do Parceiro</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Parceiro" name="nome_parceiro" value="<?php echo $parceironome_bd?>"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cidade</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Cidade" name="cidade"  value="<?php echo $parceirocidade_bd?>">  
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereço </label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Parceiro" name="endereco"  value="<?php echo $parceiroendereco_bd?>"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email do Parceiro" name="email"  value="<?php echo $parceiroemail_bd?>"> 
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Contacto</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contacto do Parceiro" name="contacto"  value="<?php echo $parceirocontacto_bd?>"> 
                    </div>
                    
                    <button type="submit" name="atualizarparceiro" class="btn btn-primary mr-2">Atualizar</button>
                    <button  type="reset" class="btn btn-primary mr-2">Limpar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
          <div class="row">
           
             
               
            </div>
          </div>
      
          <div class="row">
             

                    
          
        </div>
        <!-- content-wrapper ends -->

        <?php
        include_once'footergerente.php';
      ?>