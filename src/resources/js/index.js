function variaveis() {
    const nomeInput = document.getElementById('nome');
    const botaoContinuar = document.getElementById('botaoContinuar');
    const userContainer = document.getElementById('user-container');
    const senhaContainer = document.getElementById('senha-container');
    const userMsg = document.getElementById('userError');
    const botaoAcessarElement = document.getElementById('acessar');
    let divLogin; // Declare a variável divLogin aqui
    return {
        nomeInput,
        botaoContinuar,
        userContainer,
        senhaContainer,
        userMsg,
        botaoAcessarElement,
        divLogin,
    };
}
const variaveisObj = variaveis();
const nomeInput = variaveisObj.nomeInput;
const botaoAcessarElement = variaveisObj.botaoAcessarElement;
const botaoContinuar = variaveisObj.botaoContinuar;
const userContainer = variaveisObj.userContainer;
const senhaContainer = variaveisObj.senhaContainer;
const userMsg = variaveisObj.userMsg;
let divLogin = variaveisObj.divLogin;
function criarDivMensagem() {
    if (!divLogin) {
        divLogin = document.createElement('div');
        divLogin.id = 'divLogin'; // Define um ID (opcional) para a div
        userMsg.appendChild(divLogin);
    }
}
function divMensagem() {
    divLogin.innerHTML = 'Digite o usuário.';
    divLogin.style.color = 'red';
    divLogin.style.fontSize = '20px';
    divLogin.style.fontWeight = 'bold';
    divLogin.style.marginTop = '10px';
    divLogin.style.marginBottom = '10px';
    divLogin.style.textAlign = 'center';
    divLogin.style.display = 'block';
}

function botaoAcessar() {
    botaoAcessarElement.style.display = 'block';
    botaoAcessarElement.style.backgroundColor = '#007bff';
    botaoAcessarElement.style.color = '#fff';
    botaoAcessarElement.style.border = 'none';
    botaoAcessarElement.style.borderRadius = '4px';
    botaoAcessarElement.style.padding = '10px 20px';
    botaoAcessarElement.style.fontSize = '16px';
    botaoAcessarElement.style.cursor = 'pointer';
    botaoAcessarElement.style.margin = '0 auto';
    botaoAcessarElement.addEventListener('mouseenter', function () {
        botaoAcessarElement.style.backgroundColor = '#0069d9';
    });

    // Estilo quando o mouse sai
    botaoAcessarElement.addEventListener('mouseleave', function () {
        botaoAcessarElement.style.backgroundColor = '#007bff';
    });
}
botaoContinuar.addEventListener('click', function () {
    criarDivMensagem();

    if (nomeInput.value.trim() !== '' && nomeInput.value.trim().length >= 4) {
        senhaContainer.style.display = 'block';
        userMsg.style.display = 'none';
        userContainer.style.display = 'none';
        divLogin.style.display = 'none'; // Oculta a mensagem de erro
        botaoAcessar();
    } else {
        divMensagem();
        senhaContainer.style.display = 'none';
    }
});
nomeInput.addEventListener('input', function () {
    criarDivMensagem();

    if (nomeInput.value.trim() === '' || nomeInput.value.trim().length < 4) {
        senhaContainer.style.display = 'none';
        divMensagem();
    } else {
        divLogin.style.display = 'none';
    }
});