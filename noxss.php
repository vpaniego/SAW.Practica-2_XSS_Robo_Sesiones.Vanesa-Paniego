<html>
<head>
    <title>XSS </title>
    <meta charset="UTF-8">
</head>
<body>
<br><br><br>
<center>
    <img src="logo.png" width=120 height=60>
    <br><br><br>
    <form action='<?php "{$_SERVER['PHP_SELF']}" ?>' method=get>
        <table bgcolor='lightgrey'>
            <tr>
                <td><input type=text name='dato1'></td>
                <td><input type=submit name='submit1' value='DATO1'></td>
            </tr>
        </table>
        <BR>
    </form>
    <form action='<?php "{$_SERVER['PHP_SELF']}" ?>' method=get>
        <table bgcolor='lightgrey'>
            <tr>
                <td><input type=text name='dato2'></td>
                <td><input type=submit name='submit2' value='DATO2'></td>
            </tr>
        </table>
        <BR>
    </form>
    <form action='<?php "{$_SERVER['PHP_SELF']}" ?>' method=get>
        <table bgcolor='lightgrey'>
            <tr>
                <td><input type=radio name='dato3' value="Rojo"> Rojo <input type=radio name='dato3' value="Verde">
                    Verde
                </td>
                <td><input type=submit name='submit3' value='DATO3'></td>
            </tr>
        </table>
        <BR>
    </form>
    <form action='<?php "{$_SERVER['PHP_SELF']}" ?>' method=get>
        <table bgcolor='lightgrey'>
            <tr>
                <td><input type=radio name='dato4' value="blue"> Azul <input type=radio name='dato4' value="yellow">
                    Amarillo
                </td>
                <td><input type=submit name='submit4' value='DATO4'></td>
            </tr>
        </table>
    </form>
    <br><br><br><br>

    <?php
    if (isset($_GET['submit1'])) {
        // TODO 5: Escapado HTML
        $dato1 = htmlspecialchars($_GET['dato1']);
        // TODO 6: Comprobar que contiene exclusivamente caracteres alfabéticos (función ctype_alpha)
        $correcto1 = ctype_alpha($dato1);
        if ($correcto1) {
            echo "Introducido el dato 1: ";
            echo $dato1;
        } else {
            echo "Introducido el dato 1: ";
            echo "Validacion de DATO1 no correcta.";
        }
        exit;
    }

    if (isset($_GET['submit2'])) {
        // TODO 5: Escape HTML
        $dato2 = htmlspecialchars($_GET['dato2']);
        // TODO 6: Comprobar que el dato de entrada es un valor numérico (función is_numeric)
        $correcto2 = is_numeric($dato2);
        if ($correcto2) {
            echo "<form method = get> Introducido el dato 2: <input type = text name='nuevodato2' value = '{$dato2}'>";
        } else {
            echo "Introducido el dato 2: ";
            echo "Validacion de DATO2 no correcta";
        }
        exit;
    }

    if (isset($_GET['submit3'])) {
        // TODO 5: Escape HTML
        $dato3 = htmlspecialchars($_GET['dato3']);
        // TODO 6: Comprobar que sólo valen las cadenas "Rojo" y "Verde"
        $color = array("Rojo", "Verde");
        $correcto3 = in_array($dato3, $color);
        if ($correcto3) {
            echo "Introducido el dato 3: ";
            echo $dato3;
        } else {
            echo "Introducido el dato 3: ";
            echo "Validacion de DATO3 no correcta";
        }
        exit;
    }

    if (isset($_GET['submit4'])) {
        // TODO 5: Escape HTML
        //$dato = $_GET['dato4'];
        // Escape del dato con la funcion htmlspecialchars (en atributos HTML no funciona)
        $dato4 = htmlspecialchars($_GET['dato4']);
        // Escape del dato reemplazando los caracteres por su codigo Hexadecimal (siempre que no sean numéricos)
        //$dato4HH = str_replace(' ', '&#x20;', $dato4);

        // TODO 6: Comprobar que sólo valen las cadenas "blue" y "yellow"
        $color = array("blue", "yellow");
        $correcto4 = in_array($dato4, $color);
        if ($correcto4) {
            echo "<p style=color:$dato4> MI COLOR FAVORITO </p>";
        } else {
            echo "Validacion de DATO4 no correcta";
        }
        exit;
    }
    ?>
</center>
</body>
</html>

