<?php
    include 'conexion.php';

    $nombre = $_POST['nombreEmpleado-Alta'];
    $apellidoPaterno = $_POST['apellidoPaterno-Alta'];
    $apellidoMaterno = $_POST['apellidoMaterno-Alta'];
    $curp = $_POST['curpEmpleado-Alta'];

    $query = "UPDATE datos_empleados SET nombre='$nombre', apellido_paterno='$apellidoPaterno', apellido_materno='$apellidoMaterno' where Id_empleado='$curp'";
    $verificarCurp = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curp'");
    if(mysqli_num_rows($verificarCurp) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo'
                <script>
                alert("No se pudo actualizar tu información, vuelve a intentarlo");
                window.location = "../../cambioEmpleado.html";
                </script>
            ';
        }else{
            echo'
                <script>
                alert("Se actualizo tu información correctamente");
                window.location = "../../cambioEmpleado.html";
                </script>
            ';
        }
    }else{
        echo'
                <script>
                alert("No se pudo encontrar al usuario o no esta dado de alta");
                window.location = "../../cambioEmpleado.html";
                </script>
            ';
    }
    mysqli_close($conexion);
?>