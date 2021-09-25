<?php

//session_start();
require_once "funcoes.php";
criarChaveJSPHP();
echo "<hr>";
$encriptado = encriptar("adalberto");
echo "<pre>";
echo "encriptado adalberto:" . $encriptado;
echo "<pre>";
echo "desencriptado:" . descriptar($encriptado);
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
    <input type="password" name="senha" id="senha">
    <input name="acessar" id="acessar" class="btn btn-primary" type="button" value="Acessar">
    <!--
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
    -->
    <script type="text/javascript" src="funcoes.js"></script>
</body>

</html>
