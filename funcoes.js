
/*
function encriptar(dado){
    return CryptoJS.AES.encrypt(dado, chaveJs);
}

function desencriptar(dado){
    return CryptoJS.AES.decrypt(dado, chaveJs);
}
*/
function encriptar(dados){
	let mensx = '';
	let l;
	let i;
	let j = 0;
    //ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	let ch = chaveJs;
    const lchaveJs = chaveJs.length;
    const ldado = dados.length;
	for (i = 0; i < ldado; i++){
		j++;
		l = (Asc(dados.substr(i,1))+(Asc(ch.substr(j,1))));
		if (j == lchaveJs){
			j = 1;
		}
		if (l > 255){
			l -= 256;
		}
		mensx += (Chr(l));
	}
	return mensx; //document.getElementById("1").value=mensx;
}
function descriptar(dados){
	let mensx = '';
	let l;
	let i;
	let j = 0;
	let ch = chaveJs;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
    const lchaveJs = chaveJs.length;
    const ldado = dados.length;
    for (i = 0; i < dados.length; i++){
		j++;
		l=(Asc(dados.substr(i,1))-(Asc(ch.substr(j,1))));
		if (j == lchaveJs){
			j = 1;
		}
		if (l < 0){
			l += 256;
		}
		mensx += (Chr(l));
	}
	return mensx;//document.getElementById("2").value=mensx;
}

function Asc(String){
	return String.charCodeAt(0);
}

function Chr(AsciiNum){
	return String.fromCharCode(AsciiNum)
}

function mostrarDadoNormal(dado){
    console.log("Dado normal: " + dado);
    return dado;
}

function mostrarDadoEncriptado(dado){
    const dadoEncriptado = encriptar(dado);
    console.log("Dado original encriptado: " + dadoEncriptado);
    return dadoEncriptado;
}

function mostrarDadoDescriptado(dado){
    const dadoOriginal = descriptar(dado);
    console.log("Dado original desencriptado: " + dadoOriginal);
    return dadoOriginal;
}

const btnAcessar = document.querySelector('#acessar');

btnAcessar.addEventListener('click', () => {
    const senha = document.getElementById('senha').value;
    let dado = mostrarDadoNormal(senha);
    dado = mostrarDadoEncriptado(dado);
    mostrarDadoDescriptado(dado);
})


