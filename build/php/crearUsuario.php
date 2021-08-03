<?php
    include 'conexion.php';

    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = "INSERT INTO datos_login(correo, nombre_usuario, password)
                VALUES('$email','$usuario','$password')";

    //====== VERIFICAR QUE NO SE REPITA EL email      
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM datos_login WHERE correo='$email'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("El usuario ya existe, ingresa otro.");
                window.location = "../../crearUsuario.html";
            </script>
        ';
        exit(); //Termina el script actual sin que se ejecute lo demas debajo de el
        mysqli_close($conexion);
    }

    //====== EJECUTA EL QUERY PARA AGREGAR EL USUARIO
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo'
        <script>
            alert("Usuario registrado exitosamente");
            window.location = "../../index.html";
        </script>
    ';
    }else{
        echo'
        <script>
            alert("No se pudo registrar al usuario");
            window.location = "../../crearUsuario.html";
        </script>
    ';
    }
    mysqli_close($conexion);
?>