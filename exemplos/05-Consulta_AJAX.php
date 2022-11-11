<html>

<head>
</head>

<body>

	<select class="form-control" onChange="selecionar_empresa();" id="empresa">
	  
	  <option value="1"> Empresa 01 </option>
	  <option value="2"> Empresa 02 </option>
	  
	</select>

 <script>
            
            function selecionar_empresa(){
                
                var id = document.getElementById("empresa").value;
               
				//var url = ENDEREÇO DA API IGUAL EXEMPLO ABAIXO, NO NOSSO CASO VAI SER 05-API_Consulta_AJAX.php
                var url = "https://irrigacoas.multiplasfr.com.br/paginas/cotacoes-insumos/10-API-consulta_insumos.php?id_pes="+id;
                let request = new XMLHttpRequest();
                request.open("GET", url, false);
                request.send();
                dados = JSON.parse(request.responseText);
				// DADOS RECEBE A RESPOSTA DO REQUEST.SEND E LÊ TUDO QUE ESTA PRINTADO PELO PRINT_R QUE ESTA NA RESPOSTA DO ARQUIVO 05-API_Consulta_AJAX.php 
				
                var id = dados["id"];
                var nome = dados["nome"];
                
                
            }
            
            
            
        </script>

</body>

</html>