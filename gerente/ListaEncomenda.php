<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';
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
          </div>
          <div class="row">
         <h3>  Lista de Encomendas</h3>
             <table class="table table-hover" id="data">
              <thead class="thead-light">
                <tr> 


                  <th scope="col"> Cliente</th>
                  <th scope="col">Produto   </th>
                  <th scope="col">  Data </th>
                  <th scope="col">Local</th>
                  <th scope="col"> Status </th>
                  
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
                       
                    </tr>


                ';
              }
               
               ?> 
            </tbody>


            </table>
             
               
            </div>
             <a  href="relatorioGeral.php?tipoRelatorio=relatorioEncomenda" class="btn btn-primary" target="_blank" role="button"> Gera Relatorio</a>
   
        </div>


        <script>
    $(document).ready(function(){
        $('.btnDelete').click(function(){
           var tdh = $(this);
           var id = $(this).attr("id");

            swal({
              title: "Pretende Eliminar o Registo?",
              text: "Uma vez eliminado, os dados nao serao recuperados!",
              icon: "warning",
              buttons: true,
              dangerMode: true
            })
            .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                           url:'deleteencomenda.php',
                            type:'post',
                            data:{
                                pidd:id
                            },
                            success: function(data){
                                tdh.parents('tr').hide();
                            }
                        });
                    swal("Registo Eliminado com Exito!", {
                      icon: "success",
                    });
              } else {
                swal("Operacao Cancelada!");
              }
            });
        });
    });
</script>


<?php
include_once'footergerente.php';
  ?>