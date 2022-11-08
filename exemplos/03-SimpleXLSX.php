<?php

include("../bibliotecas/03-ler_arquivo_xls/SimpleXLSX.php");


 if ( $xlsx = SimpleXLSX::parse('03-exemplo_arquivo.xlsx')) {
	 
	 
	  $header_values = $rows = [];
                                  
                                      foreach ( $xlsx->rows() as $k => $r ) {
                                          if ( $k === 0 ) {
                                              $header_values = $r;
                                              continue;
                                          }
                                          $rows[] = array_combine( $header_values, $r );
                                      }
                                      
                                      // array dos dados.
                                  
								  
								  echo('<table>');
                                  for ($h = 0; $h < count($rows); $h++){
  
									 // AS COLUNAS TEM QUE TER O MESMO NOME DA PLANILHA
                                      $coluna_1                 = $rows[$h]["Coluna 1"];
									  $coluna_2                 = $rows[$h]["Coluna 2"];
                                      $coluna_3                 = $rows[$h]["Coluna 3"];
									  $coluna_4                 = $rows[$h]["Coluna 4"];
									  
									  echo('
									  <tr>
									  
										<td>'.$coluna_1.'</td>
										<td>'.$coluna_2.'</td>
										<td>'.$coluna_3.'</td>
										<td>'.$coluna_4.'</td>
									  
									  </tr>
									  ');
									  
									  
								  }
								  echo('</table>');
								  
								  
								  
	 
 }


?>