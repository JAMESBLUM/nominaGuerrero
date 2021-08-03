<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=PT+Serif+Caption:ital@0;1&family=Roboto:wght@400;700&display=swap"
            rel="stylesheet">
        <title>Nominas Guerrero</title>
        <link rel="stylesheet" href="build/css/app.css">
    </head>
    
    <body class="bg-gris">
    <header class="header">
        <div class="contenido-header contenedor">
            <div class="logo-header">
                <picture>
                    <a href="inicio.html"><img src="build/img/logoGuerrero2.jpg" alt=""></a>
                </picture>
            </div>
            <div class="navegacion">
                <nav class="nav-principal">
                    <a href="comprobantes.html">Comprobantes</a>
                    <a href="index.html">Cerrar Sesión</a>
                    <a href="inicio.html">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="32"
                            height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#70A1D7" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </header>
        <main>
            <h4 class="titulo centrar-texto">Comprobantes Disponibles</h4>

            <div class="comprobantes-tabla-contenido contenedor">
            <table class="tabla-MostrarDatos">
            <tbody>
                <tr class="titulos-column">
                    <td class="centrar-texto">Curp</td>
                    <td class="centrar-texto">Fecha</td>
                    <td class="centrar-texto">UUID</td>
                    <td class="centrar-texto">Quincena</td>
                    <td class="centrar-texto">Monto Neto</td>
                </tr>
                <?php
                    include 'build/php/conexion.php';
                    $query = "SELECT * FROM comprobantes";
                    $ejecutar = mysqli_query($conexion, $query);
                    while($mostrar = mysqli_fetch_array($ejecutar)){
                  ?>
                 <tr>
                      <td><?php echo $mostrar['Id_empleado'] ?></td>
                      <td><?php echo $mostrar['fecha'] ?></td>
                      <td><?php echo $mostrar['UUID'] ?></td>
                      <td><?php echo $mostrar['quincena_br'] ?></td>
                      <td><?php echo $mostrar['monto_neto'] ?></td>
                 </tr>
                    <?php 
                      }
                      mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>



            <div class="cambios-eliminacion contenedor2">
                <a href="comprobantes.html" class="btn-principal">Registrar Comprobantes</a>
                <a href="actualizarComprobantes.html" class="btn-secundario">Actualizar Comprobantes</a>
            </div>
        </main>
        <footer class="footer">
            <div class="contenedor">
                <p class="centrar-texto"><b>© 2021. Secretaría de Finanzas</b></p>
            </div>
        </footer>
    </body>
    
    </html>