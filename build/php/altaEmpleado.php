<?php
    include 'conexion.php';

    $nombre = $_POST['nombreEmpleado-Alta'];
    $apellidoPaterno = $_POST['apellidoPaterno-Alta'];
    $apellidoMaterno = $_POST['apellidoMaterno-Alta'];
    $curp = $_POST['curpEmpleado-Alta'];

    $query = "INSERT INTO datos_empleados(Id_empleado, nombre, apellido_paterno, apellido_materno)
            VALUES('$curp','$nombre', '$apellidoPaterno', '$apellidoMaterno')";
    $verificarCurp = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curp'");
    if(mysqli_num_rows($verificarCurp) > 0){
        echo'
        <script>
            alert("El usuario ya ha sido dado de alta");
            window.location = "../../altaEmpleado.html";
        </script>
    ';
    exit();
    mysqli_close($conexion);
    }

    //Ejecuta el query
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo'
            <script>
                alert("Empleado dado de alta con exito, Procede a enviar tu documentación");
                window.location = "../../altaEmpleado.html";
            </script>
        ';
    }else{
        echo'
            <script>
                alert("No se pudo dar de alta, intentelo de nuevo");
                window.location = "../../altaEmpleado.html";
            </script>
        ';
    }
    mysqli_close($conexion);
?>