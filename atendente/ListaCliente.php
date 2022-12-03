<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';

?>


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
          <div class="row">
         <h4> Lista de Clientes</h4>

         
  </div>
  <form method="post">
         <table class="table table-hover" id="lista-cliente">
              <thead class="thead-light">
                <tr> 

                  <th scope="col"><b> Identificador</b> </th>
                  <th scope="col"> Nome Cliente </th>
                  <th scope="col"> Apelido </th>
                  <th scope="col"> Contacto </th>
                  <th scope="col"> Endereço   </th>
                  <th scope="col">Editar</th> 
                  <th scope="col">Apagar</th>
              </tr>
            </thead>
            <tbody>
              
              <?php

              $select=$pdo->prepare("SELECT id_cliente, nome_cliente, apelido, contacto, endereco from Cliente");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'

                <tr>
                <td>'.$row->id_cliente.'</td>
                 <td>'.$row->nome_cliente.'</td>
                  <td>'.$row->apelido.'</td>
                   <td>'.$row->contacto.'</td>
                    <td>'.$row->endereco.'</td>
                  
                     <td>
                    <a href="updatecliente.php?id_cliente='.$row->id_cliente.'" class="btn btn-primary" role="button">Atualizar</a>
                     </td>
                     <td>
                     <button id='.$row->id_cliente.' class="btn btn-danger btnDelete1">Apagar</button> 
                     </td>
                    
                    </tr>


                ';
              }


              ?>

            </tbody>





            </table>

    <a  href="relatorioGeral.php?tipoRelatorio=relatorioCliente" class="btn btn-primary" target="_blank" role="button"> Gera Relatorio</a>
   </form>
        </div>
    </div>
<!-- <script>
$(document).ready(function () {
    $('#lista-cliente').DataTable();
});
</script> -->

    <script src="../assets/js/jquery.dataTables.min.js"></script>
 <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
       <script>
    $(document).ready(function(){
        $('.btnDelete1').click(function(){
           var tdh = $(this);
           var id = $(this).attr("id");

            swal({
              title: "Pretende Eliminar o Cliente?",
              text: "Uma vez eliminado, os dados nao serao recuperados!",
              icon: "warning",
              buttons: true,
              dangerMode: true
            })
            .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                           url:'deletecliente.php',
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

 </div>
        <!-- content-wrapper ends -->

         <?php


         include_once'footer.php'
     ?>