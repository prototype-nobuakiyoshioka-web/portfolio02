import path from 'node:path';
import fs from 'node:fs/promises';
import { fileURLToPath } from 'node:url';
import puppeteer from 'puppeteer-core';
import { startServer } from './server.mjs';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const OUT = path.resolve(__dirname, '..', 'dist', 'screenshots');

const CHROME =
  process.env.CHROME_PATH ||
  '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';

const VIEWPORTS = [
  { name: '375', width: 375, height: 812 },
  { name: '768', width: 768, height: 1024 },
  { name: '1440', width: 1440, height: 900 },
];

const PAGES = ['index.html', 'works.html', 'about.html', 'contact.html', 'service.html'];

async function main() {
  await fs.mkdir(OUT, { recursive: true });
  const { server, port } = await startServer(0);
  const base = `http://127.0.0.1:${port}`;
  let browser;
  try {
    browser = await puppeteer.launch({
      executablePath: CHROME,
      headless: 'new',
      args: ['--no-sandbox', '--disable-dev-shm-usage'],
    });
    for (const viewport of VIEWPORTS) {
      const page = await browser.newPage();
      await page.setViewport({
        width: viewport.width,
        height: viewport.height,
        deviceScaleFactor: 1,
      });
      await page.emulateMediaFeatures([
        { name: 'prefers-reduced-motion', value: 'reduce' },
      ]);
      for (const file of PAGES) {
        const url = `${base}/${file}`;
        await page.goto(url, { waitUntil: 'networkidle0', timeout: 30_000 });
        await new Promise((r) => setTimeout(r, 400));
        const stem = file.replace(/\.html$/, '');
        const out = path.join(OUT, `${stem}-${viewport.name}.png`);
        await page.screenshot({ path: out, fullPage: true });
        console.log(`captured ${stem} @ ${viewport.name}px`);
      }
      await page.close();
    }
  } finally {
    if (browser) await browser.close();
    server.close();
  }
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
