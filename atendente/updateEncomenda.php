<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';

$id_encomenda=$_GET['id_encomenda'];

$select =$pdo->prepare("SELECT id_encomenda, cliente.nome_cliente, produto.nome_produto,data_entrega,local_entrega,status from encomenda inner JOIN cliente on encomenda.id_cliente=cliente.id_cliente INNER join produto on encomenda.id_produto=produto.id_produto where id_encomenda=$id_encomenda");

$select->execute();
$row=$select->fetch(PDO::FETCH_ASSOC);

$encomendaid=$row['id_encomenda'];
$encomendacliente=$row['nome_cliente'];
$encomendaproduto=$row['nome_produto'];
$encomendadata=$row['data_entrega'];
$encomendalocal=$row['local_entrega'];
$encomendastatus=$row['status'];

if (isset($_POST['atualizarencomenda'])) {


$id_cliente=$_POST['id_cliente'];
$id_produto=$_POST['id_produto'];
$data_entrega=$_POST['data_entrega'];
$local_entrega=$_POST['local_entrega'];
$status=$_POST['status'];

$update=$pdo->prepare("UPDATE encomenda set id_cliente=:id_cliente,id_produto=:id_produto,data_entrega=:data_entrega,local_entrega=:local_entrega,status=:status where id_encomenda=$encomendaid");

	 
	 $update->bindParam(':id_cliente',$id_cliente);
	 $update->bindParam(':id_produto',$id_produto);
	 $update->bindParam(':data_entrega',$data_entrega);
	 $update->bindParam(':local_entrega',$local_entrega);
	 $update->bindParam(':status',$status);
	 
 if ($update->execute()) {

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
 title: "Actualização  de Encomenda:",
  text: " Encomenda Atualizada com sucesso!",
  icon: "success",
  button: "FEITO!",
});


  });


</script>';
}else{

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Actualização de Encomenda:",
  text: "Falha ao actualizar a Encomenda!",
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
                  <h4 class="card-title">  Actualização de Encomenda</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
<div class="form-group">

                    <label for="cliente">Cliente</label>  
                    <select class="form-control select2" style="width: 100%;" name="id_cliente" value="<?php echo $encomendacliente?>">
                    	
                   	<option> <?php echo $encomendacliente?> </option>

                   	<?php

                   	$select2=$pdo->prepare("select * from cliente");
                   	$select2->execute();

                   	while ($row=$select2->fetch(PDO::FETCH_ASSOC)) {
                   		 extract($row);
                   		 ?>
                   		 <option value="<?php echo $row['id_cliente'];?>"><?php echo $row ['nome_cliente'];?></option>
                   		 <?php

                   	}
                   	?>	

                    </select>
                  </div>

                  <div class="form-group">
<!-- 
                    <label for="parceiro">Produto</label> -->
                    <select class="form-control select2" style="width: 100%;" value="<?php echo $encomendaproduto ?>" name="id_produto">
                    	
                   	<option><?php echo $encomendaproduto ?></option>

                   	<?php

                   	$select2=$pdo->prepare("select * from produto");

                   	$select2->execute();

                   	while ($row=$select2->fetch(PDO::FETCH_ASSOC)) {
                   		 extract($row);
                   		 ?>
                   		 <option value="<?php echo $row['id_produto'];?>"><?php echo $row ['nome_produto'];?></option>
                   		 <?php

                   	}
                   	?>	

                    </select>
                  </div>

						<div class="form-group">
                      <label for="exampleInputUsername1"> Data de Entrega</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Data de Entrega" name="data_entrega" value="<?php echo $encomendadata ?>"> 
                    </div>

					<div class="form-group">
                    <!--   <label for="exampleInputUsername1">Local de Entrega</label> -->
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Local de Entrega" name="local_entrega" value="<?php echo $encomendalocal ?>"> 
                    </div>

					 

                     <div class="form-group">
                  <label for="status">Status da encomenda </label>   

                   <input type="text" class="form-control" id="exampleInputPassword1"  name="status" value="<?php echo $encomendastatus?>">
                         <div class="form-group">


                   <select class="form-control select2" style="width: 100%;" name="status">
                    <option value="" disabled selected>Seleccione status da encomenda</option>
                      <option>Perdida</option>
                    <option>Pendente</option>
                    <option>Entregue</option>
                    
                   </select>              
                </div>

<button type="submit" name="atualizarencomenda" class="btn btn-primary mr-2">Actualizar</button>
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
