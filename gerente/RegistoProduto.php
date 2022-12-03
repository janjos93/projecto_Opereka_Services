<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';

 
if (isset($_POST['cadastroproduto'])) {

	$nome_produto=$_POST['nome_produto'];
	$preco=$_POST['preco'];
	$validade=$_POST['validade'];
	$quantidade=$_POST['quantidade'];
	$categoria=$_POST['categoria'];
	$id_parceiro=$_POST['id_parceiro'];

	$insert=$pdo->prepare("insert into produto(nome_produto,preco,validade,quantidade,categoria,id_parceiro) values (:nome_produto,:preco,:validade,:quantidade,:categoria,:id_parceiro)");

	$insert->bindParam(':nome_produto',$nome_produto);
	$insert->bindParam(':preco',$preco);
	$insert->bindParam(':validade',$validade);
	$insert->bindParam(':quantidade',$quantidade);
	$insert->bindParam(':categoria',$categoria);
	$insert->bindParam(':id_parceiro',$id_parceiro);

	if($insert->execute()){

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Cadastro de Produto:",
  text: "Produto Cadastrado com sucesso!",
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
                 <h4> <b>Painel de Gerente</h4>
                <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?></b>
                </div>
                 
            
            </div>
          </div>

          
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Registo de Produto</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome </label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Produto" name="nome_produto"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Preço</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Preço do Produto" name="preco"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Validade</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Validade do Produto" name="validade"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Quantidade</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Quantidade do Produto" name="quantidade"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Categoria</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Categoria do Produto" name="categoria"> 
                    </div>

                    <div class="form-group">

                    <label for="parceiro">Parceiro</label>
                    <select class="form-control select2" style="width: 100%;" name="id_parceiro">
                    	
                   	<option value="" disabled selected>Seleccione o parceiro</option>

                   	<?php

                   	$select2=$pdo->prepare("select * from parceiro");
                   	$select2->execute();

                   	while ($row=$select2->fetch(PDO::FETCH_ASSOC)) {
                   		 extract($row);
                   		 ?>
                   		 <option value="<?php echo $row['id_parceiro'];?>"><?php echo $row ['nome_parceiro'];?></option>
                   		 <?php

                   	}
                   	?>	

                    </select>
                  </div>
                      <button type="submit" name="cadastroproduto" class="btn btn-primary mr-2">Cadastrar</button>
                    <button  type="reset" class="btn btn-primary mr-2">Limpar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
 
        
      
          
        <!-- content-wrapper ends -->

        <?php
        include_once'footergerente.php';
      ?>


