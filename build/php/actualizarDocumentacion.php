<?php
    include 'conexion.php';
    $curpDocumentos = $_POST['curpDocumentos'];
    $rfc = $_POST['rfcDocumentos'];
    $docIdentidad = $_POST['identidadDoc'];

    $query = "UPDATE documentos_empleados SET rfc='$rfc', documento_identidad='$docIdentidad' where Id_empleado='$curpDocumentos'";

    $verificaUsuario = mysqli_query($conexion, "SELECT * FROM documentos_empleados WHERE Id_empleado='$curpDocumentos'");
    if(mysqli_num_rows($verificaUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo'
                <script>
                    alert("No se pudo actualizar tus datos");
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
            alert("No se pudo encontrar ningun dato o ingreso mal el curp");
            window.location = "../../cambioEmpleado.html"; 
        </script>
    ';
    }
?>