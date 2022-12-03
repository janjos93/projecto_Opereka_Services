<?php 
include_once'../Admin/conexao.php';
session_start();
include_once'header.php';
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
          <div class="row">
         <h3>  Lista de produtos</h3>
             <table class="table table-hover" id="data">
              <thead class="thead-light">
                <tr> 

                   
                  <th scope="col"> Nome Produto </th>
                  <th scope="col">  Preço   </th>
                  <th scope="col">  Validade </th>
                  <th scope="col">Quantidade</th>
                  <th scope="col"> Categoria </th>
                  <th scope="col"> Parceiro </th>
                  <th scope="col">Editar</th>
                  <th scope="col">Apagar</th>
                  </tr>

            </thead>
            <tbody>

            	<?php

              $select=$pdo->prepare("select id_produto,nome_produto,preco,validade,quantidade,categoria,parceiro.nome_parceiro  FROM produto INNER JOIN parceiro on produto.id_parceiro=parceiro.id_parceiro");

              $select->execute();

              while ($row=$select->fetch(PDO::FETCH_OBJ)) {
                echo'

                <tr>
                
                 <td>'.$row->nome_produto.'</td>
                  <td>'.$row->preco.'</td>
                   <td>'.$row->validade.'</td>
                    <td>'.$row->quantidade.'</td>
                     <td>'.$row->categoria.'</td>
                     <td>'.$row->nome_parceiro.'</td>
                     <td>
                    <a href="updateproduto.php?id_produto='.$row->id_produto.'" class="btn btn-primary" role="button">Atualizar</a>
                     </td>
                     <td>
                     <button id='.$row->id_produto.' class="btn btn-danger btnDelete">Apagar</button> 
                     </td>
                    </tr>


                ';
              }
               
               ?> 
            </tbody>


            </table>
             <a  href="../Admin/relatorioGeral.php?tipoRelatorio=relatorioProduto" class="btn btn-primary" target="_blank" role="button"> Gera Relatorio</a>
   
               
            </div>
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
                           url:'deleteproduto.php',
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
include_once'footer.php';
  ?>