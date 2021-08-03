<?php
    include 'conexion.php';

    $curp = $_POST['curp-comprobante'];
    $fecha = $_POST['fecha-comprobante'];
    $uuid = $_POST['uuid-comprobante'];
    $quincena = $_POST['quincenaPeriodo'];
    $monto = $_POST['montoNeto'];

    $query = "INSERT INTO comprobantes(Id_empleado, fecha, UUID, quincena_br, monto_neto)
              VALUES('$curp','$fecha', '$uuid', '$quincena', '$monto')";

     $verificarCurp = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curp'");
     if(mysqli_num_rows($verificarCurp) > 0){
         $ejecutar = mysqli_query($conexion, $query);
         if(!$ejecutar){
            echo'
            <script>
                alert("No se pudo registrar el comprobante, intentelo de nuevo");
                window.location = "../../comprobantes.html";
            </script>
        ';
         }else{
            echo'
            <script>
                alert("Comprobante registrado con exito");
                window.location = "../../comprobantes.html";
            </script>
        ';
         }
     }else{
        echo'
        <script>
            alert("El usuario no esta registrado o esta mal el curp, favor de verificar");
            window.location = "../../comprobantes.html";
        </script>
    ';
     }
    
?>