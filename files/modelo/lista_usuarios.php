<?php

require_once 'C:\xampp\htdocs\proyecto_2019_carballo_laura\lib\dompdf/autoload.inc.php';
require_once 'Conexion.php';

use Dompdf\Dompdf;

$con= Conexion::establecer();
$sql = 'SELECT user_apellido, user_nombres, user_cuenta, user_correo FROM usuarios ORDER BY user_apellido ASC';

$stmt = $con->prepare($sql);
$stmt->execute();      

$dompdf = new Dompdf();

$html = '
    <body style="font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;">
    <h1 style="text-align: center;">Usuarios Registrados</h1>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <table style="border: 1px solid steelblue; font-size: 17px; width: 1000px;" class="hidden table table-bordered table-sm table-hover text-center">
        <thead style="text-align: center; background-color: steelblue; color: white;" class="">
            <tr>
                <th scope="row">Apellido</th>
                <th>Nombre</th>
                <th>Cuenta</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody">
          ';
	while ($user=$stmt->fetch()) { 		
	$html .= '
            <tr style="text-align: center;" >
                <td>'.$user->user_apellido.'</td>
                <td>'.$user->user_nombres.'</td>
                <td>'.$user->user_cuenta.'</td>
                <td>'.$user->user_correo.'</td>
            </tr>
	';
	}
        '</tbody>
    </table> 
</body>';



$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Listado de Usuarios",array("Attachment"=>0));

?>
