<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';

$id_produto=$_GET['id_produto'];

$select=$pdo->prepare("SELECT id_produto,nome_produto, preco,validade,quantidade,produto.id_parceiro,categoria,parceiro.nome_parceiro from produto inner join parceiro on produto.id_parceiro=parceiro.id_parceiro where id_produto=$id_produto");

$select->execute();

$row=$select->fetch(PDO::FETCH_ASSOC);

// variaveis da base de dados
$produtoid=$row['id_produto'];
$produtonome=$row['nome_produto'];
$produtopreco=$row['preco'];
$produtovalidade=$row['validade'];
$produtoquant=$row['quantidade'];
$produtocategoria=$row['categoria'];
$produtoparceiro=$row['id_parceiro'];
$prod2=$row['nome_parceiro'];

if (isset($_POST['atualizarproduto'])) {

	// variaveis a serem levadas no formaulario (as que estao abaixo)
$nome_produto=$_POST['nome_produto'];
$preco=$_POST['preco'];
$validade=$_POST['validade'];
$categoria=$_POST['categoria'];
$id_parceiro=$_POST['id_parceiro'];

$update=$pdo->prepare("UPDATE produto set nome_produto=:nome_produto,preco=:preco,validade=:validade,quantidade=:quantidade,categoria=:categoria,id_parceiro=:id_parceiro where id_produto=$produtoid");

$update->bindParam(':nome_produto',$nome_produto);
$update->bindParam(':preco',$preco);
$update->bindParam(':validade',$validade);
$update->bindParam(':quantidade',$quantidade);
$update->bindParam(':categoria',$categoria);
$update->bindParam('id_parceiro',$id_parceiro);


if ($update->execute()) {

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
 title: "Actualização de Produto:",
  text: " Produto Atualizado com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>';
 }else{

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Actualização de Produto :",
  text: "Erro ao actualizar produto!",
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
                  <h3> <b>Painel de Atendente</b></h3>
                   <i class="mdi mdi-calendar"></i><b><?php $agora = date('d/m/Y H:i');   echo $agora?></b>
                
                </div>
                 
            
            </div>
          </div>

          
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Actualização de Produto</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome </label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Produto" name="nome_produto" value="<?php echo $produtonome?>"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Preço</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Preço do Produto" name="preco" value="<?php echo $produtopreco?>"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Validade</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Validade do Produto" name="validade" value="<?php echo $produtovalidade?>"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Quantidade</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Quantidade do Produto" name="quantidade" value="<?php echo $produtoquant?>"> 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Categoria</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Categoria do Produto" name="categoria" value="<?php echo $produtocategoria?>"> 
                    </div>

                    <div class="form-group">
                    <label for="parceiro">Parceiro</label>
                    <!--  <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do Parceiro" name="id_parceiro" value="<?php echo $prod2?>">  -->

                    <select class="form-control select2" style="width: 100%;" value="<?php echo $prod2?>" name="id_parceiro">
                    	
                   	<option> <?php echo $prod2?> </option>

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
                      <button type="submit" name="atualizarproduto" class="btn btn-primary mr-2">Actualizar</button>
                    <button  type="reset" class="btn btn-primary mr-2">Limpar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>


<?php
include_once'footer.php';
  ?>