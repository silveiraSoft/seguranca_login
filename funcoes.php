<?php

function obterChavePHP(): string
{
	if (!isset($_COOKIE["PHPSESSID"])) {
		session_start();
	}
	if (!isset($_SESSION['teste'])) {
		$_SESSION['teste'] = sha1(time()) . sha1(microtime());
	}
	$chavePhp = $_SESSION['teste'] ?? null;
	echo "chavePhp:" . $chavePhp . "<br>";
	return $chavePhp;
}

function criarChaveJSPHP()
{
	echo "<br>Criando chave JS e PHP<br>";
	$chavePhp = obterChavePHP();

	if (isset($chavePhp)) {
?>
		<script>
			var chavePhp = '<?php echo $chavePhp ?? 'Erro na chave php'; ?>';
			console.log("Chave js com o valor vindo da sessão do php com nome valor: chavePhp = " + chavePhp);
		</script>
<?php
	}
}

function Asc(string $dado): int
{
	return ord($dado);
	//return mb_ord("A", "UTF-8")
}

function utf8CharCodeAt($str, $index)
{
	$char = mb_substr($str, $index, 1, 'UTF-8');

	if (mb_check_encoding($char, 'UTF-8')) {
		$ret = mb_convert_encoding($char, 'UTF-32BE', 'UTF-8');
		return hexdec(bin2hex($ret));
	} else {
		return null;
	}
}

function unichr($u)
{
	return mb_convert_encoding('&#' . intval($u) . ';', 'UTF-8', 'HTML-ENTITIES');
}

function encriptar(string $texto): string
{
	$chavePhp = obterChavePHP();

	$mensx = '';
	$l;
	$i;
	$j = 0;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	$ch = $chavePhp;
	$lchavePhp = strlen($chavePhp);
	$ldado = strlen($texto);
	for ($i = 0; $i < $ldado; $i++) {
		$j++;
		$l = (Asc(substr($texto, $i, 1)) + (Asc(substr($ch, $j, 1))));
		if ($j == $lchavePhp) {
			$j = 1;
		}
		if ($l > 255) {
			$l -= 256;
		}
		var_dump($l);
		echo "i: " . $i . " | " . "l: " . $l . " carater: " . unichr($l) . "<br>";
		$mensx .= (chr($l));
		echo $mensx . "<br>";
		//$mensx += unichr((int)$l);
	}
	return $mensx;
}

function descriptar(string $texto): string
{
	$chavePhp = obterChavePHP();
	$mensx = '';
	$l;
	$i;
	$j = 0;
	$ch = $chavePhp;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	$lchavePhp = strlen($chavePhp);
	$ldado = strlen($texto);
	for ($i = 0; $i < $ldado; $i++) {
		$j++;
		$l = (Asc(substr($texto, $i, 1)) - (Asc(substr($ch, $j, 1))));
		if ($j == $lchavePhp) {
			$j = 1;
		}
		if ($l < 0) {
			$l += 256;
		}
		$mensx .= (unichr($l));
	}
	return $mensx;
}

function charCodeAt($string, $offset)
{
	$string = mb_substr($string, $offset, 1);
	list(, $ret) = unpack('S', mb_convert_encoding($string, 'UTF-16LE'));
	return $ret;
}
