function Asc(String) {
	return String.charCodeAt(0);
}

function Chr(AsciiNum) {
	return String.fromCharCode(AsciiNum)
}

function encriptar(texto) {
	let mensx = '';
	let l;
	let i;
	let j = 0;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	let ch = chavePhp;
	const lchavePhp = chavePhp.length;
	const ldado = texto.length;
	for (i = 0; i < ldado; i++) {
		j++;
		l = (Asc(texto.substr(i, 1)) + (Asc(ch.substr(j, 1))));
		if (j == lchavePhp) {
			j = 1;
		}
		if (l > 255) {
			l -= 256;
		}
		mensx += (Chr(l));
		console.log("i: " + i + " | " + "l: " + l + " carater: " + Chr(l));
	}
	return mensx;
}

function descriptar(texto) {
	let mensx = '';
	let l;
	let i;
	let j = 0;
	let ch = chavePhp;
	//ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";
	const lchavePhp = chavePhp.length;
	const ldado = texto.length;
	for (i = 0; i < ldado; i++) {
		j++;
		l = (Asc(texto.substr(i, 1)) - (Asc(ch.substr(j, 1))));
		if (j == lchavePhp) {
			j = 1;
		}
		if (l < 0) {
			l += 256;
		}
		mensx += (Chr(l));
	}
	return mensx;
}

function mostrarDadoNormal(dado) {
	console.log("Dado normal: " + dado);
	return dado;
}

function mostrarDadoEncriptado(dado) {
	const dadoEncriptado = encriptar(dado);
	console.log("Dado original encriptado: " + dadoEncriptado);
	return dadoEncriptado;
}

function mostrarDadoDescriptado(dado) {
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


