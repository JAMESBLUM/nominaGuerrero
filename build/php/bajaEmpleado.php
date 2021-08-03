<?php
    include 'conexion.php';

    $nombre = $_POST['nombreEmpleado-Alta'];
    $apellidoPaterno = $_POST['apellidoPaterno-Alta'];
    $apellidoMaterno = $_POST['apellidoMaterno-Alta'];
    $curp = $_POST['curpEmpleado-Alta'];

    $query = "DELETE FROM datos_empleados WHERE Id_empleado = '$curp' AND nombre='$nombre'";

    $verificarCurp = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curp'");
    if(mysqli_num_rows($verificarCurp) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo'
            <script>
                alert("No se pudo eliminar al usuario, intentalo de nuevo");
                window.location = "../../bajaEmpleado.html";
            </script>
        ';
        }else{
            echo'
            <script>
                alert("El usuario ha sido eliminado con exito");
                window.location = "../../bajaEmpleado.html";
            </script>
        ';
        }
    }else{
        echo'
        <script>
            alert("El usuario no existe o ya ha sido eliminado");
            window.location = "../../bajaEmpleado.html";
        </script>
    ';
    }
    mysqli_close($conexion);
?>