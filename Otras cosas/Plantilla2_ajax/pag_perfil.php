<?php
    // Start the session
    session_start();
    if (isset($_SESSION['nombre']) == false){
        ?> 
        <script type="text/javascript">
            alert("Debe iniciar sesión");
            window.location.replace("index.php");
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagenes/m.ico" type="image/x-icon" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/control.js"></script>
    <title>..::Miguel Magdalena::..</title> 
</head>

<body >
    <div class="container-fluid">
        <header class="header">
            <a class="header2" href="#">
                Laboratorio 5 
                <span class='dotcom'>Miguel Magdalena</span>
            </a>
            <div >
                RECICLANDO CÓDIGO :P
            </div>

            <div class="header3" id="menu_header3">

                <a href="index.php"><button class="dropbtn" >   INICIO</button></a>

                <?php 
                if (isset($_SESSION['nombre'], $_SESSION['rol'])){
                ?>

                    <?php 
                    if ($_SESSION['rol'] == 'preparador'){
                    ?>

                        <a href="pag_registro.php"><button class="dropbtn" >   REGISTRO USUARIO</button></a>
                        <a href="pag_eliminar.php"><button class="dropbtn" >   ELIMINAR USUARIOS</button></a>

                        <div class="dropdown ">
                            <button class="dropbtn">LISTAR USUARIOS▼</button>
                            <div class="dropdown-content">
                                <a href="pag_listar_estudiantes.php"  >Listar Estudiantes</a>
                                <a href="pag_listar_preparadores.php" >Listar Preparadores</a>
                                <a href="pag_listar_todos.php">Listar Todos</a>
                            </div>
                        </div>

                    <?php
                    } ?> 

                    <div class="dropdown active">
                        <button class="dropbtn active" id="inicio_sesion2">Bienvenido <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']?> ▼</button>
                        <div class="dropdown-content">
                            <a class="active" href="pag_perfil.php" >Perfil</a>
                            <a class="active" href="index.php" id="cerrar_session">Cerrar Sesión ► </a>
                        </div>
                    </div>
                <?php
                } ?>
                <a href="javascript:void(0);" class="icon"><button class="dropbtn" >☰ </button></a> 
                <img id="loading1" src="imagenes/loading1.gif" alt="loading" height="42" width="42">  
            </div>

        </header> 
    </div>

    <div class="container-fluid">
    
        <form  id="ajax_pag_listar_perfil">
        
            <fieldset class="blue">
                
                <legend id="page1">Perfil:</legend>

                    <div class="table-responsive" id="response"> </div>

                <input type="submit" value="Consultar" ></th>

            </fieldset>
            
        </form>

        <form  id="ajax_modificar_perfil" style="display: none;">
    
            <fieldset class="blue">
            <legend id="page1">Información:</legend>
                <table >
                    <tr >
                        <th>Rol:</th>
                        <th><input type="text" name="rol" value="estudiante" disabled></th>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <th><input type="text" name="nombre" minlength="4" maxlength="20" ></th>
                    </tr>
                    <tr>
                        <th>Apellido:</th>
                        <th><input type="text" name="apellido" minlength="4" maxlength="20" ></th>
                    </tr>
                    <tr>
                        <th>Correo:</th>
                        <th><input type="email" name="correo" ></th>
                    </tr>
                    <tr>
                        <th>Cedula:</th>
                        <th><input type="number" name="cedula" max="99999999" ></th>
                    </tr>
                    <tr>
                        <th>Contraseña:</th>
                        <th><input type="password" name="contrasena" ></th>
                    </tr>         
                                       
                
                </table>

            </fieldset>
            <input type="submit" value="Modificar" ></th>
            
        </form>

        

    </div>



    <footer class="black italic full footer">
        <p >Hecho por Miguel Magdalena.</p>
        <p Información de contácto <a href="mailto:miguelangelmagdalena@gmail.com"> miguelangelmagdalena@gmail.com</a></p>
    </footer>


</body>
</html>