<?php

include("../bibliotecas/01-converter_pdf/autoload.php");

				

				use Dompdf\Dompdf;
                $dompdf = new Dompdf();				
                $html = file_get_contents('exemplo_html_para_pdf.html');
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4');
                $dompdf->render();
                $dompdf->stream();
                echo $html;

?>