# Project Overview

このプロジェクトは、Webサイト制作の営業活動で使用する個人ポートフォリオサイトです。
目的は、営業メールを受け取った相手に「この人にWeb制作を依頼できそう」と感じてもらうことです。

---

## Andrej Karpathy のコーディング原則

**Behavioral guidelines to reduce common LLM coding mistakes.**

### 1. Think Before Coding
- 実装前に考える。仮定を明示、不明点は質問、トレードオフを提示。
- 不確かな点は必ず確認する。

### 2. Simplicity First
- 最小限のコードで解決。余計な機能・抽象化は絶対に追加しない。
- 要求されていないものは作らない。

### 3. Surgical Changes
- 必要な部分だけ外科的に変更。他のコードは触らない。
- 関係ないリファクタリングは禁止。

### 4. Goal-Driven Execution
- 成功条件を明確に定義し、検証しながら進める。
- 各ステップで確認しながら進捗する。

## Goal

- Web制作スキルを信頼感のある形で伝える
- 制作実績を見やすく掲載する
- 問い合わせ・相談につながる導線を作る
- デザイン性と実装力の両方を見せる

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

## Site Direction

参考サイト：
- https://production-hasu.work
- https://shinyaokano.jp

方向性：
- 余白を活かした高級感
- 大きなタイポグラフィ
- Works中心の構成
- スムーズなスクロールアニメーション
- 派手すぎず、制作会社に近い信頼感

## Content Structure

主なページ：
- TOP
- WORKS
- WORKS DETAIL
- ABOUT
- SERVICE
- CONTACT

## Custom Post Type

制作実績は `works` というカスタム投稿タイプで管理する。

各実績に必要な項目：
- タイトル
- サムネイル
- 制作年
- 担当範囲
- 使用技術
- サイトURL
- 概要
- 課題
- 提案内容
- 成果
- ギャラリー画像

## Coding Rules

- 既存コードを優先して確認してから作業する
- 不要なライブラリを増やさない
- デザイン崩れを起こす大規模変更は避ける
- WordPress標準関数を優先する
- セキュリティのため出力時は esc_html, esc_url, esc_attr を使う
- PHPファイルでは直接DB操作をしない
- wp-config.php は変更しない
- core WordPress files は変更しない

## Animation Rules

- アニメーションはGSAPを使用する
- 目的のない過剰なアニメーションは禁止
- 初回表示、スクロール時、hoverの3種類を中心にする
- モバイルでは動きを控えめにする

## Design Rules

- 余白を広めに取る
- 黒・白・グレーをベースにする
- アクセントカラーは最小限にする
- 画像を大きく見せる
- 8pxグリッドを意識する
- SP表示を必ず確認する
- 詳細なデザイントークン（色・タイポ・コンポーネント）は [design.md](design.md) を参照する

## Do Not Touch

- wp-config.php
- WordPress core files
- database directly
- plugins directory unless explicitly instructed

## Completion Criteria

作業完了時は以下を報告する：
- 変更したファイル
- 追加した機能
- 確認した表示
- 未対応のこと
- 次にやるべきこと
