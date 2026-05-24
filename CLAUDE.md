# Portfolio Theme

Web制作の営業活動で使用する個人ポートフォリオ（WordPress オリジナルテーマ）。
受信した相手に「この人に依頼できそう」と感じてもらうことが目的。

## Goal

- Web制作スキルを信頼感のある形で伝える
- 制作実績を見やすく掲載する
- 問い合わせ・相談につながる導線を作る

## Tech Stack

- WordPress（オリジナルテーマ） / PHP 8.0+
- HTML / CSS / JavaScript（ES2020）
- GSAP 3 + ScrollTrigger
- ACF（カスタムフィールド）
- Node.js 20+ / npm（ビルド・検証用）
- csso（CSS最小化）、terser（JS最小化）
- puppeteer-core + system Chrome、lighthouse + chrome-launcher（検証）

## Commands

```sh
npm install              # 依存パッケージ
npm run build            # CSS/JS を minify、検証用 静的HTML を dist/ に生成
npm run preview          # dist/ をプレビュー（http://127.0.0.1:4173）
npm run screenshots      # 375 / 768 / 1440 でスクリーンショット
npm run lighthouse       # Lighthouse 4カテゴリ実行
npm run verify           # build → screenshots → lighthouse 一括
npm run clean            # dist/ を削除
```

WordPress 側で使う場合: このディレクトリを `wp-content/themes/portfolio-theme` に配置し、管理画面で **Portfolio Theme** を有効化。

`screenshots` と `lighthouse` は macOS の Google Chrome.app を使用。別パスの Chrome は `CHROME_PATH=...` で指定。

## Reference Sites

- https://production-hasu.work
- https://shinyaokano.jp

## Content Structure

ページ: Top / Works / Works Detail / About / Service / Contact

制作実績は `works` カスタム投稿タイプ。各実績の項目:
タイトル / サムネイル / 制作年 / 担当範囲 / 使用技術 / サイトURL / 概要 / 課題 / 提案 / 成果 / ギャラリー画像

## Coding Rules

- 既存コードを優先して確認してから作業する
- 不要なライブラリを増やさない
- デザイン崩れを起こす大規模変更は避ける
- WordPress標準関数を優先する
- 出力時は `esc_html` / `esc_url` / `esc_attr` を使う
- PHPファイルでは直接DB操作をしない

## Animation Rules

- アニメーションは GSAP を使用
- 目的のない過剰なアニメーションは禁止
- 初回表示・スクロール時・hover の3種類が中心
- モバイルでは動きを控えめに
- `prefers-reduced-motion: reduce` を必ず尊重

## Design Rules

- 余白を広めに取る・8px グリッドを意識する
- SP表示を必ず確認する
- 画像を大きく見せる
- アクセントは最小限

**詳細なデザイントークン（色・タイポ・コンポーネント）は [design.md](design.md) を参照**（ライト基調の現状実装と、ダーク基調＋アクセントグラデーションの提案版の両方を記述）。

## Do Not Touch

- `wp-config.php`
- WordPress core files
- データベース直接操作
- `plugins/` ディレクトリ（明示指示がある場合を除く）

## Completion Criteria

作業完了時は以下を報告する: 変更したファイル / 追加した機能 / 確認した表示 / 未対応のこと / 次にやるべきこと。

ゴール達成の検証は `npm run verify` を使う（Lighthouse 4カテゴリ ≥ 90 を維持）。
