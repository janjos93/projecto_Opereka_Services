<?php
    include_once'conexao.php';
    
    $id=$_POST['pidd'];

    $sql = "DELETE FROM produto WHERE id_produto=$id";
    $delete=$pdo->prepare($sql);

    if($delete->execute()){
        
    }else{
         echo'<script type="text/javascript">
                jQuery(function validation(){

                        swal({
                            title: "Erro!",
                            text: "Erro ao eliminar os dados!",
                            icon: "error",
                            button: "Ok!",
                        });

                    });
                </script>';
    }
?>