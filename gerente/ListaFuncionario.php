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
         <h4> Lista de Funcionario</h4>

         <table class="table table-hover" id="data">
              <thead class="thead-light">
                <tr> 

             <th scope="col"><b> Nome  </b> </th>
                  <th scope="col"> Dta Nasc</th>
                  <th scope="col">Genero</th>
                  <th scope="col"> Endereço  </th>
                  <th scope="col"> Contacto </th>
                   
                  <th scope="col">Editar</th>
                  <th scope="col">Apagar</th>
                  
                  </tr>

            </thead>


<tbody>
              
              <?php

              $select=$pdo->prepare("SELECT id_funcionario,nome_funcionario, data_nascimento, genero, endereco,contacto,email from funcionario");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'

                <tr>
                 <td>'.$row->nome_funcionario.'</td>
                 <td>'.$row->data_nascimento.'</td>
                 <td>'.$row->genero.'</td>
                <td>'.$row->endereco.'</td>
                  <td>'.$row->contacto.'</td>
                     
                  <td>
                    <a href="updatefuncionario.php?id_funcionario='.$row->id_funcionario.'" class="btn btn-primary" role="button">Atualizar</a>
                     </td>
                     <td>
                     <button id='.$row->id_funcionario.' class="btn btn-danger btnDelete1">Apagar</button> 
                     </td>
                    </tr>


                ';
              }


              ?>

            </tbody>

            </table>
             
               
            </div>
          </div>


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
                           url:'deletefuncionario.php',
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

         