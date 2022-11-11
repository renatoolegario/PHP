
<?php

if (!isset($_SESSION)) { 
    session_start();

//echo print_r($_SESSION);
    
}




$conn = mysqli_connect('ENDEREÇO BANCO DE DADOS','usuario','senha!','tabela');


if (!$conn) {

    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 


?>



<?php
// RECEBE A REQUISIÇÃO, FAZ A CONSULTA NO BANCO DE DADOS, E PRINTA O RESULTADO COM O PRINT_R
if(empty($_GET['id_pes'])){
    
    $retorno = array(
         "status" => "0"
         );
    
}else{
   

     $id_msg =  $_GET['id_pes'];
   
     
    $sql = mysqli_query($conn," 
    
    SELECT 
         id, nome FROM id ='".$id_msg."' ");
 
    $dados = [];
    while($row = mysqli_fetch_array($sql)){
        
       $id = $row[0];
       $nome = $row[1];
       
       
       $retorno = array(
         "id" => $id,
         "nome" => $nome
         );
         
         array_push($dados,$retorno);
       
    }
    
    $sql_close = mysqli_close($sql);
    


     $json = json_encode($dados, true);
                  
                print_r($json);
}    
   

?>