import { join, extname } from 'path';

import { join, extname } from 'path';

const app = express();
const port = 3000; // ou a porta de sua escolha

// Servir arquivos estáticos
app.use('/styles', express.static(join(__dirname, 'src', 'resources', 'styles')));

// Servir arquivos estáticos da pasta temp
app.use(express.static(join(__dirname, 'src', 'temp')));

// Middleware para remover a extensão .html
app.use((req, res, next) => {
  const filePathWithoutExtension = join(__dirname, 'src', 'temp', 'pages', req.url.split('.')[0]);

  // Se o arquivo sem extensão não existe, continua sem redirecionamento
  if (!extname(req.url) && !filePathWithoutExtension.endsWith('/')) {
    next();
    return;
  }

  next();
});

// Rota para lidar com requisições GET para páginas HTML
app.get('/*.html', (req, res) => {
  res.sendFile(join(__dirname, 'src', 'temp', 'pages', req.url));
});

app.listen(port, () => {
  console.log(`Servidor Node.js rodando em http://localhost:${port}`);
});
