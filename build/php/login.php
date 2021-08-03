<?php
    include 'conexion.php';

    $userName = $_POST['userName-login'];
    $userEmail = $_POST['userEmail-login'];
    $userPassword = $_POST['userPassword-login'];

    $query = "SELECT * FROM datos_login WHERE correo='$userEmail' AND password='$userPassword'";
    $ejecutar = mysqli_query($conexion, $query);

    $filas = mysqli_num_rows($ejecutar);
    if($ejecutar){
        header("location:../../inicio.html");
    }else{
        echo'
        <script>
            alert("Contraseña o Usuario incorrectos");
            window.location = "../../index.html";
        </script>
    ';
    }
    mysqli_close($conexion);
?>