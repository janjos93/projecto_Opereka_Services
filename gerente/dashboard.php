<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'headergerente.php';


$select=$pdo->prepare("select count(id_funcionario) as 'Total de Funcionario' from funcionario");



$select->execute();


$row=$select->fetch(PDO::FETCH_ASSOC);


$nrFunc=$row['Total de Funcionario'];


$select=$pdo->prepare("select count(id_cliente) as 'Total de Cliente' from cliente");



$select->execute();


$row=$select->fetch(PDO::FETCH_ASSOC);


$nrCliente=$row['Total de Cliente']

















?>
 
                
<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                
               <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3> <b>Painel de Gerente</h3>
                  
                
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           
                     <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Número total de Funcionários</p>
                      <p class="fs-30 mb-2"><?php echo $nrFunc;?></p>
                  
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Número total de Clientes</p>
                      <p class="fs-30 mb-2"><?php echo $nrCliente;?></p>
                  
                    </div>
                  </div>
                </div>
               
                
                
                 
              </div>

              <h4>Funcionarios Registados</h4>
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
          
          
      
    
                    
          
        </div>



        <!-- content-wrapper ends -->

        <?php
        include_once'footergerente.php';
      ?>