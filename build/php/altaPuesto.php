<?php
    include 'conexion.php';
    $curp = $_POST['curpPuesto'];
    $depto = $_POST['departamento'];
    $ubicacion = $_POST['ubicacionDepto'];
    $fecha = $_POST['fechaIngreso'];

    $query = "INSERT INTO  ubicacion_empleado (Id_empleado, departamento, ubicacion, fecha_ingreso)
    VALUES('$curp','$depto', '$ubicacion', '$fecha')";
    
    $verificaUsuario = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curp'");
    if(mysqli_num_rows($verificaUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo'
                <script>
                alert("No se pudo dar de alta tu puesto");
                window.location = "../../altaEmpleado.html";
                </script>
            ';
        }else{
            echo'
                <script>
                alert("Se ha dado de alta tu puesto");
                window.location = "../../altaEmpleado.html";
                </script>
            ';
        }
    }else{
        echo'
                <script>
                alert("El usuario no existe o has ingresado mal el curp, intentalo de nuevo");
                window.location = "../../altaEmpleado.html";
                </script>
            ';
    }
    mysqli_close($conexion);
?>