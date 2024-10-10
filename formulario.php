<?php

    session_start();

    $nombre = $email = $edad = '';

    $error_nombre = $error_email = $error_edad = FALSE;


    $errores = '';
    if(!empty($_POST['paso'])){


        if(empty($_POST['nombre']))
        {
            $errores = "<span class=\"error\">¡ERROR! No se ha enviado ningún nombre.<br/></span>";
            $error_nombre = TRUE;
        } 
        else if(!preg_match("/^[a-zA-Z]+[a-zA-Z_]{3,20}/",$_POST['nombre']))
        {
            $errores = "<span class=\"error\">¡ERROR! Nombre no valido.<br/></span>";
        }

        if(empty($_POST['email']))
        {
            $errores .= "<span class=\"error\">¡ERROR! No se ha enviado ningún email.<br/></span>";
            $error_email = TRUE;
        } 
        else if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/",$_POST['email']))
        {
            $errores = "<span class=\"error\">¡ERROR! Email no valido.<br/></span>";
        }

        if (empty($_POST['edad'])) {

            $errores .= "<span class=\"error\">¡ERROR! No se ha enviado ningún edad.<br/></span>";
            $error_edad = TRUE;
        }

        if($errores == '')
        {
            $_SESSION['usuario'] = $_POST['nombre'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['edad'] = $_POST['edad'];
            $_SESSION['pais'] = $_POST['pais'];
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .error_nombre, .error_email, .error_edad, .error_pais{
            color:#ff0000;
        }


    </style>
</head>
<body>
    <form action="formulario.php" method="post">
        <input type="hidden" name="paso" value="1"/>
        <?php echo $errores; ?>
        <div class="campo">
            <label class="<?php echo $error_nombre; ?>" for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre de la persona...">
        </div>

        <div class="campo">
            <label class="<?php echo $error_email; ?>" for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Email...">
        </div>

        <div class="campo">
            <label class="<?php echo $error_edad; ?>" for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" value="<?php echo $edad; ?>" placeholder="Edad...">
        </div>

        <div class="campo">
            <label for="pais">Pais:</label>
            <select name="pais" id="pais">
                <option value="ES">España</option>
                <option value="FR">Francia</option>
                <option value="EN">Inglaterra</option>
                <option value="EU">Estados Unidos</option>
                <option value="RS">Rusia</option>
            </select>
        </div>

        <div class="campo">
            <input type="submit">
        </div>
    </form>
</body>
</html>