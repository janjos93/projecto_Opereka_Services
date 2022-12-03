<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';
 

 

$select=$pdo->prepare("select count(produto.id_produto) as 'Total de Produtos' from produto");
$select->execute();

$row=$select->fetch(PDO::FETCH_ASSOC);

$nrProduto=$row['Total de Produtos'];



$select=$pdo->prepare("select count(encomenda.id_encomenda) as 'Total de Encomendas' from encomenda");
$select->execute();

$row=$select->fetch(PDO::FETCH_ASSOC);

$nrEncomenda=$row['Total de Encomendas'];

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
          </div>
           
           
                     <div class="col-md-8 grid-margin transparent">
              <div class="row">
                  
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Número total de Produtos</p>
                      <p class="fs-30 mb-2"><?php echo $nrProduto;?> </p>
  
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Número total de Encomendas</p>
                      <p class="fs-30 mb-2"><?php echo $nrEncomenda;?> </p>
  
                    </div>
                  </div>
                </div>
            </div>   
                 <h4>Encomendas Registadas</h4>
            <table class="table table-hover" id="data">
              <thead class="thead-light">
                <tr> 


                  <th scope="col"> Cliente</th>
                  <th scope="col">Produto   </th>
                  <th scope="col">  Data </th>
                  <th scope="col">Local</th>
                  <th scope="col"> Status </th>
                  <th scope="col">Editar</th>
                  <th scope="col">Apagar</th>
                  </tr>

            </thead>
            <tbody>

              <?php

              $select=$pdo->prepare("select id_encomenda,cliente.nome_cliente, produto.nome_produto, data_entrega, local_entrega, status from cliente inner join encomenda on encomenda.id_cliente=cliente.id_cliente inner join  produto on encomenda.id_produto=produto.id_produto");

 

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'


                 <td>'.$row->nome_cliente.'</td>
                  <td>'.$row->nome_produto.'</td>
                   <td>'.$row->data_entrega.'</td>
                    <td>'.$row->local_entrega.'</td>
                     <td>'.$row->status.'</td>
                      <td>
                    <a href="updateencomenda.php?id_encomenda='.$row->id_encomenda.'" class="btn btn-primary" role="button">Atualizar</a>
                     </td>
                     <td>
                     <button id='.$row->id_encomenda.' class="btn btn-danger btnDelete">Apagar</button> 
                     </td>
                    </tr>


                ';
              }
               
               ?> 
            </tbody>


            </table>
             
                <a  href="relatorioGeral.php?tipoRelatorio=relatorioEncomenda" class="btn btn-primary" target="_blank" role="button"> Gera Relatorio</a>
              </div>
           </div>
          
          
      
           
        <!-- content-wrapper ends -->

        <?php
        include_once'footer.php';
      ?>