<?php
    include 'conexion.php';

    $curp = $_POST['curp-comprobante'];
    $fecha = $_POST['fecha-comprobante'];
    $uuid = $_POST['uuid-comprobante'];
    $quincena = $_POST['quincenaPeriodo'];
    $monto = $_POST['montoNeto'];

    $query = "UPDATE comprobantes SET fecha='$fecha', UUID='$uuid', quincena_br='$quincena', monto_neto='$monto' where Id_empleado='$curp'";

     $verificarCurp = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curp'");
     if(mysqli_num_rows($verificarCurp) > 0){
         $ejecutar = mysqli_query($conexion, $query);
         if(!$ejecutar){
            echo'
            <script>
                alert("No se pudo actualizar el comprobante, intentelo de nuevo");
                window.location = "../../actualizarComprobantes.html";
            </script>
        ';
         }else{
            echo'
            <script>
                alert("Comprobante actualizado con exito");
                window.location = "../../actualizarComprobantes.html";
            </script>
        ';
         }
     }else{
        echo'
        <script>
            alert("El usuario no esta registrado o esta mal el curp, favor de verificar");
            window.location = "../../actualizarComprobantes.html";
        </script>
    ';
     }
    
?>