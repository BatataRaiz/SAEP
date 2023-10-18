const express = require('express');
const app = express();
const path = require('path');

// Configurar o diretório onde estão os arquivos HTML
app.use(express.static(path.join(__dirname, 'SAEP', 'src', 'temp', 'pages')));

// Configurar uma rota para a página index
app.get('/index', (req, res) => {
    res.sendFile(path.join(__dirname, 'src', 'temp', 'pages', 'index.html'));
});

// Configurar rotas para outras páginas, se necessário

app.get('/cadastro', (req, res) => {
    res.sendFile(path.join(__dirname, 'src', 'temp', 'pages', 'cadastro.html'));
});

app.get('/menu', (req, res) => {
    res.sendFile(path.join(__dirname, 'src', 'temp', 'pages', 'menu.html'));
});


// Iniciar o servidor
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
