<?php
    include 'conexion.php';

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $newPassword = $_POST['password'];
    
    $query = "UPDATE datos_login SET password = '$newPassword' WHERE correo = '$email' AND nombre_usuario = '$usuario'";
    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM datos_login WHERE correo ='$email'");
    if(mysqli_num_rows($verificarUsuario) > 0){
        $ejecutar = mysqli_query($conexion, $query);
        if(!$ejecutar){
            echo '
            <script>
                alert("No funciono");
                window.location = "../../restablecerPassword.html";
            </script>
        ';
        }else{
            echo '
            <script>
                alert("si funciono");
                window.location = "../../index.html";
            </script>
        ';
        }
    }else{
        echo '
            <script>
                if(confirm("El usuario no existe, ¿Quieres registrarte?")){
                    window.location = "../../crearUsuario.html";     
                }else{
                    window.location = "../../index.html";
                }
            </script>
            ';  
    }
    mysqli_close($conexion);
?>