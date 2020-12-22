<?php
ob_start();
session_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS


//para el login del usuario
if (isset($_POST['submit'])) {//if hicieron clic en submit
    $ci = mysqli_real_escape_string($con, $_POST['username']);//ATRAPAMOS USER NAME Y PASSWOR
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cdia = mysqli_real_escape_string($con, $_POST['cdi']);
    $periodo_users = mysqli_real_escape_string($con, $_POST['periodo_usuario']);

    //echo($ci);
    //echo($password);
    //echo($cdia);
    echo($periodo_users);

    

    $check_username_query = "SELECT * FROM tbl_usuario WHERE ci = '$ci'"; //consulta sql
    $check_username_run = mysqli_query($con, $check_username_query);//ejecutar consulta
    
    
        
    if (mysqli_num_rows($check_username_run) > 0) {
        $row = mysqli_fetch_array($check_username_run); //atratpa todos los valores de la fila

        $db_ci = $row['ci'];
        $db_password = $row['contrasenia'];
        $db_tipo_role = $row['tipo'];
        $db_tipo_cdi = $row['id_cdi'];
        $db_periodo_academ = $row['id_periodo_usuario'];
        
        //echo $db_ci;
        //echo $db_password;
        //echo $db_tipo_role;
        //echo $db_tipo_cdi;
        //$db_author_image = $row['image'];

        //$password = crypt($password, $db_password);//encriptar la contrasenia 
        /*echo($ci);
        echo($password);
        echo("p/db");
        echo($db_ci );   */    
        //echo($db_tipo_role);
        
        if ($ci == $db_ci && $password == $db_password && $cdia == $db_tipo_cdi && $db_tipo_role == "2" && $periodo_users == $db_periodo_academ) {
            ("estoy adentro");
 
            header('Location: index.php');//enviar a la pagina q deseas
             $_SESSION['username'] = $db_ci;
             $_SESSION['roleSS'] = $db_tipo_role;
             $_SESSION['tipo_cdi'] = $db_tipo_cdi;
             $_SESSION['periodo_ac'] = $db_periodo_academ;
             
             
            // $_SESSION['author_image'] = $db_author_image;
         } 
             
         else {

        
        if ($ci == $db_ci && $password == $db_password && $cdia == $db_tipo_cdi && $periodo_users == $db_periodo_academ ) {
           ("estoy adentro");

            header('Location: index.php');//enviar a la pagina q deseas
            $_SESSION['username'] = $db_ci;
            $_SESSION['roleSS'] = $db_tipo_role;
            $_SESSION['tipo_cdi'] = $db_tipo_cdi;
            $_SESSION['periodo_ac'] = $db_periodo_academ;
            
           // $_SESSION['author_image'] = $db_author_image;
        } else {
            $error = "Usuario, Contraseña, CDI o Período Incorrecto";
        }

        
        if ($ci == $db_ci && $password == $db_password && $cdia == $db_tipo_cdi && $db_tipo_role == "3" && $periodo_users == $db_periodo_academ) {
            ("estoy adentro");
        
            header('Location: index.php');//enviar a la pagina q deseas
             $_SESSION['username'] = $db_ci;
             $_SESSION['roleSS'] = $db_tipo_role;
             $_SESSION['tipo_cdi'] = $db_tipo_cdi;
             $_SESSION['periodo_ac'] = $db_periodo_academ;
             
             
            // $_SESSION['author_image'] = $db_author_image;
         }

         if ($ci == $db_ci && $password == $db_password && $db_tipo_role == "1" && $periodo_users == $db_periodo_academ) {
            ("estoy adentro");
        
            header('Location: index.php');//enviar a la pagina q deseas
             $_SESSION['username'] = $db_ci;
             $_SESSION['roleSS'] = $db_tipo_role;
             $_SESSION['tipo_cdi'] = $db_tipo_cdi;
             $_SESSION['periodo_ac'] = $db_periodo_academ;
             
             
            // $_SESSION['author_image'] = $db_author_image;
         }
    } 
}
    else {
        $error = "Usuario, Contraseña, CDI o Período Incorrecto";
    } 
}

/*Mostrar cdis*/


    
?>
    


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login | CDI</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="img/iconescudoderiobamba.jpg" rel="icon">

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animated.css" rel="stylesheet">
        <!-- estilo para el login -->
        <link href="css/loginAnimado2.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    </head>
    <body>


        <div class="logo-identificador">
            <img src="img/logoescudoGADM.png">
        </div>

        <div class="contenedor-form">
            <div class="toggle">
                <span> <a href="registroUsuarios.php"></a></span>
            </div>

            <div class="formulario" >
                <h2>Login</h2>
                <form action="" method="post"><!--ENVIA DATOS CON METODO POST-->
                    <!--<img src="../img/Logo.png" class="photo">--> 
                    <i class="far fa-user fa-2x cust" ></i> 
                    <input type="text" placeholder="CI" id="inputEmail" name="username" required >

                    <i class="fas fa-unlock fa-2x cust" ></i>
                    <input type="password" placeholder="Contraseña" id="inputPassword" name="password" required >
                    <br>
                    <div class="form-group" >
                        <label for="categories">Seleccione CDI:</label>                        
                        <select class="form-control" name="cdi" id="categories">
                            <?php
                            $sql_cdi = "select * from tbl_cdi";
                            $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                            
                            if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $cdi = $row2['nombre'];
                                    $idcdi = $row2['id'];
                                    echo "<option value='" . $idcdi. "' " .  ">" . ($cdi) . "</option>";
                                }
                            } else {
                                echo "<center><h6>No disponible</h6></center>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group" >
                        <label for="periodo_usuario">Seleccione el Período:</label>                        
                        <select class="form-control" name="periodo_usuario" id="periodo_usuario">
                            <?php
                            $sql_period = "select * from tbl_periodo";
                            $ejecutar = mysqli_query($con, $sql_period);//ejecutar consulta
                            
                            if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $detalle_fin = $row2['fin'];
                                    $detalle_inicio = $row2['inicio'];
                                    $id_perio = $row2['id_periodo'];
                                    echo "<option value='" . $id_perio. "' " .  ">" . ("$detalle_inicio $detalle_fin") . "</option>";
                                }
                            } else {
                                echo "<center><h6>No disponible</h6></center>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="checkbox" >
                        <label>
                            <?php
                            if (isset($error)) {
//                                echo "$error";
                                echo "<div class='alert alert-danger' style='color:red;><i class='fa fa-close'></i>$error</div>";
                            }
                            ?>
                        </label>
                        <br>
                        <!--<i class="fas fa-sign-in-alt fa-2x cust1"></i>-->
                        <input type="submit" value="Iniciar Sesión" name="submit" class="text-center" style = "background-color: #0004ff;">
                </form>
                        
                    </div>

            </div>
            <div class="reset-password">
                <!--<a href="#" class="text-center"><i class="fas fa-question fa-1x cust"></i>  Olvidé mi Contraseña?</a><br>-->
                <!--<a href="registroUsuarios.php" class="text-center"><i class="fas fa-sign-in-alt fa-1x cust1"></i>  Crear Cuenta  </a>-->
                <br>
                <a href="../index.php" class="text-center"><i class="fas fa-sign-out-alt fa-1x cust"  ></i >  Salir   </a>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/loginAnimado.js"></script>
    </body>
</html>
