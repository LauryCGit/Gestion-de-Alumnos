<?php

require_once 'C:\xampp19\htdocs\proyecto_2019_carballo_laura\lib\dompdf\include\autoload.inc.php';
require_once 'Conexion.php';

//require_once '../../lib/dompdf/dompdf_config.inc.php';

use Dompdf\Dompdf;

$conx = Conexion::establecer();
$sql = "SELECT id_usuario, user_apellido, user_nombres, user_cuenta, user_correo FROM usuarios ORDER BY user_apellido ASC";

$stmt = $conx->prepare($sql);
$stmt->execute();
        if($stmt->rowCount() == 1){
            $registro = $stmt->fetch();                    
?>

<html lang="es">
    <head>
        <script defer src="js/valida_alumno.js" type="text/javascript"></script>
               
        <title>Usuarios PDF</title>
        <style>
            table {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              font-size: 80%;
              border-collapse: collapse;
              width: 95%;
            }

            th, td {
              text-align: center;
              vertical-align: 50px;
              padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
              background-color: steelblue;;
              color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Usuarios Registrados</h1>
            <div>
                <hr>
                <table id="listaU" class="hidden table table-bordered table-sm table-hover col-lg-11 text-center" >
                    <thead class="">
                        <tr>
                            <th scope="row">Apellido y Nombre</th>
                            <th>Cuenta</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyU">
                        <?php 
                                  
                        ?>
                        <tr>
                            <td><?php echo $registro->user_apellido.", ".$registro->user_nombres?></td>
                            <td><?php echo $registro->user_cuenta ?></td>
                            <td><?php echo $registro->user_correo?></td>
                        </tr>
                        <?php
                                }
                         
                        ?>
                    </tbody>
                    
                 </table>
            </div>
            
              
            
        </div>
    </body>
</html>

<?php

$dompdf->set_paper("A4","portrait");
$dompdf->load_html(utf8_decode(ob_get_clean()));
$dompdf->render();
$pdf = $dompdf->output();
$filaname = "Usuarios.pdf";
$dompdf->stream($filaname, array("Attachment"=>0));

?>