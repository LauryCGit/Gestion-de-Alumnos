<?php

require_once 'C:\xampp\htdocs\proyecto_2019_carballo_laura\lib\dompdf/autoload.inc.php';
require_once 'Conexion.php';

use Dompdf\Dompdf;

$con= Conexion::establecer();
$sql = 'SELECT alu_apellido, alu_nombres, alu_dni, alu_correo FROM alumnos ORDER BY alu_apellido ASC';

$stmt = $con->prepare($sql);
$stmt->execute();      

$dompdf = new Dompdf();

$html = '
    <body style="font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;">
    <h1 style="text-align: center;">Alumnos Registrados</h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table style="border: 1px solid steelblue; font-size: 17px; width: 1000px;" class="hidden table table-bordered table-sm table-hover text-center">
        <thead style="text-align: center; background-color: steelblue; color: white;" class="">
            <tr>
                <th scope="row">Apellido</th>
                <th>Nombre</th>
                <th>Dni</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody">
          ';
	while ($alum = $stmt->fetch()) { 		
	$html .= '
            <tr style="text-align: center;" >
                <td>'.$alum->alu_apellido.'</td>
                <td>'.$alum->alu_nombres.'</td>
                <td>'.$alum->alu_dni.'</td>
                <td>'.$alum->alu_correo.'</td>
            </tr>
	';
	}
        '</tbody>
    </table> 
</body>';



$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Listado de Alumnos",array("Attachment"=>0));

?>


