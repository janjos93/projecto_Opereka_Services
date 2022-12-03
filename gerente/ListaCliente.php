<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';
?>



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
         <h4> Lista de Clientes</h4>


         <table class="table table-hover" id="data">
              <thead class="thead-light">
                <tr> 
 
                  <th scope="col"> Nome Cliente </th>
                  <th scope="col"> Apelido </th>
                  <th scope="col"> Contacto </th>
                  <th scope="col"> Endereço   </th>
                 
              </tr>
            </thead>
            <tbody>
              
              <?php

              $select=$pdo->prepare("SELECT id_cliente, nome_cliente, apelido, contacto, endereco from Cliente");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'

                <tr>
                
                 <td>'.$row->nome_cliente.'</td>
                  <td>'.$row->apelido.'</td>
                   <td>'.$row->contacto.'</td>
                    <td>'.$row->endereco.'</td>
                  
                                       
                    </tr>


                ';
              }


              ?>

            </tbody>





            </table>
             
        </div>
        <a  href="../Admin/relatorioGeral.php?tipoRelatorio=relatorioProduto" class="btn btn-primary" target="_blank" role="button"> Gera Relatorio</a>

    </div>
        <script>
    $(document).ready(function(){
        $('.btnDelete').click(function(){
           var tdh = $(this);
           var id = $(this).attr("id");

            swal({
              title: "Pretende Eliminar o Ciente <?php  echo $_SESSION['nome_cliente']; ?>?",
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
        <!-- content-wrapper ends -->


        <?php

        include_once'footergerente.php'

    ?>