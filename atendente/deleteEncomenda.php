<?php
    include_once'../Admin/conexao.php';
    
    $id=$_POST['pidd'];

    $sql = "DELETE FROM encomenda WHERE id_encomenda=$id";
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