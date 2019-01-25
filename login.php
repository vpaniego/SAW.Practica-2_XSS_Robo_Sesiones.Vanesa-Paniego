<?php
session_start();
if (isset($_GET['registro'])) {
    header("Location: registro.php");
}

if (isset($_GET['login'])) {
    include ("includes/abrirbd.php");
    $sql = "SELECT * FROM usuarios WHERE user ='{$_GET['user']}'";
    $resultado = mysqli_query($link, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        if (password_verify($_GET['passwd'], $usuario['password'])) {

            // Apartado 15. Regeneración del identificador de sesion
            session_regenerate_id();

            $_SESSION['autenticado'] = 'correcto';
            $_SESSION['permisos'] = str_split($usuario['permisos']);
            $_SESSION['user'] = $usuario['user'];
            header("Location:MasterWeb.php");
        } else {
            echo "<BR><BR><BR><CENTER>";
            echo "<h3>Autenticación incorrecta de " . $_GET['user'] . "</h3> <BR>";
            echo "<A href= 'login.php'> Volver a login </A>";
            echo "</CENTER>";
        }
    } else {
        echo "<BR><BR><BR><CENTER>";
        echo "<h3>Autenticación incorrecta de " . $_GET['user'] . "</h3> <BR>";
        echo "<A href= 'login.php'> Volver a login </A>";
        echo "</CENTER>";
    }
    mysqli_close($link);
    exit;
}
?>

<html>
    <head>
        <title> Login </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <br><br><br>
    <center>
        <img src="logo.png" width= 120 height= 60>
        <br><br><br>
        <form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = get>
            <table bgcolor = 'lightgrey'> 
                <tr>
                    <td width= 100> Usuario: </td> 
                    <td> <input type = text name ='user'></td>
                </tr>
                <tr>
                    <td width= 100> Password: </td> 
                    <td> <input type = password name ='passwd'></td>
                </tr>
            </table><br>
            <input type=submit name = 'login' value = "LOGIN"><br><br><br>
            <input type=submit name = 'registro' value = "REGISTRAR USUARIO">
        </form>
    </center>
</body>
</html>