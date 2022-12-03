<?php

include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';

$id_funcionario=$_GET['id_funcionario'];

$select=$pdo->prepare("SELECT id_funcionario, nome_funcionario, data_nascimento,genero,endereco,contacto,email from funcionario where id_funcionario=$id_funcionario");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

//variaveis da base de dados

$funcid=$row['id_funcionario'];
$funcnome=$row['nome_funcionario'];
$funcdata=$row['data_nascimento'];
$funcgenero=$row['genero'];
$funcend=$row['endereco'];
$funccont=$row['contacto'];
$funcemail=$row['email'];

if (isset($_POST['atualizarfuncionario'])) {
	 
	 //variaveis a serem levadas no formulario
	$nome_funcionario=$_POST['nome_funcionario'];
	$data_nascimento=$_POST['data_nascimento'];
	$genero=$_POST['genero'];
	$endereco=$_POST['endereco'];
	$contacto=$_POST['contacto'];
	$email=$_POST['email'];

	 $update=$pdo->prepare("update funcionario set nome_funcionario=:nome_funcionario, data_nascimento=:data_nascimento,genero=:genero,endereco=:endereco,contacto=:contacto,email=:email where id_funcionario=$funcid"); 

 $update->bindParam(':nome_funcionario',$nome_funcionario);
 $update->bindParam(':data_nascimento',$data_nascimento);
 $update->bindParam(':genero',$genero);
 $update->bindParam(':endereco',$endereco);
 $update->bindParam(':contacto',$contacto);
 $update->bindParam(':email',$email);

 if ($update->execute()) {

 	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
 title: "Actualização de Funcionário:",
  text: " Funcionario Atualizado com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>'; 
}else{

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Actualização de Funcionario:",
  text: "Falha ao actualizar o Funcionario!",
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
                  <h3> Painel de Gerente</h3>
                 <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?>
                
                </div>
                 
            
            </div>
          </div>

          
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Actualização de Funcionário </h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome do Funcionário </label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Cliente" name="nome_funcionario"value="<?php echo $funcnome?>"> 
                    </div>
                     
                    <div class="form-group">
                      <label for="exampleInputPassword1">Data de Nascimento </label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Data de Nascimento" name="data_nascimento" value="<?php echo $funcdata ?>">
                    </div>
                   <!--  <div class="form-group">
                  <label for="Nivel Acesso">Genero </label>        
                   <select class="form-control select2" style="width: 100%;" name="genero" value=>
                    <option value="" disabled selected><?php echo $funcgenero?> </option>
                    <option>Masculino</option>
                   <option>Femenino</option>
                   >
                   </select>              
                </div> -->
                <div class="form-group">
                      <label for="exampleInputPassword1">Genero</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Genero do Cliente" name="genero" value="<?php echo $funcgenero?>">
                         <div class="form-group">
                           
                   <select class="form-control select2" style="width: 100%;" name="genero" value=>
                    <option value="<?php echo $funcgenero?>" disabled selected>Seleccione o genero do Funcionario </option>
                    <option>Masculino</option>
                   <option>Femenino</option>
                   >
                   </select>              
                </div>  
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereco</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Cliente" name="endereco" value="<?php echo $funcend?>">
                    </div>
                        <div class="form-group">
                      <label for="exampleInputPassword1">Contacto</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Cliente" name="contacto" value="<?php echo $funccont?>">
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">Email do Funcionario</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereco do Cliente" name="email" value="<?php echo $funcemail?>">
                    </div>
                      
                    
                    <button type="submit" name="atualizarfuncionario" class="btn btn-primary mr-2">Atualizar</button>
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