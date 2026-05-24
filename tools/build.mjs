import fs from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { minify as cssMinify } from 'csso';
import { minify as jsMinify } from 'terser';
import { pages, renderPage } from './templates.mjs';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const ROOT = path.resolve(__dirname, '..');
const DIST = path.join(ROOT, 'dist');

async function clean(dir) {
  await fs.rm(dir, { recursive: true, force: true });
  await fs.mkdir(dir, { recursive: true });
}

async function readGsapBundle() {
  const gsapDir = path.join(ROOT, 'node_modules', 'gsap', 'dist');
  const gsap = await fs.readFile(path.join(gsapDir, 'gsap.min.js'), 'utf8');
  const st = await fs.readFile(path.join(gsapDir, 'ScrollTrigger.min.js'), 'utf8');
  return `${gsap}\n${st}`;
}

async function buildCss() {
  const src = await fs.readFile(path.join(ROOT, 'assets', 'css', 'main.css'), 'utf8');
  const { css } = cssMinify(src);
  const out = path.join(DIST, 'assets', 'main.css');
  await fs.mkdir(path.dirname(out), { recursive: true });
  await fs.writeFile(out, css);
  return css.length;
}

async function buildJs() {
  const themeJs = await fs.readFile(path.join(ROOT, 'assets', 'js', 'main.js'), 'utf8');
  const gsapBundle = await readGsapBundle();
  const combined = `${gsapBundle}\n${themeJs}`;
  const result = await jsMinify(combined, {
    compress: { passes: 2 },
    mangle: true,
    format: { comments: false },
  });
  if (result.error) throw result.error;
  const out = path.join(DIST, 'assets', 'main.js');
  await fs.writeFile(out, result.code);
  return result.code.length;
}

async function buildHtml() {
  for (const page of pages) {
    const html = renderPage(page);
    const out = path.join(DIST, page.file);
    await fs.mkdir(path.dirname(out), { recursive: true });
    await fs.writeFile(out, html);
  }
}

async function writePlaceholderSvg() {
  const svg = `<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 1000" role="img" aria-label="placeholder artwork">
  <defs>
    <linearGradient id="bg" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#1b2125"/>
      <stop offset="100%" stop-color="#0f1418"/>
    </linearGradient>
    <linearGradient id="accent" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#00adef"/>
      <stop offset="50%" stop-color="#c069ff"/>
      <stop offset="100%" stop-color="#ff8c42"/>
    </linearGradient>
  </defs>
  <rect width="800" height="1000" fill="url(#bg)"/>
  <g opacity="0.18">
    <circle cx="200" cy="320" r="180" fill="url(#accent)"/>
    <circle cx="620" cy="720" r="240" fill="url(#accent)"/>
  </g>
  <g fill="none" stroke="#41484d" stroke-width="1">
    <rect x="40" y="40" width="720" height="920"/>
  </g>
  <text x="400" y="540" text-anchor="middle" font-family="Helvetica, Arial, sans-serif" font-size="28" font-weight="700" fill="#e0e2e5" letter-spacing="2">PLACEHOLDER</text>
</svg>`;
  const out = path.join(DIST, 'assets', 'placeholder.svg');
  await fs.writeFile(out, svg);
}

async function copyFonts() {
  const src = path.join(
    ROOT,
    'node_modules',
    '@fontsource-variable',
    'hanken-grotesk',
    'files',
    'hanken-grotesk-latin-wght-normal.woff2'
  );
  const outDir = path.join(DIST, 'assets', 'fonts');
  await fs.mkdir(outDir, { recursive: true });
  await fs.copyFile(src, path.join(outDir, 'hanken-grotesk.woff2'));
}

async function writeRobots() {
  await fs.writeFile(path.join(DIST, 'robots.txt'), 'User-agent: *\nAllow: /\n');
}

async function main() {
  await clean(DIST);
  const [cssSize, jsSize] = await Promise.all([buildCss(), buildJs()]);
  await buildHtml();
  await writePlaceholderSvg();
  await copyFonts();
  await writeRobots();
  console.log(`build ok — css ${cssSize}B, js ${jsSize}B, pages ${pages.length}`);
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
