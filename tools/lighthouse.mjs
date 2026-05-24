import path from 'node:path';
import fs from 'node:fs/promises';
import { fileURLToPath } from 'node:url';
import lighthouse from 'lighthouse';
import * as chromeLauncher from 'chrome-launcher';
import { startServer } from './server.mjs';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const OUT = path.resolve(__dirname, '..', 'dist', 'lighthouse');

const CHROME_PATH =
  process.env.CHROME_PATH ||
  '/Applications/Google Chrome.app/Contents/MacOS/Google Chrome';

const PAGES = ['index.html', 'works.html', 'about.html', 'contact.html'];

const MIN_SCORE = 90;
const CATEGORIES = ['performance', 'accessibility', 'best-practices', 'seo'];

async function runOne(url, port) {
  const result = await lighthouse(
    url,
    {
      port,
      logLevel: 'error',
      output: ['json'],
      onlyCategories: CATEGORIES,
      formFactor: 'desktop',
      screenEmulation: {
        mobile: false,
        width: 1440,
        height: 900,
        deviceScaleFactor: 1,
        disabled: false,
      },
      throttlingMethod: 'simulate',
      throttling: {
        rttMs: 40,
        throughputKbps: 10240,
        cpuSlowdownMultiplier: 1,
        requestLatencyMs: 0,
        downloadThroughputKbps: 0,
        uploadThroughputKbps: 0,
      },
    },
    undefined
  );
  return result.lhr;
}

async function main() {
  await fs.mkdir(OUT, { recursive: true });
  const { server, port: previewPort } = await startServer(0);
  const chrome = await chromeLauncher.launch({
    chromePath: CHROME_PATH,
    chromeFlags: ['--headless=new', '--no-sandbox', '--disable-gpu'],
  });
  const summary = [];
  let failed = false;
  try {
    for (const file of PAGES) {
      const url = `http://127.0.0.1:${previewPort}/${file}`;
      const lhr = await runOne(url, chrome.port);
      const scores = Object.fromEntries(
        CATEGORIES.map((c) => [c, Math.round((lhr.categories[c].score || 0) * 100)])
      );
      const row = { page: file, ...scores };
      summary.push(row);
      const min = Math.min(...Object.values(scores));
      if (min < MIN_SCORE) failed = true;
      console.log(
        `${file}: perf=${scores.performance} a11y=${scores.accessibility} bp=${scores['best-practices']} seo=${scores.seo}`
      );
      await fs.writeFile(
        path.join(OUT, `${file.replace(/\.html$/, '')}.json`),
        JSON.stringify(lhr, null, 0)
      );
    }
  } finally {
    await chrome.kill();
    server.close();
  }
  await fs.writeFile(path.join(OUT, 'summary.json'), JSON.stringify(summary, null, 2));
  console.table(summary);
  if (failed) {
    console.error(`\nLighthouse: at least one category < ${MIN_SCORE}`);
    process.exit(1);
  }
  console.log(`\nLighthouse: all categories >= ${MIN_SCORE}`);
}

main().catch((err) => {
  console.error(err);
  process.exit(1);
});
