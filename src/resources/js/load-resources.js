// Função para adicionar um arquivo CSS ao cabeçalho do documento
function loadCSS(url) {
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.type = "text/css";
    link.href = url;
    document.head.appendChild(link);
}

// Função para adicionar um arquivo JavaScript ao cabeçalho do documento
function loadScript(url) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = url;
    document.head.appendChild(script);
}

function jQuery(url) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = url;
    script.integrity = "sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=";
    script.crossOrigin = "anonymous";
    document.head.appendChild(script);
}
//Carregar o arquivo jQuery
//jQuery("https://code.jquery.com/jquery-3.7.1.min.js");

// Carregar o arquivo CSS
loadCSS("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");


// Carregar o arquivo JavaScript
loadScript("../../resources/js/contentLoad.js");
//loadScript("../../resources/js/auth.js");

//loadScript("../../resources/js/auth.js");

