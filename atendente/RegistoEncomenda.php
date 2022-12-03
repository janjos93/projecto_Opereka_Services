<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';
 

if (isset($_POST['registoencomenda'])) {


$id_cliente=$_POST['id_cliente'];
	$id_produto=$_POST['id_produto'];
	$data_entrega=$_POST['data_entrega'];
	$local_entrega=$_POST['local_entrega'];
	$status=$_POST['status'];


 $insert=$pdo->prepare("insert into encomenda (id_cliente, id_produto, data_entrega, local_entrega, status) VALUES (:id_cliente,:id_produto,:data_entrega,:local_entrega,:status)");

  
  	$insert->bindParam(':id_cliente',$id_cliente);
	$insert->bindParam(':id_produto',$id_produto);
	$insert->bindParam(':data_entrega',$data_entrega);
	$insert->bindParam(':local_entrega',$local_entrega);
	$insert->bindParam(':status',$status);
if($insert->execute()){

	echo '<script type="text/javascript">
  jQuery(function validation(){

    swal({
  title: "Registo de Encomenda:",
  text: "Encomenda registada com sucesso!",
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
                 <h4><b> Painel de Atendente</h4>
                <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?></b>
                </div>
                 
            
            </div>
          </div>
 <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">  Registo de Encomenda</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" >
<div class="form-group">

                  <!--   <label for="cliente">Cliente</label> -->
                    <select class="form-control select2" style="width: 100%;" name="id_cliente">
                    	
                   	<option value="" disabled selected>Seleccione o Cliente</option>

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
                    <select class="form-control select2" style="width: 100%;" name="id_produto">
                    	
                   	<option value="" disabled selected>Seleccione o produto</option>

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
                      <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Data de Entrega" name="data_entrega"> 
                    </div>

					<div class="form-group">
                    <!--   <label for="exampleInputUsername1">Local de Entrega</label> -->
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Local de Entrega" name="local_entrega"> 
                    </div>

					 

                     <div class="form-group">
                  <label for="status">Status da encomenda </label>        
                   <select class="form-control select2" style="width: 100%;" name="status">
                    <option value="" disabled selected>Seleccione status da encomenda</option>
                      <option>Perdida</option>
                    <option>Pendente</option>
                    <option>Entregue</option>
                    
                   </select>              
                </div>

<button type="submit" name="registoencomenda" class="btn btn-primary mr-2">Cadastrar</button>
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
	 