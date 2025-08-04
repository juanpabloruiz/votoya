const { createServer } = require('http');
const { readFile } = require('fs');
const { join } = require('path');

createServer((_, res) =>
  readFile(join(__dirname, 'index.html'), (err, data) =>
    err
      ? res.writeHead(500).end('Error del servidor')
      : res.writeHead(200, { 'Content-Type': 'text/html' }).end(data)
  )
).listen(3000, () => console.log('🟢 http://localhost:3000'));
