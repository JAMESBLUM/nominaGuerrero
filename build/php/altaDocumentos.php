<?php
    include 'conexion.php';
    $curpDocumentos = $_POST['curpDocumentos'];
    $rfc = $_POST['rfcDocumentos'];
    $docIdentidad = $_POST['identidadDoc'];

    $query = "INSERT INTO documentos_empleados(Id_empleado, rfc, documento_identidad)
            VALUES('$curpDocumentos','$rfc', '$docIdentidad')";
                
    $verificaUsuario = mysqli_query($conexion, "SELECT * FROM datos_empleados WHERE Id_empleado='$curpDocumentos'");
    if(mysqli_num_rows($verificaUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo'
            <script>
                alert("No se pudo registrar documentación, intente de nuevo");
                window.location = "../../altaEmpleado.html";
            </script>
        ';
        }else{
            echo'
            <script>
                alert("Documentación registrada con exito");
                window.location = "../../altaEmpleado.html";
            </script>
        ';
        }
        exit();
        mysqli_close($conexion);
    }else{
        echo'
                <script>
                    alert("El usuario no existe o ingreso mal el curp");
                    window.location = "../../altaEmpleado.html";
                </script>
            ';
    }
?>