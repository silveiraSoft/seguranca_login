<?php


function criarChaveJS()
{
    session_start();
    echo "<br>Criando chave JS<br>";
    if (!isset($_SESSION['teste'])) {
        $_SESSION['teste'] = sha1(time()) . sha1(microtime());
    }

    $chavePhp = $_SESSION['teste'] ?? null;

    echo "chavePhp:" . $chavePhp;
    if (isset($_SESSION['teste'])) {
        ?>
            <script>
                var chaveJs = '<?php echo $chavePhp; ?>';
                console.log("Chave js com o valor vindo da sessão do php com nome valor: chaveJs = " + chaveJs);
            </script>
        <?php
    }
}

/*
function encriptar(dados){
	var mensx="";
	var l;
	var i;
	var j=0;
	var ch;
	ch = chaveJs;
    const lchaveJs = chaveJs.length
    //ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	for (i=0;i<dados.length; i++){
		j++;
		l=(Asc(dados.substr(i,1))+(Asc(ch.substr(j,1))));
		if (j==lchaveJs){
			j=1;
		}
		if (l>255){
			l-=256;
		}
		mensx+=(Chr(l));
	}
	return mensx; //document.getElementById("1").value=mensx;
}
function descriptar(dados){
	var mensx="";
	var l;
	var i;
	var j=0;
	var ch;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
    ch = chaveJs;
    const lchaveJs = chaveJs.length
    for (i=0; i<dados.length;i++){
		j++;
		l=(Asc(dados.substr(i,1))-(Asc(ch.substr(j,1))));
		if (j==lchaveJs){
			j=1;
		}
		if (l<0){
			l+=256;
		}
		mensx+=(Chr(l));
	}
	return mensx;//document.getElementById("2").value=mensx;
}

function Asc(String){
	return String.charCodeAt(0);
}

function Chr(AsciiNum){
	return String.fromCharCode(AsciiNum)
}
*/
