<?php 

ob_start();

require_once '../clases/Conexion.php';
require_once '../clases/Socio.php';

$socio = new Socio(); 

?>

<html lang="es">
    <head>
        <title>Socios</title>
        <style>
            table {
              font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
              font-size: 80%;
              border-collapse: collapse;
              width: 100%;
            }

            th, td {
              text-align: left;
              vertical-align: 50px;
              padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
              background-color: #4CAF50;
              color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Informe PDF de Socios registrados</h1>
            </br>
            <table>
                <thead>
                    <tr>
                        <th>Apellido y Nombre</th>
                        <th>DNI</th>
                        <th>Perfil</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tbody id="tbodyCuentas">
                    <?php
                        $conexion = Conexion::get();
                        $sql="SELECT * from socios";
                        $result=mysqli_query($conexion,$sql);
                        $cont = 0;
                        while($mostrar=mysqli_fetch_array($result)){
                            $cont=$cont+1;
                    ?>
                    <tr>
                        <td><?php echo $mostrar['socio_apellido'].", ".$mostrar['socio_nombres']?></td>
                        <td><?php echo $mostrar['socio_dni'] ?></td>
                        <td><?php echo $mostrar['socio_perfil'] ?></td>
                        <td><?php echo $mostrar['socio_telefono']?></td>
                        <td><?php echo $mostrar['socio_correo']?></td>
                    </tr>
                <?php
                }
                $conexion->close();
                 ?>
                </tbody>
            </table>
            </br>
            <div>
                <div style="text-align: right;">
                    <?php 
                        if($cont > 0) {
                            echo 'Total de registros: '.$cont.'</p>';
                        }else {
                            echo 'No se encontraron resultados para mostrar.</p>';
                        }
                        echo'</h4>';
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
require_once '../../lib/dompdf/dompdf_config.inc.php';
$dompdf = new DOMPDF();
$dompdf->set_paper("A4","portrait");
$dompdf->load_html(utf8_decode(ob_get_clean()));
$dompdf->render();
$pdf = $dompdf->output();
$filaname = "socios.pdf";
$dompdf->stream($filaname, array("Attachment"=>0));

?>