<?php

include("../bibliotecas/02-exportar_xls/SimpleXLSXGen.php");

// Titulo
 $books = [    ['Coluna 1', 'Coluna 2', 'Coluna 3']    ];

	$sql = mysqli_query($conn,"
	
		SELECT coluna_1, coluna_2, coluna_3 FROM tabela_de_dados
	
	");
	
	
	while($row = mysqli_fetch_array($sql)){
		
		$dados = [$row[0],$row[1], $row[2]];
		
		// a cada loop cadastra os $dados da leitura do banco de dados na array $books
		array_push($books,$dados);
	}
	
	mysqli_close($sql);


$endereco_pasta = "";
$nome_arquivo = "arquivo.xlsx";
                            
$xlsx = SimpleXLSXGen::fromArray( $books );
$xlsx->saveAs($endereco_pasta.$nome_arquivo); // or downloadAs('books.xlsx') or $xlsx_content = (string) $xlsx 

?>