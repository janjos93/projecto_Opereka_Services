<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';
 

if (isset($_POST['registofuncionario'])) {



 $nome_funcionario=$_POST['nome_funcionario'];
 
$data_nascimento=$_POST['data_nascimento'];
$genero=$_POST['genero'];
$endereco=$_POST['endereco'];
$contacto=$_POST['contacto'];
$email=$_POST['email'];
 

$insert=$pdo->prepare("insert into funcionario (nome_funcionario, data_nascimento,genero, endereco,contacto, email) VALUES (:nome_funcionario, :data_nascimento, :genero,:endereco,:contacto,:email)");

// INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `bilhete`, `data_nascimento`, `genero`, `endereco`, `contacto`, `email`, `cargo`)


$insert->bindParam(':nome_funcionario',$nome_funcionario);
 
$insert->bindParam(':data_nascimento',$data_nascimento);
$insert->bindParam(':genero',$genero);
 $insert->bindParam(':endereco',$endereco);
$insert->bindParam(':contacto',$contacto);
$insert->bindParam(':email',$email);
 

if ($insert->execute()) {

    echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Cadastro de Funcionário  ",
  text: "Funcionário  Cadastrado com sucesso!",
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
                  <h4 class="card-title">  Registo de Funcionário  </h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
<!--                       <label for="exampleInputUsername1">Nome do Funcionário </label>
 -->                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Funcionário" name="nome_funcionario"> 
                    </div>
                     
                    <div class="form-group">
                      <label for="exampleInputPassword1">Data de Nascimento </label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Data de Nascimento" name="data_nascimento">
                    </div>
                    <div class="form-group">
                  <!-- <label for="Nivel Acesso">Genero </label>  -->       
                   <select class="form-control select2" style="width: 100%;" name="genero">
                    <option value="" disabled selected>Seleccione o Genero do Funcionario</option>
                    <option>Masculino</option>
                   <option>Femenino</option>
                   >
                   </select>              
                </div>
                    <div class="form-group">
               <!--        <label for="exampleInputPassword1">Endereco</label> -->
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereço do Funcionário" name="endereco">
                    </div>
                        <div class="form-group">
                   <!--    <label for="exampleInputPassword1">Contacto</label> -->
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contacto do Funcionário" name="contacto">
                    </div>
                      <div class="form-group">
                    <!--   <label for="exampleInputPassword1">Email do Funcionario</label> -->
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email do Funcionário" name="email">
                    </div>
                      
                    
                    <button type="submit" name="registofuncionario" class="btn btn-primary mr-2">Cadastrar</button>
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