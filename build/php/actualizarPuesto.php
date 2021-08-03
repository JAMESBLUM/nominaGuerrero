<?php
    include 'conexion.php';
    $curp = $_POST['curpPuesto'];
    $depto = $_POST['departamento'];
    $ubicacion = $_POST['ubicacionDepto'];
    $fecha = $_POST['fechaIngreso'];

    $query = "UPDATE ubicacion_empleado SET departamento='$depto', ubicacion='$ubicacion', fecha_ingreso='$fecha' where Id_empleado='$curp'";
    
    $verificaUsuario = mysqli_query($conexion, "SELECT * FROM ubicacion_empleado WHERE Id_empleado='$curp'");
    if(mysqli_num_rows($verificaUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo'
                <script>
                    alert("No se pudo actualizar tu información, intentalo de nuevo");
                    window.location = "../../cambioEmpleado.html";
                </script>
            ';
        }else{
            echo'
                <script>
                    alert("Datos actualizados correctamente");
                    window.location = "../../cambioEmpleado.html";
                </script>
            ';
        }
    }else{
        echo'
                <script>
                    alert("No se encontro ningun dato del usuario, probablemente no existe o ingreso mal el curp");
                    window.location = "../../cambioEmpleado.html";
                </script>
            ';
    }
    mysqli_close($conexion);
?>