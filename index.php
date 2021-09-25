<?php

//session_start();
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
    -->
    <div>
        <?php
        criarChaveJSPHP();
        echo "<hr>";
        $texto = "NÁPOLES";
        $encriptado = encriptar($texto);
        echo "<pre>";
        echo "encriptado {$texto}:" . $encriptado;
        echo "<pre>";
        echo "desencriptado:" . descriptar($encriptado);
        require_once 'view.login.php';
        //$variavelPhp = "<script>document.write(chavePhp)</script>" ?? '';
        //$variavelPhp = "<script>sessionStorage.getItem('chavePhpsession')</script>" ?? '';
        //echo 'Olá' . $variavelphp ?? '';
        ?>
    </div>
      
    <script type="text/javascript" src="funcoes.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
