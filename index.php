<!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/sweetalert/sweetalert.js"></script>


<?php
include_once'admin/conexao.php';
session_start();

if (isset($_POST['entrar'])) {
 
$nome=$_POST['nome_usuario'];
$senha=$_POST['senha'];

// testar conexao se recebe os parametros = = = echo $nome."-".$password;

$select=$pdo->prepare("SELECT id_usuario, nome_usuario,senha,nivel_acesso FROM usuario where nome_usuario='$nome' and senha='$senha'");

$select->execute();

$row=$select->fetch(PDO::FETCH_ASSOC);

//comecando com niveis de acesso do sistema

if ($row['nome_usuario']==$nome AND $row['senha']==$senha AND $row['nivel_acesso']=="Administrador") {

  $_SESSION['id_usuario']=$row['id_usuario'];
  $_SESSION['nome_usuario']=$row['nome_usuario'];
   $_SESSION['senha']=$row['senha'];
    $_SESSION['nivel_acesso']=$row['nivel_acesso'];


     echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Bem-Vindo ao Sistema '.$_SESSION['nome_usuario'].'",
  text: "Usuario Logado com sucesso!",
  icon: "success",
  button: "Ok...!",
});


  });


</script>';

header('refresh:2;admin/dashboard.php');
    
}else if ($row['nome_usuario']==$nome AND $row['senha']==$senha AND $row['nivel_acesso']=="Gerente") {
       
$_SESSION['id_usuario']=$row['id_usuario'];
$_SESSION['nome_usuario']=$row['nome_usuario'];
$_SESSION['senha']=$row['senha'];
$_SESSION['nivel_acesso']=$row['nivel_acesso'];


echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Bem-Vindo ao Sistema:  '.$_SESSION['nome_usuario'].'",
  text: "Usuario Logado com sucesso!",
  icon: "success",
  button: "OK...!",
});


  });


</script>';

header('refresh:2;gerente/dashboard.php');

}else if ($row['nome_usuario']==$nome AND $row['senha']==$senha AND $row['nivel_acesso']=="Atendente") {


$_SESSION['id_usuario']=$row['id_usuario'];
  $_SESSION['nome_usuario']=$row['nome_usuario'];
   $_SESSION['senha']=$row['senha'];
    $_SESSION['nivel_acesso']=$row['nivel_acesso'];

echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Bem-Vindo ao Sistema:  '.$_SESSION['nome_usuario'].'",
  text: "Usuario Logado com sucesso!",
  icon: "success",
  button: "OK...!",
});


  });


</script>';

header('refresh:2;atendente/dashboard.php');

 }else {

     echo '<script type="text/javascript">
   jQuery(function validation(){
     swal({
   title: "Nao tem acesso",
   text: "Falha ao tentar entrar!",
   icon: "error",
   button: "OK.....!",
 });


   });


 </script>';
 

header('refresh:1;index.php');


 }




}


?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" background="imagens/1.png">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
         <p class="login-box-msg"><b>OPEREKA SERVICES </b></p>
      <p class="login-box-msg"><b>Painel de Autenticação de Login </b></p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Digite o seu nome de usuario" name="nome_usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Digite a sua senha" name="senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button  type="submit" class="btn btn-primary" name="entrar">Entrar</button>
           <br>
           <br>
         </div>
              
          <!-- /.col -->
        </div>
       
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte.min.js"></script>
</body>
</html>
