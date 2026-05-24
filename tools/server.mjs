import http from 'node:http';
import fs from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const ROOT = path.resolve(__dirname, '..', 'dist');
const PORT = Number(process.env.PORT || 4173);

const MIME = {
  '.html': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'application/javascript; charset=utf-8',
  '.svg': 'image/svg+xml',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.ico': 'image/x-icon',
  '.txt': 'text/plain; charset=utf-8',
};

async function resolve(urlPath) {
  let p = decodeURIComponent(urlPath.split('?')[0]);
  if (p.endsWith('/')) p += 'index.html';
  if (!path.extname(p)) p += '.html';
  const full = path.join(ROOT, p);
  if (!full.startsWith(ROOT)) return null;
  try {
    const data = await fs.readFile(full);
    return { data, ext: path.extname(full) };
  } catch {
    return null;
  }
}

export function startServer(port = PORT) {
  return new Promise((resolveStart) => {
    const server = http.createServer(async (req, res) => {
      const result = await resolve(req.url || '/');
      if (!result) {
        res.writeHead(404, { 'content-type': 'text/plain' });
        res.end('Not found');
        return;
      }
      res.writeHead(200, {
        'content-type': MIME[result.ext] || 'application/octet-stream',
        'cache-control': 'public, max-age=3600',
        'x-content-type-options': 'nosniff',
        'referrer-policy': 'strict-origin-when-cross-origin',
      });
      res.end(result.data);
    });
    server.listen(port, '127.0.0.1', () => {
      const addr = server.address();
      const actual = typeof addr === 'object' && addr ? addr.port : port;
      console.log(`preview server: http://127.0.0.1:${actual}/`);
      resolveStart({ server, port: actual });
    });
  });
}

if (import.meta.url === `file://${process.argv[1]}`) {
  startServer();
}
