const btnAcessar = document.querySelector('#acessar');

btnAcessar.addEventListener('click', () => {
    const senha = document.getElementById('senha').value;
    const dado = mostrarDadoNormal(senha);
    const dadoEncriptado = mostrarDadoEncriptado(dado);
    const dadoDescriptado = mostrarDadoDescriptado(dadoEncriptado);

    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: { dadoEncriptado: dadoEncriptado },
        dataType: "josn",
        success: function (result) {
            // Retorno se tudo ocorreu normalmente
            console.log("Resultado Ajax, dado encriptado: " + dadoEncriptado);
            console.log("Resultado Ajax, dado descriptado: " + result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Retorno caso algum erro ocorra
        }
    });
})
