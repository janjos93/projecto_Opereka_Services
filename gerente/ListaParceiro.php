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
                  <h4><b> Painel de Gerente</h4>
                <i class="mdi mdi-calendar"></i><?php $agora = date('d/m/Y H:i');
                  echo $agora?></b>
                </div>
                 
              </div>
            </div>
          </div>
          <div class="row">
         <h4> <b>Lista de Parceiro</b></h4>
        
            <table class="table table-hover" id="data">
              <thead class="thead-light">
                <tr> 
 
                  <th scope="col"> Nome Parceiro </th>
                  <th scope="col"> Cidade </th>
                  <th scope="col"> Endereco </th>
                  <th scope="col"> Email </th>
                  <th scope="col"> Contacto </th>
                  <th scope="col">Editar</th>
                  <th scope="col">Apagar</th>
                  </tr>

            </thead>
            <tbody>
              
              <?php

              $select=$pdo->prepare("SELECT id_parceiro, nome_parceiro, cidade, endereco, email, contacto from parceiro");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'

                <tr>
           
                 <td>'.$row->nome_parceiro.'</td>
                  <td>'.$row->cidade.'</td>
                   <td>'.$row->endereco.'</td>
                    <td>'.$row->email.'</td>
                     <td>'.$row->contacto.'</td>
                     <td>
                    <a href="updateparceiro.php?id_parceiro='.$row->id_parceiro.'" class="btn btn-primary" role="button">Atualizar</a>
                     </td>
                     <td>
                     <button id='.$row->id_parceiro.' class="btn btn-danger btnDelete">Apagar</button> 
                     </td>
                    </tr>


                ';
              }


              ?>

            </tbody>





            </table>
             
               
            </div>
          </div>
        
          <div class="row">
            
                    
          
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
                           url:'deleteparceiro.php',
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