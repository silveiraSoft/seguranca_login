<?php

//session_start();
require_once 'funcoes.php';
//echo $_POST['dadoEncriptado'];
//exit();

$dadoDescritadoAjax = descriptar(filter_input(INPUT_POST, 'dadoEncriptado', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
//echo $dadoDescritadoAjax;
echo json_encode($dadoDescritadoAjax, true);
